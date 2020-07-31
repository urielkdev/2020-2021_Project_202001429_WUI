<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RelCarteirasOperacoes Controller
 *
 * @property \App\Model\Table\RelCarteirasOperacoesTable $RelCarteirasOperacoes
 * @method \App\Model\Entity\RelCarteirasOperaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelCarteirasOperacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CarteirasInvestimentos', 'OperacoesFinanceiras'],
        ];
        $relCarteirasOperacoes = $this->paginate($this->RelCarteirasOperacoes);

        $this->set(compact('relCarteirasOperacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Rel Carteiras Operaco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relCarteirasOperaco = $this->RelCarteirasOperacoes->get($id, [
            'contain' => ['CarteirasInvestimentos', 'OperacoesFinanceiras'],
        ]);

        $this->set(compact('relCarteirasOperaco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relCarteirasOperaco = $this->RelCarteirasOperacoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $relCarteirasOperaco = $this->RelCarteirasOperacoes->patchEntity($relCarteirasOperaco, $this->request->getData());
            if ($this->RelCarteirasOperacoes->save($relCarteirasOperaco)) {
                $this->Flash->success(__('The rel carteiras operaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel carteiras operaco could not be saved. Please, try again.'));
        }
        $carteirasInvestimentos = $this->RelCarteirasOperacoes->CarteirasInvestimentos->find('list', ['limit' => 200]);
        $operacoesFinanceiras = $this->RelCarteirasOperacoes->OperacoesFinanceiras->find('list', ['limit' => 200]);
        $this->set(compact('relCarteirasOperaco', 'carteirasInvestimentos', 'operacoesFinanceiras'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rel Carteiras Operaco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relCarteirasOperaco = $this->RelCarteirasOperacoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relCarteirasOperaco = $this->RelCarteirasOperacoes->patchEntity($relCarteirasOperaco, $this->request->getData());
            if ($this->RelCarteirasOperacoes->save($relCarteirasOperaco)) {
                $this->Flash->success(__('The rel carteiras operaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel carteiras operaco could not be saved. Please, try again.'));
        }
        $carteirasInvestimentos = $this->RelCarteirasOperacoes->CarteirasInvestimentos->find('list', ['limit' => 200]);
        $operacoesFinanceiras = $this->RelCarteirasOperacoes->OperacoesFinanceiras->find('list', ['limit' => 200]);
        $this->set(compact('relCarteirasOperaco', 'carteirasInvestimentos', 'operacoesFinanceiras'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rel Carteiras Operaco id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relCarteirasOperaco = $this->RelCarteirasOperacoes->get($id);
        if ($this->RelCarteirasOperacoes->delete($relCarteirasOperaco)) {
            $this->Flash->success(__('The rel carteiras operaco has been deleted.'));
        } else {
            $this->Flash->error(__('The rel carteiras operaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
