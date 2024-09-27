<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\JsonView;
use http\Exception\BadMethodCallException;
use Cake\Mailer\Mailer;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    private string $encryption_method = 'AES-256-CBC';
    private string $key = 'NIGGAGKGKROTYREQWSAZXCVFGHJKLMNB';
    private string $iv = '1928384750293847';

    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->response = $this->response->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withType('application/json');
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
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
            return $this->response
                ->withStatus(200)
                ->withStringBody(json_encode($users));
        } else {
            return $this->response
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
            return $this->response
                ->withStatus(200)
                ->withStringBody(json_encode($user));
        } else {
            return $this->response
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

            if ($this->Users->save($user)) {

                $code = base64_encode(openssl_encrypt((string)$user->id, $this->encryption_method, $this->key, 0, $this->iv));

                $mailer = new Mailer('default');
                $mailer->setFrom(['MS_JDADuV@trial-3vz9dlepqmp4kj50.mlsender.net' => 'My Site'])
                    ->setTo($user->email)
                    ->setEmailFormat('html')
                    ->setSubject('Verify mail')
                    ->deliver('localhost:8765/api/verifyMail/'.rtrim($code, '='));
                return $this->response
                    ->withStatus(201)
                    ->withStringBody(json_encode(["message" => "User has been created"]));
            } else {
                return $this->response
                    ->withStatus(400)
                    ->withStringBody(json_encode(["message" => "User has not been created"]));
            }
        } else {
            return $this->response
                ->withStatus(405)
                ->withStringBody(json_encode(["message" => "Bad method request"]));
        }

    }
    public function confirmEmail($code) {
        $id = openssl_decrypt(base64_decode($code), $this->encryption_method, $this->key, 0, $this->iv);

        $user = $this->Users->get($id);
        if ($user->verified == true) return $this->response->withStatus(404)->withstringBody(json_encode(["message" => "Email has already been verified"]));
        $user->set('verified', true);
        if ($this->Users->save($user)) {
            return $this->response
                ->withStatus(200)
                ->withStringBody(json_encode([
                    "message" => "Email has been verified",
                    "user" => $user
                ]));
        }
        return $this->response
            ->withStatus(404)
            ->withStringBody(json_encode([
                "message" => "Invalid verification code",
            ]));
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
        if ($id == null) {
            $id = $this->request->getParam('id');
        }
        $this->request->allowMethod(['delete']);
        try {
            $user = $this->Users->get($id);
        } catch (RecordNotFoundException $exception) {
            return $this->response
                ->withStatus(404)
                ->withStringBody(json_encode(["message" => "User have not been found"]));
        }
        if ($this->Users->delete($user)) {
            return $this->response
                ->withStatus(200)
                ->withStringBody(json_encode(["message" => "User have been deleted"]));
        } else {
            return $this->response
                ->withStatus(400)
                ->withStringBody(json_encode(["message" => "User have not been deleted"]));
        }
    }
    public function options() : Response
    {
        return $this->response;
    }
}
