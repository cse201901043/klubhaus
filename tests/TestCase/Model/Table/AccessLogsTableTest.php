<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccessLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccessLogsTable Test Case
 */
class AccessLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccessLogsTable
     */
    public $AccessLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.access_logs',
        'app.users',
        'app.macs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AccessLogs') ? [] : ['className' => AccessLogsTable::class];
        $this->AccessLogs = TableRegistry::get('AccessLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccessLogs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
