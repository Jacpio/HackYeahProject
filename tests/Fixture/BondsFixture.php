<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BondsFixture
 */
class BondsFixture extends TestFixture
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
                'series' => 1,
                'price' => 1,
                'interest' => 1,
            ],
        ];
        parent::init();
    }
}
