<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $points
 * @property bool $two_factor
 * @property string|null $token
 * @property int $login_attempts
 * @property \Cake\I18n\DateTime $last_login_attempt
 * @property int $two_factor_code
 * @property \Cake\I18n\DateTime $created
 * @property bool|null $verified
 * @property int permission_level
 */
class User extends Entity
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
        'username' => true,
        'email' => true,
        'password' => true,
        'points' => true,
        'two_factor' => true,
        'token' => true,
        'login_attempts' => true,
        'last_login_attempt' => true,
        'two_factor_code' => true,
        'created' => true,
        'verified' => true,
        'permission_level' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected function _setPassword(string $password){
        if (strlen($password) > 0) {
            return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        }
    }
    protected array $_hidden = [
        'password',
        'token',
    ];
}
