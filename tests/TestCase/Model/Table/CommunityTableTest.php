<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommunityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommunityTable Test Case
 */
class CommunityTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommunityTable
     */
    public $Community;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.community'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Community') ? [] : ['className' => CommunityTable::class];
        $this->Community = TableRegistry::get('Community', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Community);

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
}
