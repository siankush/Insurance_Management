<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsurancePoliciesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsurancePoliciesTable Test Case
 */
class InsurancePoliciesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InsurancePoliciesTable
     */
    protected $InsurancePolicies;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InsurancePolicies',
        'app.InsuranceCompanies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InsurancePolicies') ? [] : ['className' => InsurancePoliciesTable::class];
        $this->InsurancePolicies = $this->getTableLocator()->get('InsurancePolicies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InsurancePolicies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InsurancePoliciesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InsurancePoliciesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
