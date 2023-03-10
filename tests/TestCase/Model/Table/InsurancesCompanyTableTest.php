<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsurancesCompanyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsurancesCompanyTable Test Case
 */
class InsurancesCompanyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InsurancesCompanyTable
     */
    protected $InsurancesCompany;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InsurancesCompany',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InsurancesCompany') ? [] : ['className' => InsurancesCompanyTable::class];
        $this->InsurancesCompany = $this->getTableLocator()->get('InsurancesCompany', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InsurancesCompany);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InsurancesCompanyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
