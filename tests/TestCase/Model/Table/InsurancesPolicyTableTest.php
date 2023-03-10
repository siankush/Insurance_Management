<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsurancesPolicyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsurancesPolicyTable Test Case
 */
class InsurancesPolicyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InsurancesPolicyTable
     */
    protected $InsurancesPolicy;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InsurancesPolicy',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InsurancesPolicy') ? [] : ['className' => InsurancesPolicyTable::class];
        $this->InsurancesPolicy = $this->getTableLocator()->get('InsurancesPolicy', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InsurancesPolicy);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InsurancesPolicyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
