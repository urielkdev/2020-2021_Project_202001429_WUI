<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Form\FundosFiltroForm;

/**
 * Fundos Controller
 *
 */
class FundosController extends AppController {

	//var $helpers = array('Html', 'Ajax', 'Javascript', 'Form');
// In a controller or table method.

	public $paginate = array(
		'maxLimit' => 20, //Registros por página
//		'limit' => 100, //Registros por consulta
		'paramType' => 'querystring' //Esta linha analisa o parâmetro fornecido pelo link.
	);

	public function index() {
		$this->viewBuilder()->setHelpers(['Html', 'Ajax', 'Javascript', 'Form']);
		$this->redirect('/Fundos/busca');
	}

	/**
	 * Busca method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function busca() {
		//
		// filtro
		//$formFiltro = new FundosFiltroForm();
		//$formFiltro->setErrors(["email" => ["_required" => "Your email is required"]]);
		if ($this->request->is('post')) {
			if ($formFiltro->execute($this->request->getData())) {
				$this->Flash->success('We will get back to you soon.');
			} else {
				$this->Flash->error('There was a problem submitting your form.');
			}
		}
		$this->set('filtroForm', $formFiltro);
		//
		//
		$ClassesFundos = TableRegistry::getTableLocator()->get('TipoClasseFundos');
		$query = $ClassesFundos->find();
		$classeFundos = $this->paginate($query);
		$this->set(compact('classeFundos'));
		//
		$ClassesAnbima = TableRegistry::getTableLocator()->get('TipoAnbimaClasses');
		$query = $ClassesAnbima->find();
		$classeAnbima = $this->paginate($query);
		$this->set(compact('classeAnbima'));
		//
		// lista
		$CnpjFundos = TableRegistry::getTableLocator()->get('CnpjFundos');
		$query = $CnpjFundos->find()
				//->contain(['CadastroFundos' => ['TipoClasseFundos', 'TipoRentabilidadeFundos', 'AdministradorFundos'], 'DocExtratosFundos' => ['sort' => ['DocExtratosFundos.DT_COMPTC' => 'DESC']], 'SituacaoFundos' => ['sort' => ['SituacaoFundos.DT_INI_SIT' => 'DESC'], 'TipoSituacaoFundos']])
				->contain(['CadastroFundos' => ['sort' => ['CadastroFundos.DT_REG_CVM ' => 'DESC'], 'TipoClasseFundos', 'TipoRentabilidadeFundos', 'AdministradorFundos']])
				->contain(['DocExtratosFundos' => ['sort' => ['DocExtratosFundos.DT_COMPTC' => 'DESC']]])
				->contain(['SituacaoFundos' => ['sort' => ['SituacaoFundos.DT_INI_SIT' => 'DESC'], 'TipoSituacaoFundos']])
				->notMatching('CancelamentoFundos')
				->where([['CnpjFundos.DENOM_SOCIAL != ' => ' --DESCONHECIDO--']]) // e atualmente tem pelo menos 1000 cotistas (como fazer isso?)
		//->matching('SituacaoFundos', function ($q) {return $q->where(['SituacaoFundos.tipo_situacao_fundo_id' => 1]);	})
		//->andWhere('SituacaoFundos.tipo_situacao_fundo_id = 1')
		//->order('SituacaoFundos.DT_INI_SIT desc')
		;
		// aplica filtros customizados
		//$query->find()->where(['SituacaoFundos.tipo_situacao_fundo_id >= 0']);
		//
		$cnpjFundos = $this->paginate($query);
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
		$CnpjFundos = TableRegistry::getTableLocator()->get('CnpjFundos');
		$cnpjFundo = $CnpjFundos->get($id, [
			'contain' => ['DocInfDiarioFundos' => ['sort' => ['DocInfDiarioFundos.DT_COMPTC' => 'ASC']], 'CancelamentoFundos', 'CadastroFundos' => ['sort' => ['CadastroFundos.DT_REG_CVM ' => 'DESC'], 'TipoClasseFundos', 'TipoRentabilidadeFundos', 'GestorFundos', 'AdministradorFundos'],
				'DocExtratosFundos' => ['TipoAnbimaClasses'],
				'SituacaoFundos' => ['sort' => ['SituacaoFundos.DT_INI_SIT' => 'DESC'], 'TipoSituacaoFundos']],
		]);
		$this->set(compact('cnpjFundo'));
		//
		$IndicadoresFundos = TableRegistry::getTableLocator()->get('IndicadoresFundos');
		$indicadores = $IndicadoresFundos->find()->where(['cnpj_fundo_id' => $id]);
		$this->set(compact('indicadores'));
	}

	/**
	 * Comparacao method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function comparacao() {
		$IndicadoresFundos = TableRegistry::getTableLocator()->get('IndicadoresFundos');
		//$this->paginate = [
		//	'contain' => ['CnpjFundos' => ['CadastroFundos' => ['TipoClasseFundos']]],
		//];
		$indicadores = $this->paginate($IndicadoresFundos);
		$this->set(compact('indicadores'));
	}

	/**
	 * Comparacao method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function indicadores() {
		
	}

}
