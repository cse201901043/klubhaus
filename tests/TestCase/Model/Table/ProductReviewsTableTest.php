<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductReviewsTable Test Case
 */
class ProductReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductReviewsTable
     */
    public $ProductReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_reviews',
        'app.reviews_products',
        'app.review_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductReviews') ? [] : ['className' => ProductReviewsTable::class];
        $this->ProductReviews = TableRegistry::get('ProductReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductReviews);

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
