<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsurancesPolicyFixture
 */
class InsurancesPolicyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'insurances_policy';
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
                'insurance_company_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'insurance_type_code' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'deleted' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1677817546,
            ],
        ];
        parent::init();
    }
}
