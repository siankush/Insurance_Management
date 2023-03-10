<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompanyAsset Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $contact_listing_id
 * @property int $insurance_company_id
 * @property int $insurance_policy_id
 * @property float $premium
 * @property \Cake\I18n\FrozenTime $term_length
 * @property string $status
 * @property string $deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\InsuranceCompany $insurance_company
 * @property \App\Model\Entity\InsurancePolicy $insurance_policy
 */
class CompanyAsset extends Entity
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
        'user_id' => true,
        'contact_listing_id' => true,
        'insurance_company_id' => true,
        'insurance_policy_id' => true,
        'premium' => true,
        'term_length' => true,
        'status' => true,
        'deleted' => true,
        'policy_status' => true,
        'user' => true,
        'insurance_company' => true,
        'insurance_policy' => true,
        'contact_listing' => true,

    ];
}
