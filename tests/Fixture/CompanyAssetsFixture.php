<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompanyAssetsFixture
 */
class CompanyAssetsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'contact_listing_id' => 1,
                'insurance_company_id' => 1,
                'insurance_policy_id' => 1,
                'premium' => 1,
                'term_length' => '',
                'status' => 'Lorem ipsum dolor sit amet',
                'deleted' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
