<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ECategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ECategoryTable Test Case
 */
class ECategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ECategoryTable
     */
    protected $ECategory;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ECategory',
        'app.Expenses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ECategory') ? [] : ['className' => ECategoryTable::class];
        $this->ECategory = $this->getTableLocator()->get('ECategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ECategory);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ECategoryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
