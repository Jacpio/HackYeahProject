<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\View\JsonView;
use http\Exception\BadMethodCallException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];// TODO: Change the autogenerated stub
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->Users->find()->select(['id', 'username', 'points']);

        $this->set(compact('users'));
        if ($users->count() !== 0) {
            return $this->response->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($users));
        } else {
            return $this->response->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(['message' => "Users have not been found"]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->find()->select(['id', 'username', 'points'])->where(['id' => $id])
            ->enableHydration(true)->first();
        if ($user != null) {
            return $this->response->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($user));
        } else {
            return $this->response->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(['message' => "User has not been found"]));
        }
    }

    public function add()
    {
        $user = $this->Users->newEntity($this->request->getData());
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->permission_level = 0;
            $user->points = 0;
            $user->verified = 0;
            $user->password = password_hash($user->password, PASSWORD_BCRYPT, ['cost' => 12]);
            if ($this->Users->save($user)) {
                return $this->response->withType('application/json')
                    ->withStatus(201)
                    ->withStringBody(json_encode(["message" => "User has been created"]));
            } else {
                return $this->response->withType('application/json')
                    ->withStatus(400)
                    ->withStringBody(json_encode(["message" => "User has not been created"]));
            }
        } else {
            throw new BadMethodCallException();
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($id == null){
            $id = $this->request->getParam('id');
        }
        $this->request->allowMethod(['delete']);
        try {
            $user = $this->Users->get($id);
        } catch (RecordNotFoundException $exception) {
            return $this->response->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode(["message" => "User have not been found"]));
        }
        if ($this->Users->delete($user)) {
            return $this->response->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode(["message" => "User have been deleted"]));
        } else {
            return $this->response->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode(["message" => "User have not been deleted"]));
        }
    }
}
