<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * CarteirasInvestimentos Controller
 *
 * @property \App\Model\Table\CarteirasInvestimentosTable $CarteirasInvestimentos
 * @method \App\Model\Entity\CarteirasInvestimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarteirasInvestimentosController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index() {
		$session = $this->request->getSession();
		$userId = $session->read('User.id');
		$userName = $session->read('User.nome');
		$carteirasInvestimentos = $this->paginate($this->CarteirasInvestimentos->find()->where(['usuario_id' => $userId]));
		//var_dump($session);
		//exit();
		$this->set(compact('carteirasInvestimentos', 'userName'));
	}


	public function indicadores_patrimonio($id_carteira = null) {
		$operacoesFinanceiras = $this->CarteirasInvestimentos->OperacoesFinanceiras->find('all', ['order' => ['data' => 'ASC']])->where(['carteiras_investimento_id' => $id_carteira])->toList();
		if (sizeof($operacoesFinanceiras) == 0) return;
		$dataOpMaisAntiga = date_format($operacoesFinanceiras[0]['data'], 'Y-m-d');
		$dataOpMaisRecente = date("Y-m-d");

		$consultaTipoOperacao = TableRegistry::getTableLocator()->get('TipoOperacoesFinanceiras')->find('all');
		foreach ($consultaTipoOperacao as $tipoOperacao) {
			$tiposOperacao[$tipoOperacao['id']] = $tipoOperacao['is_aplicacao'];
		}

		// todas as datas, para serem utilizadas no grafico
		$todasAsDatas = [];
		// todos os fundos, para serem utilizados no grafico
		$todosFundos = [];
		// balanco de cada fundo em cada data
		$balancoFundoData = [];
		// retorno cada fundo de todos os tempos
		$retornoFundo = [];
		// rentabilidade de cada fundo em cada data
		$rentabilidadeFundoData = [];
		// drawdown de cada fundo
		// rever se é a maior perda em X tempo, ou tipo, maior perda em 1 unico dia
		// se tiver perda por 3 dias seguidos, conta como 1 perda pro drawdown?
		$drawdownFundo = [];

		$dataIterador = $operacoesFinanceiras[0]['data'];
		$dataFormatada = "";
		// inicializa os todasAsDatas
		do {
			$dataFormatada = date_format($dataIterador, 'Y-m-d');
			$todasAsDatas[] = $dataFormatada;
			$dataIterador = $dataIterador->modify('+1 day');
		} while ($dataFormatada != $dataOpMaisRecente);

		// inicializa todosFundos, seta o balanco
		foreach ($operacoesFinanceiras as $operacaoFinanceira) {
			$fundoId = $operacaoFinanceira["cnpj_fundo_id"];
			// caso o fundo ainda nao esteja cadastrado
			if (!in_array($fundoId, $todosFundos)) {
				$todosFundos[] = $fundoId;

				foreach ($todasAsDatas as $data) {
					$balancoFundoData[$data][$fundoId] = 0;
					$rentabilidadeFundoData[$data][$fundoId] = 0;
				}

				$consultaRentabilidade = TableRegistry::getTableLocator()->get('DocInfDiarioFundos')->find('all', ['order' => ['DT_COMPTC' => 'ASC']])->where(['cnpj_fundo_id' => $fundoId, 'DT_COMPTC >=' => $dataOpMaisAntiga])->toList();
				foreach ($consultaRentabilidade as $consulta) {
					$data = date_format($consulta['DT_COMPTC'], 'Y-m-d');
					$rentabilidadeFundoData[$data][$fundoId] = $consulta['rentab_diaria'];
				}
			}
		}

		// inicializa o balanco de cada fundo em cada data
		foreach ($operacoesFinanceiras as $operacaoFinanceira) {
			$dataFormatada = date_format($operacaoFinanceira['data'], 'Y-m-d');
			$fundoId = $operacaoFinanceira["cnpj_fundo_id"];
			$valorTotalOp = $operacaoFinanceira["valor_total"];
			// TODO: VER TIPO de OPERACOES NEGATIVAS, subtrair
			if ($tiposOperacao[$operacaoFinanceira['tipo_operacoes_financeira_id']]) {
				$balancoFundoData[$dataFormatada][$fundoId] += $valorTotalOp;
			} else {
				$balancoFundoData[$dataFormatada][$fundoId] -= $valorTotalOp;
			}
		}


		$dataAnterior = "";
		// calcula o valor total do patrimonio dos fundos somados em determinado data
		foreach ($todasAsDatas as $data) {
			$soma = 0;
			foreach ($todosFundos as $fundoId) {
				$rendimentoData = $balancoFundoData[$dataAnterior][$fundoId] * $rentabilidadeFundoData[$data][$fundoId];
				$patrimonioDataAnterios = $balancoFundoData[$dataAnterior][$fundoId] + $rendimentoData;
				$balancoFundoData[$data][$fundoId] += $patrimonioDataAnterios;

				// calculo para saber o retorno
				$retornoFundo[$fundoId] += $rendimentoData;
				$retornoFundo['Total'] += $rendimentoData;
				$soma += $balancoFundoData[$data][$fundoId];
			}
			$balancoFundoData[$data]['Total'] += $soma;
			$dataAnterior = $data;
		}

		$tabelaFormatada = [];
		// setar os valores para usar no grafico
		foreach ($todasAsDatas as $idx => $data) {
			$anoJS = $data[0] . $data[1] . $data[2] . $data[3];
			$mesJS = "" . ((int)($data[5] . $data[6]) - 1);
			$diaJS = "" . ((int)($data[8] . $data[9]));
			$tabelaFormatada[$idx] = [$anoJS, $mesJS, $diaJS, floor($balancoFundoData[$data]['Total'] * 1000) / 1000];
			foreach ($todosFundos as $fundo) {
				$tabelaFormatada[$idx][] = $balancoFundoData[$data][$fundo];
			}
		}


		// return $operacoesFinanceiras;
		// return $dataOpMaisAntiga;
		// TODO: RETIRAR DO set VARIAVEIS QUE NÃO SERÃO UTILIZADAS NA VIEW
		$this->set(compact('retornoFundo', 'dataOpMaisAntiga', 'dataOpMaisRecente', 'todosFundos', 'todasAsDatas', 'balancoFundoData', 'rentabilidadeFundoData', 'tabelaFormatada'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Carteiras Investimento id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$carteirasInvestimento = $this->CarteirasInvestimentos->get($id, [
			'contain' => ['Usuarios', 'IndicadoresCarteiras', 'OperacoesFinanceiras' => ['CnpjFundos', 'DistribuidorFundos', 'TipoOperacoesFinanceiras']],
		]);

		$this->indicadores_patrimonio($id);

		$this->set(compact('carteirasInvestimento', 'indicadoresPatrimonio'));



		/*
		$this->paginate = [
			'contain' => ['CarteirasInvestimentos', 'CnpjFundos', 'DistribuidorFundos', 'TipoOperacoesFinanceiras'],
		];
		$operacoesFinanceiras = $this->paginate($this->OperacoesFinanceiras);

		$this->set(compact('operacoesFinanceiras'));
		 *
		 */
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$carteirasInvestimento = $this->CarteirasInvestimentos->newEmptyEntity();
		if ($this->request->is('post')) {
			$carteirasInvestimento = $this->CarteirasInvestimentos->patchEntity($carteirasInvestimento, $this->request->getData());
			if ($this->CarteirasInvestimentos->save($carteirasInvestimento)) {
				$this->Flash->success(__('The carteiras investimento has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The carteiras investimento could not be saved. Please, try again.'));
		}
		$usuarios = $this->CarteirasInvestimentos->Usuarios->find('list', ['limit' => 200]);
		$this->set(compact('carteirasInvestimento', 'usuarios'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Carteiras Investimento id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$carteirasInvestimento = $this->CarteirasInvestimentos->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$carteirasInvestimento = $this->CarteirasInvestimentos->patchEntity($carteirasInvestimento, $this->request->getData());
			if ($this->CarteirasInvestimentos->save($carteirasInvestimento)) {
				$this->Flash->success(__('The carteiras investimento has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The carteiras investimento could not be saved. Please, try again.'));
		}
		$usuarios = $this->CarteirasInvestimentos->Usuarios->find('list', ['limit' => 200]);
		$this->set(compact('carteirasInvestimento', 'usuarios'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Carteiras Investimento id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$carteirasInvestimento = $this->CarteirasInvestimentos->get($id);
		if ($this->CarteirasInvestimentos->delete($carteirasInvestimento)) {
			$this->Flash->success(__('The carteiras investimento has been deleted.'));
		} else {
			$this->Flash->error(__('The carteiras investimento could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	/*
	 * *******************************************************************************
	 */

	public function beforeFilter(\Cake\Event\EventInterface $event) {
		parent::beforeFilter($event);
		$session = $this->request->getSession();
		$conectado = $session->read('User.id') != null;
		if (!$conectado) {
			$this->Flash->error(__('Você precisa estar logado para acessar a página solicitada. Você foi redirecionado à página principal.'));
			return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
		}
	}
}
