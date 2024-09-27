<?php

namespace App\Controller;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\JsonView;
use Cake\I18n\DateTime;
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
        try {
            $user = $this->request->getData();
        } catch (BadRequestException $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode(['message' => 'Invalid query']));
        }
        $userByUsername = $this->Users->find('all',
            [
                'fields' => ['id', 'username', 'password'],
                'conditions' => ['username' => $user['username']]
            ]
        )->first();
        if (!$userByUsername) {
            return $this->response->withStatus(401)
                ->withStringBody(json_encode(['message' => 'Invalid username or password']));
        }
        if (password_verify($user['password'], $userByUsername['password'])) {
            $token = uniqid('', true);
            $userByID = $this->Users->get($userByUsername['id']);
            $userWithToken = $this->Users->patchEntity($userByID, ['token' => $token]);

            if (!$this->Users->save($userWithToken)) {
                return $this->response->withStatus(500)
                    ->withStringBody(json_encode(['message' => 'Something went wrong']));
            }
            return $this->response->withStatus(200)
                ->withHeader('X-Expires-After', '3600')
                ->withDisabledCache()
                ->withStringBody(json_encode(['token' => $token, 'userdata' => $userWithToken]));
        }
        else {
            $currentAttempts = $userByUsername['login_attempts'];
            $this->Users->patchEntity($userByUsername, ['login_attempts' => (int)$currentAttempts + 1, 'last_login_attempt' => DateTime::now()]);

            $this->Users->save($userByUsername);
            return $this->response->withStatus(401)
                ->withStringBody(json_encode(['message' => 'Invalid username or password']));
        }
    }

    public function deleteToken($id = null): Response
    {
        $token = $this->request->getHeader('Authorization');
        if ($id !== null && count($token) > 0) {
            $user = $this->Users->get($id);
            if ($user->token != null) {
                if ($user->token == $token[0]) {
                    $userWithoutToken = $this->Users->patchEntity($user, ['token' => null]);
                    if ($this->Users->save($userWithoutToken)) {
                        return $this->response->withStatus(200)
                            ->withStringBody(json_encode(['message' => 'Token has been deleted']));
                    } else {
                        return $this->response
                            ->withStatus(500)
                            ->withStringBody(json_encode(['message' => 'Internal Server Error']));
                    }
                } else {
                    return $this->response->withStatus(401)
                        ->withStringBody(json_encode(["message" => "Invalid ID or Token"]));
                }
            } else {
                return $this->response->withStatus(404)->withStringBody(json_encode(['message' => 'User has not been found']));
            }
        } else return $this->response
            ->withStatus(400)
            ->withStringBody(json_encode(['message' => 'Invalid query']));

    }

    public function editName($id = null)
    {
        $token = $this->request->getHeader('Authorization');
        if ($id !== null && count($token) > 0) {
            $user = $this->Users->get($id);
            if ($user->token != null) {
                if ($user->token == $token[0]) {
                    $newUserName = $this->request->getData('username');
                    if ($newUserName == null) {
                        return $this->response->withStatus(400)
                            ->withStringBody(json_encode(['message' => 'Invalid query']));
                    } else {
                        $this->Users->patchEntity($user, ['username' => $newUserName]);
                        if ($this->Users->save($user)) {
                            return $this->response->withStatus(200)
                            ->withStringBody(json_encode(["message" => "Name has been updated to " . $newUserName]));
                        }else{
                            return $this->response->withStatus(500)
                                ->withStringBody(json_encode(["message" => "Internal Server Error"]));
                        }
                    }
                } else {
                    return $this->response->withStatus(401)
                        ->withStringBody(json_encode(["message" => "Invalid ID or Token"]));
                }
            } else {
                return $this->response->withStatus(404)->withStringBody(json_encode(['message' => 'User has not been found']));
            }
        } else return $this->response
            ->withStatus(400)
            ->withStringBody(json_encode(['message' => 'Invalid query']));
    }

    public function getInformation($id = null)
    {
        $token = $this->request->getHeader('Authorization');
        if ($id !== null && count($token) > 0) {
            $user = $this->Users->get($id);
            if ($user->token != null) {
                if ($user->token == $token[0]) {
                    return $this->response->withStatus(200)->withStringBody(json_encode($user));
                } else {
                    return $this->response->withStatus(401)
                        ->withStringBody(json_encode(["message" => "Invalid ID or Token"]));
                }
            } else {
                return $this->response->withStatus(404)->withStringBody(json_encode(['message' => 'User has not been found']));
            }
        } else return $this->response
            ->withStatus(400)
            ->withStringBody(json_encode(['message' => 'Invalid query']));
    }
    public function options() : Response
    {
        return $this->response;
    }
}
