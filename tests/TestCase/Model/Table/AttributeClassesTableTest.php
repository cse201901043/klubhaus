<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeClassesTable Test Case
 */
class AttributeClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeClassesTable
     */
    public $AttributeClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttributeClasses') ? [] : ['className' => AttributeClassesTable::class];
        $this->AttributeClasses = TableRegistry::get('AttributeClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeClasses);

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
