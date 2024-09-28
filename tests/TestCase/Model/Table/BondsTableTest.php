<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BondsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BondsTable Test Case
 */
class BondsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BondsTable
     */
    protected $Bonds;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Bonds',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bonds') ? [] : ['className' => BondsTable::class];
        $this->Bonds = $this->getTableLocator()->get('Bonds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Bonds);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BondsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
