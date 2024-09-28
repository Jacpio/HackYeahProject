<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\JsonView;
use Cake\Http\Client;
use Cake\I18n\DateTime;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class CurrencyController extends AppController
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

    public function viewClasses(): array
    {
        return [JsonView::class];
    }


    public function index()
    {
    }

    public function view($currency = null)
    {

        $http = new Client();
        $url = "https://api.nbp.pl/api/exchangerates/rates/c/".$currency."/";
        $response = $http->get($url);

        if ($response->isOk()) {
            $currencyByName = $this->Currency->find('all',
                [
                    'conditions' => ['name' => $currency]
                ]
            )->first();

            $jsonData = $response->getJson();
            $currencyObject = null;
            if (!$currencyByName)
            {
                $currencyObject = $this->Currency->newEntity([
                    'name' => $currency,
                    'ask' => $jsonData['rates'][0]['ask'],
                    'bid' => $jsonData['rates'][0]['bid'],
                    'effective_date' => $jsonData['rates'][0]['effectiveDate'],
                    'request_date' => DateTime::now()
                    ]);
                $this->Currency->save($currencyObject);

            }
            else {
                $currencyObject = $this->Currency->patchEntity($currencyByName,
                    [
                        'ask' => $jsonData['rates'][0]['ask'],
                        'bid' => $jsonData['rates'][0]['bid'],
                        'effective_date' => $jsonData['rates'][0]['effectiveDate'],
                        'request_date' => DateTime::now()
                    ]);
                $this->Currency->save($currencyObject);
            }


            return $this->response
                ->withStatus(200)
                ->withStringBody(json_encode(['data' => $currencyObject]));
        }
        else {
            return $this->response
                ->withStatus(404)
                ->withStringBody(json_encode(['message' => 'No currency of name ' . $currency]));
        }
        return $this->response
            ->withStatus(404)
            ->withStringBody(json_encode(['message' => 'Invalid query']));


    }

    public function add()
    {

    }

    public function delete($id = null)
    {

    }
    public function options() : Response
    {
        return $this->response;
    }
}
