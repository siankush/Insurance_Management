<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyAssetsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyAssetsTable Test Case
 */
class CompanyAssetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyAssetsTable
     */
    protected $CompanyAssets;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CompanyAssets',
        'app.Users',
        'app.InsuranceCompanies',
        'app.InsurancePolicies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CompanyAssets') ? [] : ['className' => CompanyAssetsTable::class];
        $this->CompanyAssets = $this->getTableLocator()->get('CompanyAssets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CompanyAssets);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompanyAssetsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CompanyAssetsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
