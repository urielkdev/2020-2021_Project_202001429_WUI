<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->paginate = [
            'contain' => ['TipoPlanos', 'TipoEtapasRegistros'],
        ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['TipoPlanos', 'TipoEtapasRegistros'],
        ]);

        $this->set(compact('usuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $tipoPlanos = $this->Usuarios->TipoPlanos->find('list', ['limit' => 200]);
        $tipoEtapasRegistros = $this->Usuarios->TipoEtapasRegistros->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'tipoPlanos', 'tipoEtapasRegistros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $usuario = $this->Usuarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $tipoPlanos = $this->Usuarios->TipoPlanos->find('list', ['limit' => 200]);
        $tipoEtapasRegistros = $this->Usuarios->TipoEtapasRegistros->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'tipoPlanos', 'tipoEtapasRegistros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Register method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function register() {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            // completa campos inexistentes no formulário
            $usuario->coment = "";
            $usuario->dt_reg = date('y-m-d');
            $usuario->tipo_etapas_registro_id = 1;
            $usuario->tipo_plano_id = 1;
            //
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['controller' => 'Usuarios', 'action' => 'login', $usuario->get('id'), true]);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $tipoPlanos = $this->Usuarios->TipoPlanos->find('list', ['limit' => 200]);
        $tipoEtapasRegistros = $this->Usuarios->TipoEtapasRegistros->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'tipoPlanos', 'tipoEtapasRegistros'));
    }

    public function login($id = null, $recemRegistrado = null) {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $dadosLogin = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if (true) { //verifica login e senha
                //$session = $this->request->ss
                //$session->write('usuario', $dadosLogin);
                return $this->redirect('/');
            }
            $this->Flash->error(__('Login incooreto. Por favor, tente novamente.'));
        }
        if ($id != null) {
            $query = $this->Usuarios->find()->where('id=' . $id);
            $usuario = $query->firstOrFail();
        }
        $this->set(compact('usuario', 'recemRegistrado'));
    }
}
