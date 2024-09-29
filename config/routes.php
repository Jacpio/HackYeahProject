<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->scope('/api/', function (RouteBuilder $b): void {
            $b->setExtensions(['json']);

            $b->connect('/verifyMail/{code}', ['controller' => 'Users', 'action' => 'confirmEmail', '_method' => 'GET'])->setPass(['code']);

            $b->connect('/users', ['controller' => 'Users', 'action' => 'index', '_method' => 'GET']);
            $b->connect('/users', ['controller' => 'Users', 'action' => 'options', '_method' => 'OPTIONS']);
            $b->connect('/users', ['controller' => 'Users', 'action' => 'add', '_method' => 'POST']);
            $b->connect('/users/{id}', ['controller' => 'Users', 'action' => 'edit', '_method' => 'PUT'])->setPass(['id']);
            $b->connect('/users/{id}', ['controller' => 'Users', 'action' => 'view', '_method' => 'GET'])->setPass(['id']);
            $b->connect('/users/{id}', ['controller' => 'Users', 'action' => 'delete', '_method' => 'DELETE'])->setPass(['id']);

            $b->connect('/login', ['controller' => 'Login', 'action' => 'getToken', '_method' => 'POST']);
            $b->connect('/login', ['controller' => 'Login', 'action' => 'options', '_method' => 'OPTIONS']);
            $b->connect('/login/{id}', ['controller' => 'Login', 'action' => 'deleteToken', '_method' => 'DELETE'])->setPass(['id']);
            $b->connect('/login/{id}', ['controller' => 'Login', 'action' => 'editName', '_method' => 'PUT'])->setPass(['id']);
            $b->connect('/login/{id}', ['controller' => 'Login', 'action' => 'getInformation', '_method' => 'GET'])->setPass(['id']);

            $b->connect('/twoFactorAuth/{id}', ['controller' => 'Login', 'action' => 'TwoFactorAuth', '_method' => 'POST'])->setPass(['id']);

            $b->connect('/expenses/{user_id}', ['controller' => 'Expenses', 'action' => 'index', '_method' => 'GET'])->setPass(['user_id']);
            $b->connect('/expenses/{user_id}/expense/{expense_id}', ['controller' => 'Expenses', 'action' => 'view', '_method' => 'GET'])->setPass(['user_id', 'expense_id']);
            $b->connect('/expenses/{user_id}', ['controller' => 'Expenses', 'action' => 'add', '_method' => 'POST'])->setPass(['user_id']);
            $b->connect('/expenses/{user_id}/expense/{expense_id}', ['controller' => 'Expenses', 'action' => 'edit', '_method' => 'PUT'])->setPass(['user_id', 'expense_id']);
            $b->connect('/expenses/{user_id}/expense/{expense_id}', ['controller' => 'Expenses', 'action' => 'delete', '_method' => 'DELETE'])->setPass(['user_id', 'expense_id']);
            $b->connect('/expenses/categories', ['controller' => 'Expenses', 'action' => 'getCategories', '_method' => 'GET']);
            $b->connect('/expenses', ['controller' => 'Expenses', 'action' => 'options', '_method' => 'OPTIONS']);

            $b->connect('/expenses/calc/{user_id}', ['controller' => 'Expenses', 'action' => 'calculateExpenses', '_method' => 'GET'])->setPass(['user_id']);
            $b->connect('/expenses/calc/{user_id}/category/{category_id}', ['controller' => 'Expenses', 'action' => 'calculateExpensesByCategory', '_method' => 'GET'])->setPass(['user_id','category_id']);
            $b->connect('/expenses/calc/paid/{user_id}', ['controller' => 'Expenses', 'action' => 'calculatePaidExpenses', '_method' => 'GET'])->setPass(['user_id']);
            $b->connect('/expenses/calc/paid/avg/{user_id}', ['controller' => 'Expenses', 'action' => 'calculatePaidExpensesAvg', '_method' => 'GET'])->setPass(['user_id']);


            $b->connect('/docs/', ['controller' => 'Docs', 'action' => 'index', '_method' => 'GET']);
            $b->connect('/curr/', ['controller' => 'Currency', 'action'=>'index', '_method' => 'GET']);
            $b->connect('/curr/{currency}', ['controller' => 'Currency', 'action'=>'view', '_method' => 'GET'])->setPass(['currency']);

            $b->connect('/ores/{id}', ['controller' => 'Ores', 'action' => 'view', '_method' => 'GET'])->setPass(['id']);

            $b->connect('/bonds/{id}', ['controller' => 'Bonds', 'action' => 'view', '_method' => 'GET'])->setPass(['id']);
            $b->connect('/bonds/interest/{months}', ['controller' => 'Bonds', 'action' => 'calcInterest', '_method' => 'POST'])->setPass(['months']);

            $b->connect('/stocks/{id}', ['controller' => 'Stocks', 'action' => 'view', '_method' => 'GET'])->setPass(['id']);
        });
        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks(DashedRoute::class);
    });
};
