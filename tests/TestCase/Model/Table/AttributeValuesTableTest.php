<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeValuesTable Test Case
 */
class AttributeValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeValuesTable
     */
    public $AttributeValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attribute_values',
        'app.attribute_values_types',
        'app.attribute_values_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttributeValues') ? [] : ['className' => AttributeValuesTable::class];
        $this->AttributeValues = TableRegistry::get('AttributeValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttributeValues);

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
