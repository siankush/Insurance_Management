<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsurancesCompanyFixture
 */
class InsurancesCompanyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'insurances_company';
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
                'insurance_company_name' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'deleted' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1677651046,
            ],
        ];
        parent::init();
    }
}
