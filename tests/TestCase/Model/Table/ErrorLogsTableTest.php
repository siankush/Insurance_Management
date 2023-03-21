<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ErrorLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ErrorLogsTable Test Case
 */
class ErrorLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ErrorLogsTable
     */
    protected $ErrorLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ErrorLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ErrorLogs') ? [] : ['className' => ErrorLogsTable::class];
        $this->ErrorLogs = $this->getTableLocator()->get('ErrorLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ErrorLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ErrorLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
