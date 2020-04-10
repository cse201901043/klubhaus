<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductBrandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductBrandsTable Test Case
 */
class ProductBrandsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductBrandsTable
     */
    public $ProductBrands;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_brands',
        'app.shop_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductBrands') ? [] : ['className' => ProductBrandsTable::class];
        $this->ProductBrands = TableRegistry::get('ProductBrands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductBrands);

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
