<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * ExpensesMath component
 */
class ExpensesMathComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function depositByCurrently(array $currently, array $deposit)
    {
        $finalTable = [];
        for ($i = 0; $i < count($currently); $i++) {
            $finalTable[$i] = round( $deposit[$i] / $currently[$i] * 100,2);
        }
        return $finalTable;
    }
    public function calcPercentExpenses(array $expenses){
        $sum = 0;
        $arrayPercent = [];
        foreach ($expenses as $expense){
            $sum += $expense;
        }
        foreach ($expenses as $expense){
             array_push($arrayPercent, round(($expense / $sum) * 100, 2) );
        }
        return $arrayPercent;
    }
    public function mergeTable(array $expenses, array $names)
    {
        $finalArray = [];
        for ($i = 0; $i < count($expenses); $i++) {
            $finalArray[$i] = [$names[$i] => $expenses[$i]];
        }
        return $finalArray;
    }
}
