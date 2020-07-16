<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * CnpjFundos Controller
 *
 * @property \App\Model\Table\CnpjFundosTable $CnpjFundos
 * @method \App\Model\Entity\CnpjFundo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CnpjFundosController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index() {
		/*
		  $param = array(
		  //'contain' => array('DocExtratosFundos', 'CadastroFundos', 'SituacaoFundos'),
		  'conditions' => array(
		  'CnpjFundos.DENOM_SOCIAL <>' => '--DESCONHECIDO--',
		  //'CnpjFundos.DT_REG_CVM >' => '2019-01-01',
		  //'CnpjFundos.id' => 'CadastroFundos.cnpj_fundo_id',
		  ),

		  'joins' => array(
		  array(
		  'table' => 'cadastro_fundos',
		  'alias' => 'CadastroFundos',
		  'type' => 'INNER',
		  'foreignKey' => false,
		  'conditions' => array('CnpjFundos.id = CadastroFundos.cnpj_fundo_id'),
		  'fields' => array('CadastroFundos.*')
		  ),
		  ),

		  //'recursive' => 1, //int
		  //'fields' => array('*'), //, 'DISTINCT Model.field2'),
		  //'order' => array('CnpjFundos.CNPJ asc'),
		  //'group' => array('CnpjFundos.id'),
		  );
		  $this->recursive = -1;
		  $query = $this->CnpjFundos->find('all', $param);
		 */

		/*
		  $query = $this->CnpjFundos->find()
		  //->contain('CadastroFundos')
		  //->innerJoinWith('CadastroFundos')
		  ->matching('CadastroFundos')
		  ->select(['CnpjFundos.id', 'CnpjFundos.CNPJ', 'CnpjFundos.DENOM_SOCIAL', 'CnpjFundos.DT_REG_CVM',' CadastroFundos.cnpj_fundo_id', 'CadastroFundos.tipo_classe_fundo_id', 'CadastroFundos.tipo_rentabilidade_fundo_id']);
		 */

		/*
		  $query = $this->CnpjFundos->find()
		  //-where(['CnpjFundos.DENOM_SOCIAL <>' => '--DESCONHECIDO--']),
		  ->matching('CadastroFundos')
		  ->matching('DocExtratosFundos')
		  ->matching('SituacaoFundos');
		 */

		$query = $this->CnpjFundos->find()
				/*
				->contain('CadastroFundos', function ($q) {
					return $q->select(['cnpj_fundo_id', 'DT_CONST', 'tipo_classe_fundo_id', 'tipo_rentabilidade_fundo_id'])->where(['CnpjFundos.id' => 'CadastroFundos.cnpj_fundo_id']);
				})
				->contain('DocExtratosFundos')
				->contain('SituacaoFundos')
				*/
				->matching('CadastroFundos')
				->matching('DocExtratosFundos')
				->matching('SituacaoFundos')
				->select(['CnpjFundos.id', 'CnpjFundos.CNPJ', 'CnpjFundos.DENOM_SOCIAL', 'CnpjFundos.DT_REG_CVM',
					'CadastroFundos.administrador_fundo_id', 'CadastroFundos.tipo_classe_fundo_id', 'CadastroFundos.tipo_rentabilidade_fundo_id',
					'SituacaoFundos.tipo_situacao_fundo_id',
					'DocExtratosFundos.tipo_anbima_classe_id',
					], true)
		//->where('CnpjFundos.DENOM_SOCIAL !=' => '--DESCONHECIDO--')
		//
		//->innerJoinWith('CadastroFundos')
		//->innerJoinWith('DocExtratosFundos')
		//->innerJoinWith('SituacaoFundos')
		//->innerJoin('tipo_classe_fundos', 'cadastro_fundos.tipo_classe_fundo_id = tipo_classe_fundos.id')
		/* ->join([ 
		  'cad' => [
		  'table' => 'cadastro_fundos',
		  'type' => 'INNER',
		  'conditions' => 'cad.cnpj_fundo_id = CnpjFundos.id',
		  ],
		  ]) */
		;

		$cnpjFundos = $this->paginate($query);
		//$cnpjFundos->doc_extratos_fundos->tipo_anbima_classe_id
		$this->set(compact('cnpjFundos'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Cnpj Fundo id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$cnpjFundo = $this->CnpjFundos->get($id, [
			'contain' => ['CadastroFundos', 'CancelamentoFundos', 'DocExtratosFundos', 'DocInfDiarioFundos', 'SituacaoFundos'],
		]);

		$this->set(compact('cnpjFundo'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$cnpjFundo = $this->CnpjFundos->newEmptyEntity();
		if ($this->request->is('post')) {
			$cnpjFundo = $this->CnpjFundos->patchEntity($cnpjFundo, $this->request->getData());
			if ($this->CnpjFundos->save($cnpjFundo)) {
				$this->Flash->success(__('The cnpj fundo has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The cnpj fundo could not be saved. Please, try again.'));
		}
		$this->set(compact('cnpjFundo'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Cnpj Fundo id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$cnpjFundo = $this->CnpjFundos->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$cnpjFundo = $this->CnpjFundos->patchEntity($cnpjFundo, $this->request->getData());
			if ($this->CnpjFundos->save($cnpjFundo)) {
				$this->Flash->success(__('The cnpj fundo has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The cnpj fundo could not be saved. Please, try again.'));
		}
		$this->set(compact('cnpjFundo'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Cnpj Fundo id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$cnpjFundo = $this->CnpjFundos->get($id);
		if ($this->CnpjFundos->delete($cnpjFundo)) {
			$this->Flash->success(__('The cnpj fundo has been deleted.'));
		} else {
			$this->Flash->error(__('The cnpj fundo could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}
