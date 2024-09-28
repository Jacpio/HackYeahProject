<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Exception\RecordNotFoundException;
use Cake\Http\Exception\NotFoundException;
/**
 * Bonds Controller
 *
 * @property \App\Model\Table\BondsTable $Bonds
 */
class BondsController extends AppController
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
        try {
            // Try to get the bond by ID
            $bond = $this->Bonds->get($id);

            // Return the bond if found
            return $this->response
                ->withStatus(200)
                ->withType('application/json')
                ->withStringBody(json_encode($bond));

        } catch (RecordNotFoundException $e) {
            // Catch the RecordNotFoundException and return a 404 response
            throw new NotFoundException(__('Bond not found'));
        }
    }
}
