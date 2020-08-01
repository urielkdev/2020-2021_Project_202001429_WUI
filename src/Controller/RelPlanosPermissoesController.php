<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RelPlanosPermissoes Controller
 *
 * @property \App\Model\Table\RelPlanosPermissoesTable $RelPlanosPermissoes
 * @method \App\Model\Entity\RelPlanosPermisso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelPlanosPermissoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TipoPlanos', 'Permissaos'],
        ];
        $relPlanosPermissoes = $this->paginate($this->RelPlanosPermissoes);

        $this->set(compact('relPlanosPermissoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Rel Planos Permisso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relPlanosPermisso = $this->RelPlanosPermissoes->get($id, [
            'contain' => ['TipoPlanos', 'Permissaos'],
        ]);

        $this->set(compact('relPlanosPermisso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relPlanosPermisso = $this->RelPlanosPermissoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $relPlanosPermisso = $this->RelPlanosPermissoes->patchEntity($relPlanosPermisso, $this->request->getData());
            if ($this->RelPlanosPermissoes->save($relPlanosPermisso)) {
                $this->Flash->success(__('The rel planos permisso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel planos permisso could not be saved. Please, try again.'));
        }
        $tipoPlanos = $this->RelPlanosPermissoes->TipoPlanos->find('list', ['limit' => 200]);
        $permissaos = $this->RelPlanosPermissoes->Permissaos->find('list', ['limit' => 200]);
        $this->set(compact('relPlanosPermisso', 'tipoPlanos', 'permissaos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rel Planos Permisso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relPlanosPermisso = $this->RelPlanosPermissoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relPlanosPermisso = $this->RelPlanosPermissoes->patchEntity($relPlanosPermisso, $this->request->getData());
            if ($this->RelPlanosPermissoes->save($relPlanosPermisso)) {
                $this->Flash->success(__('The rel planos permisso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel planos permisso could not be saved. Please, try again.'));
        }
        $tipoPlanos = $this->RelPlanosPermissoes->TipoPlanos->find('list', ['limit' => 200]);
        $permissaos = $this->RelPlanosPermissoes->Permissaos->find('list', ['limit' => 200]);
        $this->set(compact('relPlanosPermisso', 'tipoPlanos', 'permissaos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rel Planos Permisso id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relPlanosPermisso = $this->RelPlanosPermissoes->get($id);
        if ($this->RelPlanosPermissoes->delete($relPlanosPermisso)) {
            $this->Flash->success(__('The rel planos permisso has been deleted.'));
        } else {
            $this->Flash->error(__('The rel planos permisso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
