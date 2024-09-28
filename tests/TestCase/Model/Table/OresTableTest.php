<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OresTable Test Case
 */
class OresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OresTable
     */
    protected $Ores;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ores') ? [] : ['className' => OresTable::class];
        $this->Ores = $this->getTableLocator()->get('Ores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
