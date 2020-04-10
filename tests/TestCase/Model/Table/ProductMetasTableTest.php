<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductMetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductMetasTable Test Case
 */
class ProductMetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductMetasTable
     */
    public $ProductMetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_metas',
        'app.meta_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductMetas') ? [] : ['className' => ProductMetasTable::class];
        $this->ProductMetas = TableRegistry::get('ProductMetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductMetas);

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
