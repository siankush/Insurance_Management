<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ErrorLog Entity
 *
 * @property int $id
 * @property string $error_level
 * @property string $error_message
 * @property \Cake\I18n\FrozenTime|null $created
 */
class ErrorLog extends Entity
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
    protected $_accessible = [
        'error_level' => true,
        'error_message' => true,
        'created' => true,
    ];
}
