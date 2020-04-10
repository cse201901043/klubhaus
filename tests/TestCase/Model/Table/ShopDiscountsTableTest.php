<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopDiscountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopDiscountsTable Test Case
 */
class ShopDiscountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopDiscountsTable
     */
    public $ShopDiscounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shop_discounts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopDiscounts') ? [] : ['className' => ShopDiscountsTable::class];
        $this->ShopDiscounts = TableRegistry::get('ShopDiscounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopDiscounts);

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
