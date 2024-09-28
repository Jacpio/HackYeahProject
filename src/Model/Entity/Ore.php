<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ore Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\DateTime $request_date
 * @property \Cake\I18n\Date $measurment_date
 */
class Ore extends Entity
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
        'buy' => true,
        'sell' => true,
        'request_date' => true,
        'measurment_date' => true,

    ];
}
