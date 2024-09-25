<?php

namespace App\Controller;

use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\JsonView;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class LoginController extends AppController
{
    /**
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->Users = TableRegistry::getTableLocator()->get('Users');

        $this->response = $this->response->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withType('json/application');
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    public function getToken(): Response
    {
        $this->request->allowMethod(['post']);
        $user = $this->request->getData();
        $userByUsername = $this->Users->find('all',
            [
                'fields' => ['id', 'username', 'password'],
                'conditions' => ['username' => $user['username']]
            ]
        )->first();
        if (!$userByUsername) {
            return $this->response->withStatus(401)
                ->withStringBody(json_encode(['message'=>'Invalid username or password']));
        }
        if (password_verify($user['password'],  $userByUsername['password'])){
            $token = uniqid('',true);
            $userByID = $this->Users->get($userByUsername['id']);
            $userWithToken = $this->Users->patchEntity($userByID, ['token' => $token]);

            if (!$this->Users->save($userWithToken)) {
               return $this->response->withStatus(500)
                   ->withStringBody(json_encode(['message'=>'Something went wrong']));
            }
            return $this->response->withStatus(200)
                ->withHeader('X-Expires-After', '3600')
                ->withDisabledCache()
                ->withStringBody(json_encode($userWithToken));
        }else{
            return $this->response->withStatus(401)
                ->withStringBody(json_encode(['message'=>'Invalid username or password']));
        }
    }
    public function deleteToken()
    {

    }
    public function editName($id = null){

    }
    public function getInformation($id = null){

    }
}
