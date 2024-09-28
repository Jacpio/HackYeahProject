<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrencyFixture
 */
class CurrencyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'currency';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ips',
                'ask' => 1,
                'bid' => 1,
                'request_date' => '2024-09-28 13:24:31',
                'effective_date' => '2024-09-28',
            ],
        ];
        parent::init();
    }
}
