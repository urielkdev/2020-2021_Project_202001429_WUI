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

		$todasAsDatas = [];
		$todosFundos = [];
		// balanco de cada fundo em cada data
		$balancoFundoData = [];
		// rentabilidade de cada fundo em cada data
		$rentabilidadeFundoData = [];

		$dataIterador = $operacoesFinanceiras[0]['data'];
		$dataFormatada = "";
		// inicializa os todasAsDatas
		do {
			$dataFormatada = date_format($dataIterador, 'Y-m-d');
			$todasAsDatas[] = $dataFormatada;
			$dataIterador = $dataIterador->modify('+1 day');
		} while ($dataFormatada != $dataOpMaisRecente);

		// inicializa todosFundos
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

			// TODO: VER TIPO de OPERACOES NEGATIVAS, subtrair
			// $tipoOperacao = $operacaoFinanceira[];
			$balancoFundoData[$dataFormatada][$fundoId] += $operacaoFinanceira["valor_total"];
		}


		$dataAnterior = "";
		// calcula o valor total do patrimonio dos fundos somados em determinado data
		foreach ($todasAsDatas as $data) {
			$soma = 0;
			foreach ($todosFundos as $fundoId) {
				// TODO: ADICIONAR O RENDIMENTO DO MES PASSADO, RENTABILIDADE DO FUNDO NO MES ENTRE PARENTESES
				$rentabilidade = 1 + $rentabilidadeFundoData[$data][$fundoId];
				$patrimonioMesAnterios = $balancoFundoData[$dataAnterior][$fundoId] * $rentabilidade;
				$balancoFundoData[$data][$fundoId] += $patrimonioMesAnterios;

				$soma += $balancoFundoData[$data][$fundoId];
			}
			$balancoFundoData[$data]['total'] += $soma;
			$dataAnterior = $data;
		}

		$tabelaFormatada = [];
		// setar os valores para usar no grafico
		foreach ($todasAsDatas as $idx => $data) {
			$anoJS = $data[0] . $data[1] . $data[2] . $data[3];
			$mesJS = "" . ((int)($data[5] . $data[6]) - 1);
			$diaJS = "" . ((int)($data[8] . $data[9]));
			$tabelaFormatada[$idx] = [$anoJS, $mesJS, $diaJS, floor($balancoFundoData[$data]['total'] * 1000) / 1000];
			foreach ($todosFundos as $fundo) {
				$tabelaFormatada[$idx][] = $balancoFundoData[$data][$fundo];
			}
		}


		// return $operacoesFinanceiras;
		// return $dataOpMaisAntiga;
		$this->set(compact('dataOpMaisAntiga', 'dataOpMaisRecente', 'todosFundos', 'todasAsDatas', 'balancoFundoData', 'rentabilidadeFundoData', 'tabelaFormatada'));
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
