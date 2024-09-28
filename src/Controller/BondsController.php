<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Bonds Controller
 *
 * @property \App\Model\Table\BondsTable $Bonds
 */
class BondsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Bonds->find();
        $bonds = $this->paginate($query);

        $this->set(compact('bonds'));
    }

    /**
     * View method
     *
     * @param string|null $id Bond id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bond = $this->Bonds->get($id, contain: []);
        $this->set(compact('bond'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bond = $this->Bonds->newEmptyEntity();
        if ($this->request->is('post')) {
            $bond = $this->Bonds->patchEntity($bond, $this->request->getData());
            if ($this->Bonds->save($bond)) {
                $this->Flash->success(__('The bond has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bond could not be saved. Please, try again.'));
        }
        $this->set(compact('bond'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bond id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bond = $this->Bonds->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bond = $this->Bonds->patchEntity($bond, $this->request->getData());
            if ($this->Bonds->save($bond)) {
                $this->Flash->success(__('The bond has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bond could not be saved. Please, try again.'));
        }
        $this->set(compact('bond'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bond id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bond = $this->Bonds->get($id);
        if ($this->Bonds->delete($bond)) {
            $this->Flash->success(__('The bond has been deleted.'));
        } else {
            $this->Flash->error(__('The bond could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
