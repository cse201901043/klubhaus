<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductStocksDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductStocksDetailsTable Test Case
 */
class ProductStocksDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductStocksDetailsTable
     */
    public $ProductStocksDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_stocks_details',
        'app.stocks_products',
        'app.stocks_attribute_classes',
        'app.stocks_attribute_types',
        'app.stocks_attribute_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductStocksDetails') ? [] : ['className' => ProductStocksDetailsTable::class];
        $this->ProductStocksDetails = TableRegistry::get('ProductStocksDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductStocksDetails);

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
