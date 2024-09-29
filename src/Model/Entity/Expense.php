<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $currency
 * @property int|null $user_id
 * @property int $category_id
 * @property float $deposit
 * @property \Cake\I18n\Date $date
 *
 * @property \App\Model\Entity\User $user
 */
class Expense extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'currency' => true,
        'user_id' => true,
        'category_id' => true,
        'user' => true,
        'date' => true,
        'deposit' => true,
    ];
    protected array $_hidden = [
        'category_id',
        'user_id',
    ];
}
