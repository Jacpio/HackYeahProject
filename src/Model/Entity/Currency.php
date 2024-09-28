<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Currency Entity
 *
 * @property int $id
 * @property string $name
 * @property float $ask
 * @property float $bid
 * @property \Cake\I18n\DateTime $request_date
 * @property \Cake\I18n\Date $effective_date
 */
class Currency extends Entity
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
        'ask' => true,
        'bid' => true,
        'request_date' => true,
        'effective_date' => true,
    ];
}
