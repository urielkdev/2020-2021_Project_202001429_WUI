<?php

declare(strict_types=1);

namespace App\Controller;

use DateTime;

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

		$dataOpMaisAntiga = date_format($operacoesFinanceiras[0]['data'], 'Y-m');
		$dataOpMaisRecente = date_format(end($operacoesFinanceiras)['data'], 'Y-m');

		$todosOsMeses = [];
		$todosFundos = [];
		// balanco de cada fundo em cada mes
		$balancoFundoMes = [];

		$mesIterador = $operacoesFinanceiras[0]['data'];
		$mesFormatado = "";
		// inicializa os todosOsMeses
		do {
			$mesFormatado = date_format($mesIterador, 'Y-m');
			$todosOsMeses[] = $mesFormatado;
			$mesIterador = $mesIterador->modify('+1 month');
		} while ($mesFormatado != $dataOpMaisRecente);

		// inicializa todosFundos
		foreach ($operacoesFinanceiras as $operacaoFinanceira) {
			$fundoId = $operacaoFinanceira["cnpj_fundo_id"];
			if (!in_array($fundoId, $todosFundos)) {
				$todosFundos[] = $fundoId;
				foreach ($todosOsMeses as $mes) {
					$balancoFundoMes[$mes][$fundoId] = 0;
				}
			}
		}

		// inicializa o balanco de cada fundo em cada mes
		foreach ($operacoesFinanceiras as $operacaoFinanceira) {
			$mesFormatado = date_format($operacaoFinanceira['data'], 'Y-m');
			$fundoId = $operacaoFinanceira["cnpj_fundo_id"];

			// TODO: VER TIPO de OPERACOES NEGATIVAS, subtrair
			$balancoFundoMes[$mesFormatado][$fundoId] += $operacaoFinanceira["valor_total"];
		}

		$mesAnterior = "";

		// calcula o valor total do patrimonio dos fundos somados em determinado mes
		foreach ($todosOsMeses as $mes) {
			$soma = 0;
			foreach ($todosFundos as $fundoId) {
				// TODO: ADICIONAR O RENDIMENTO DO MES PASSADO, RENTABILIDADE DO FUNDO NO MES ENTRE PARENTESES
				$rentabilidade = 1 + (0.1);
				$patrimonioMesAnterios = $balancoFundoMes[$mesAnterior][$fundoId] * $rentabilidade;
				$balancoFundoMes[$mes][$fundoId] += $patrimonioMesAnterios;

				$soma += $balancoFundoMes[$mes][$fundoId];
			}
			$balancoFundoMes[$mes]['total'] += $soma;
			$mesAnterior = $mes;
		}

		$tabelaFormatada = [];
		// setar os valores para usar no grafico
		foreach ($todosOsMeses as $idx => $mes) {
			$diaJS = $mes[0] . $mes[1] . $mes[2] . $mes[3];
			$mesJS = (int)($mes[5] . $mes[6]) - 1;
			$tabelaFormatada[$idx] = [$diaJS, $mesJS, $balancoFundoMes[$mes]['total']];
			foreach ($todosFundos as $fundo) {
				$tabelaFormatada[$idx][] = $balancoFundoMes[$mes][$fundo];
			}
		}


		// return $operacoesFinanceiras;
		// return $dataOpMaisAntiga;
		$this->set(compact('dataOpMaisAntiga', 'dataOpMaisRecente', 'todosFundos', 'todosOsMeses', 'balancoFundoMes', 'tabelaFormatada'));
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
