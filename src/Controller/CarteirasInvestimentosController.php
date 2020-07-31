<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarteirasInvestimentos Controller
 *
 * @property \App\Model\Table\CarteirasInvestimentosTable $CarteirasInvestimentos
 * @method \App\Model\Entity\CarteirasInvestimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarteirasInvestimentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios'],
        ];
        $carteirasInvestimentos = $this->paginate($this->CarteirasInvestimentos);

        $this->set(compact('carteirasInvestimentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Carteiras Investimento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carteirasInvestimento = $this->CarteirasInvestimentos->get($id, [
            'contain' => ['Usuarios', 'IndicadoresCarteiras', 'RelCarteirasOperacoes'],
        ]);

        $this->set(compact('carteirasInvestimento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carteirasInvestimento = $this->CarteirasInvestimentos->get($id);
        if ($this->CarteirasInvestimentos->delete($carteirasInvestimento)) {
            $this->Flash->success(__('The carteiras investimento has been deleted.'));
        } else {
            $this->Flash->error(__('The carteiras investimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
