<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BuscaFundos Controller
 *
 * @property \App\Model\Table\CnpjFundosTable $CnpjFundos
 * @method \App\Model\Entity\CnpjFundo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuscaFundosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        echo("Controller");
		exit();
        $this->set(compact('buscaFundos'));
    }


}
