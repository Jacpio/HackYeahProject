<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ExpensesComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ExpensesComponent Test Case
 */
class ExpensesComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ExpensesComponent
     */
    protected $Expenses;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Expenses = new ExpensesComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Expenses);

        parent::tearDown();
    }
}
