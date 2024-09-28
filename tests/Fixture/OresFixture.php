<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OresFixture
 */
class OresFixture extends TestFixture
{
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
                'request_date' => '2024-09-28 15:28:56',
                'measurment_date' => '2024-09-28',
            ],
        ];
        parent::init();
    }
}
