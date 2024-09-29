<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ExpensesMathComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ExpensesMathComponent Test Case
 */
class ExpensesMathComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ExpensesMathComponent
     */
    protected $ExpensesMath;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->ExpensesMath = new ExpensesMathComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExpensesMath);

        parent::tearDown();
    }
}
