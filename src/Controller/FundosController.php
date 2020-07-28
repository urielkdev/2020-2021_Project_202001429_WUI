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

// In a controller or table method.

	public $paginate = array(
		'maxLimit' => 30, //Registros por página
		'limit' => 100, //Registros por consulta
		'paramType' => 'querystring' //Esta linha analisa o parâmetro fornecido pelo link.
	);

	public function index() {
		$this->redirect('/Fundos/busca');
	}

	
	/**
	 * Busca method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function busca() {
		
		$formFiltro = new FundosFiltroForm();
		$formFiltro->setErrors(["email" => ["_required" => "Your email is required"]]);
        if ($this->request->is('post')) {
            if ($formFiltro->execute($this->request->getData())) {
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
		if ($this->request->is('get')) {
            $formFiltro->setData([
                'nome' => 'John Doe',
                'tipo' => 'john.doe@example.com'
            ]);
        }
        $this->set('filtroForm', $formFiltro);
		
		$CnpjFundos = TableRegistry::getTableLocator()->get('CnpjFundos');
		$query = $CnpjFundos->find()
				->contain(['CadastroFundos' => ['TipoClasseFundos', 'TipoRentabilidadeFundos', 'AdministradorFundos'], 'DocExtratosFundos', 'SituacaoFundos' => ['TipoSituacaoFundos']])
				->where(['CnpjFundos.DENOM_SOCIAL !=' => '--DESCONHECIDO--'])
				//->andWhere('SituacaoFundos.tipo_situacao_fundo_id = 1')
				//->order('SituacaoFundos.DT_INI_SIT desc')
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

	
	
	/**
	 * Comparacao method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function comparacao() {
		$RetornoRiscoFundos = TableRegistry::getTableLocator()->get('RetornoRiscoFundos');
		$this->paginate = [
			'contain' => ['CnpjFundos' => ['CadastroFundos' => ['TipoClasseFundos']]],
		];
		$retornoRiscoFundos = $this->paginate($RetornoRiscoFundos);
		$this->set(compact('retornoRiscoFundos'));
	}

		/**
	 * Comparacao method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function indicadores() {
		
	}

}
