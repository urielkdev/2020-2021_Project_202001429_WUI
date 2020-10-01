<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * OperacoesFinanceiras Controller
 *
 * @property \App\Model\Table\OperacoesFinanceirasTable $OperacoesFinanceiras
 * @method \App\Model\Entity\OperacoesFinanceira[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperacoesFinanceirasController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index($carteiras_investimento_id = 0) {

		$this->paginate = [
			'contain' => ['CarteirasInvestimentos', 'CnpjFundos', 'DistribuidorFundos', 'TipoOperacoesFinanceiras'],
		];
		$operacoesFinanceiras = $this->paginate($this->OperacoesFinanceiras);

		$this->set(compact('operacoesFinanceiras'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Operacoes Financeira id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$operacoesFinanceira = $this->OperacoesFinanceiras->get($id, [
			'contain' => ['CarteirasInvestimentos', 'CnpjFundos', 'DistribuidorFundos', 'TipoOperacoesFinanceiras'],
		]);

		$this->set(compact('operacoesFinanceira'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add($carteiras_investimento_id = 1) {
		$operacoesFinanceira = $this->OperacoesFinanceiras->newEmptyEntity();
		if ($this->request->is('post')) {
			$operacoesFinanceira = $this->OperacoesFinanceiras->patchEntity($operacoesFinanceira, $this->request->getData());
			
			var_dump($operacoesFinanceira);
			exit();
			if ($this->OperacoesFinanceiras->save($operacoesFinanceira)) {
				$this->Flash->success(__('The operacoes financeira has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The operacoes financeira could not be saved. Please, try again.'));
		}
		$carteirasInvestimentos = $this->OperacoesFinanceiras->CarteirasInvestimentos->find()->where(['id' => $carteiras_investimento_id])->first();
		//var_dump($carteirasInvestimentos); exit();
//find('list', ['limit' => 200]);
		//$cnpjFundos = $this->OperacoesFinanceiras->CnpjFundos->find('list', ['limit' => 200]);
		$distribuidorFundos = $this->OperacoesFinanceiras->DistribuidorFundos->find('list', ['limit' => 200]);
		$tipoOperacoesFinanceiras = $this->OperacoesFinanceiras->TipoOperacoesFinanceiras->find('list', ['limit' => 200]);
		//var_dump($tipoOperacoesFinanceiras); exit();
		$this->set(compact('operacoesFinanceira', 'carteirasInvestimentos', 'distribuidorFundos', 'tipoOperacoesFinanceiras')); //'cnpjFundos', 
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Operacoes Financeira id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$operacoesFinanceira = $this->OperacoesFinanceiras->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$operacoesFinanceira = $this->OperacoesFinanceiras->patchEntity($operacoesFinanceira, $this->request->getData());
			if ($this->OperacoesFinanceiras->save($operacoesFinanceira)) {
				$this->Flash->success(__('The operacoes financeira has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The operacoes financeira could not be saved. Please, try again.'));
		}
		$carteirasInvestimentos = $this->OperacoesFinanceiras->CarteirasInvestimentos->find('list', ['limit' => 200]);
		$cnpjFundos = $this->OperacoesFinanceiras->CnpjFundos->find('list', ['limit' => 200]);
		$distribuidorFundos = $this->OperacoesFinanceiras->DistribuidorFundos->find('list', ['limit' => 200]);
		$tipoOperacoesFinanceiras = $this->OperacoesFinanceiras->TipoOperacoesFinanceiras->find('list', ['limit' => 200]);
		$this->set(compact('operacoesFinanceira', 'carteirasInvestimentos', 'cnpjFundos', 'distribuidorFundos', 'tipoOperacoesFinanceiras'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Operacoes Financeira id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$operacoesFinanceira = $this->OperacoesFinanceiras->get($id);
		if ($this->OperacoesFinanceiras->delete($operacoesFinanceira)) {
			$this->Flash->success(__('The operacoes financeira has been deleted.'));
		} else {
			$this->Flash->error(__('The operacoes financeira could not be deleted. Please, try again.'));
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
