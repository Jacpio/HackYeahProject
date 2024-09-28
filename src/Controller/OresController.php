<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ores Controller
 *
 * @property \App\Model\Table\OresTable $Ores
 */
class OresController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->response = $this->response->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withType('application/json');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ores->find();
        $ores = $this->paginate($query);

        $this->set(compact('ores'));
    }

    /**
     * View method
     *
     * @param string|null $id Ore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ore = $this->Ores->get($id, contain: []);
        return $this->response->withStatus(200)->withStringBody(json_encode($ore));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ore = $this->Ores->newEmptyEntity();
        if ($this->request->is('post')) {
            $ore = $this->Ores->patchEntity($ore, $this->request->getData());
            if ($this->Ores->save($ore)) {
                $this->Flash->success(__('The ore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ore could not be saved. Please, try again.'));
        }
        $this->set(compact('ore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ore = $this->Ores->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ore = $this->Ores->patchEntity($ore, $this->request->getData());
            if ($this->Ores->save($ore)) {
                $this->Flash->success(__('The ore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ore could not be saved. Please, try again.'));
        }
        $this->set(compact('ore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ore = $this->Ores->get($id);
        if ($this->Ores->delete($ore)) {
            $this->Flash->success(__('The ore has been deleted.'));
        } else {
            $this->Flash->error(__('The ore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
