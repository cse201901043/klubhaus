<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMetasTable Test Case
 */
class UserMetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserMetasTable
     */
    public $UserMetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_metas',
        'app.meta_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserMetas') ? [] : ['className' => UserMetasTable::class];
        $this->UserMetas = TableRegistry::get('UserMetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserMetas);

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
