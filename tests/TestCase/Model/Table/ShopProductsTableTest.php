<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopProductsTable Test Case
 */
class ShopProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopProductsTable
     */
    public $ShopProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shop_products',
        'app.product_categories',
        'app.product_sub_categories',
        'app.sub_categories_categories',
        'app.product_brands',
        'app.product_attribute_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopProducts') ? [] : ['className' => ShopProductsTable::class];
        $this->ShopProducts = TableRegistry::get('ShopProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopProducts);

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
