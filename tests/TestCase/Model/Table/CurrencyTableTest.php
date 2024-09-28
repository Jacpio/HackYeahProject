<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CurrencyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CurrencyTable Test Case
 */
class CurrencyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CurrencyTable
     */
    protected $Currency;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Currency',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Currency') ? [] : ['className' => CurrencyTable::class];
        $this->Currency = $this->getTableLocator()->get('Currency', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Currency);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CurrencyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
