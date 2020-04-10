<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductRatingsTable Test Case
 */
class ProductRatingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductRatingsTable
     */
    public $ProductRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_ratings',
        'app.ratings_products',
        'app.rate_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductRatings') ? [] : ['className' => ProductRatingsTable::class];
        $this->ProductRatings = TableRegistry::get('ProductRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductRatings);

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
