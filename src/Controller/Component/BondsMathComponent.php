<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class BondsMathComponent extends Component
{
    public function calculateProfit($months, $bond) {
        $principal = $bond['price'];
        $annualInterestRate = $bond['interest'];
        $years = $months / 12;
        $compoundPeriodsPerYear = 2;
        $amount = $principal * pow(1 + ($annualInterestRate / $compoundPeriodsPerYear), $compoundPeriodsPerYear * $years);
        $profit = $amount - $principal;

        return round($profit,2);
    }
}
