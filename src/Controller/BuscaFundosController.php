<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * BuscaFundos Controller
 *
 */
class BuscaFundosController extends AppController {

// In a controller or table method.

	public $paginate = array(
		'maxLimit' => 30, //Registros por página
		'limit' => 100, //Registros por consulta
		'paramType' => 'querystring' //Esta linha analisa o parâmetro fornecido pelo link.
	);

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index() {
		$CnpjFundos = TableRegistry::getTableLocator()->get('CnpjFundos');
		$query = $CnpjFundos->find()
				->contain(['CadastroFundos' => ['TipoClasseFundos', 'TipoRentabilidadeFundos', 'AdministradorFundos'], 'DocExtratosFundos', 'SituacaoFundos' => ['TipoSituacaoFundos']])
				->where(['CnpjFundos.DENOM_SOCIAL !=' => '--DESCONHECIDO--'])
		/*
		  ->matching('CadastroFundos')
		  ->matching('DocExtratosFundos')
		  ->matching('SituacaoFundos')
		  ->select(['CnpjFundos.id', 'CnpjFundos.CNPJ', 'CnpjFundos.DENOM_SOCIAL', 'CnpjFundos.DT_REG_CVM', 'CadastroFundos.administrador_fundo_id', 'CadastroFundos.tipo_classe_fundo_id', 'CadastroFundos.tipo_rentabilidade_fundo_id', 'SituacaoFundos.tipo_situacao_fundo_id', 'DocExtratosFundos.tipo_anbima_classe_id', ], true)
		 */
		;
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
			'contain' => ['CadastroFundos' => ['TipoClasseFundos', 'TipoRentabilidadeFundos', 'GestorFundos', 'AdministradorFundos'], 'CancelamentoFundos', 'DocExtratosFundos' => ['TipoAnbimaClasses'], 'DocInfDiarioFundos', 'SituacaoFundos' => ['TipoSituacaoFundos']],
		]);

		$this->set(compact('cnpjFundo'));
	}

}
