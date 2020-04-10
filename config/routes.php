<?php





use Cake\Core\Plugin;

use Cake\Routing\RouteBuilder;

use Cake\Routing\Router;

use Cake\Routing\Route\DashedRoute;



Router::defaultRouteClass(DashedRoute::class);



Router::scope('/', function (RouteBuilder $routes) {



    $routes->setExtensions(['json', 'xml', 'html', 'php']);



    

//    admin start


    $routes->connect('amaderadmin', ['controller' => 'Users', 'action' => 'AdminAdminlogin']);
    $routes->connect('users/adminLogin', ['controller' => 'Users', 'action' => 'adminLogin']);
    $routes->connect('users/admin-home', ['controller' => 'Users', 'action' => 'adminHome']);
    $routes->connect('users/admin-logout', ['controller' => 'Users', 'action' => 'AdminAdminlogin']);
    $routes->connect('users/admin-adminlogin', ['controller' => 'Users', 'action' => 'AdminAdminlogin']);
    $routes->connect('attribute-classes/admin-attribute-settings', ['controller' => 'AttributeClasses', 'action' => 'AdminAttributeSettings']);
    $routes->connect('users/admin-users-add', ['controller' => 'Users', 'action' => 'AdminUsersAdd']);
    $routes->connect('users/AdminAddUsers', ['controller' => 'Users', 'action' => 'AdminAddUsers']);
    $routes->connect('users/AdmineditUserInfo/*', ['controller' => 'Users', 'action' => 'AdmineditUserInfo']);
    $routes->connect('users/admin-view-user-list', ['controller' => 'Users', 'action' => 'AdminViewUserList']);
    $routes->connect('users/AdminUserStatusPublish/*', ['controller' => 'Users', 'action' => 'AdminUserStatusPublish']);
    $routes->connect('users/AdminUserStatusNotPublish/*', ['controller' => 'Users', 'action' => 'AdminUserStatusNotPublish']);
    $routes->connect('users/AdminDeleteUser/*', ['controller' => 'Users', 'action' => 'AdminDeleteUser']);
    $routes->connect('users/AdminsingleEditUser', ['controller' => 'Users', 'action' => 'AdminsingleEditUser']);
    $routes->connect('users/admin-logout', ['controller' => 'Users', 'action' => 'AdminAdminlogin']);
    $routes->connect('orders/admin-order-list', ['controller' => 'Orders', 'action' => 'AdminOrderList']);
    $routes->connect('orders/adminorder-record', ['controller' => 'Orders', 'action' => 'AdminorderRecord']);
    $routes->connect('shop-products/admininsta-download', ['controller' => 'ShopProducts', 'action' => 'AdmininstaDownload']);
    $routes->connect('shop-products/adminret-rive-image', ['controller' => 'ShopProducts', 'action' => 'AdminretRiveImage']);
    $routes->connect('ProductSubCategories/AdmingetSubCategoriesData', ['controller' => 'ProductSubCategories', 'action' => 'AdmingetSubCategoriesData']);
    $routes->connect('ShopProducts/AdmininstragramImageSave', ['controller' => 'ShopProducts', 'action' => 'AdmininstragramImageSave']);
    $routes->connect('attribute-values/adminadvanced-edit', ['controller' => 'AttributeValues', 'action' => 'AdminadvancedEdit']);
    $routes->connect('attribute-classes/adminedit-attribute-class', ['controller' => 'AttributeClasses', 'action' => 'AdmineditAttributeClass']);
    $routes->connect('attribute-types/adminedit-attribute-type', ['controller' => 'AttributeTypes', 'action' => 'AdmineditAttributeType']);
    $routes->connect('attribute-values/adminedit-attribute-value', ['controller' => 'AttributeValues', 'action' => 'AdmineditAttributeValue']);
    $routes->connect('attribute-values/adminsingle-edit-value/*', ['controller' => 'AttributeValues', 'action' => 'AdminsingleEditValue']);
    $routes->connect('AttributeValues/AdminsingleEditValuesData', ['controller' => 'AttributeValues', 'action' => 'AdminsingleEditValuesData']);
    $routes->connect('attribute-classes/adminsingle-edit-class/*', ['controller' => 'AttributeClasses', 'action' => 'AdminsingleEditClass']);
    $routes->connect('AttributeClasses/AdminsingleEditClassData', ['controller' => 'AttributeClasses', 'action' => 'AdminsingleEditClassData']);
    $routes->connect('attribute-types/adminsingle-edit-type/*', ['controller' => 'AttributeTypes', 'action' => 'AdminsingleEditType']);
    $routes->connect('AttributeTypes/AdminsingleEditTypeData', ['controller' => 'AttributeTypes', 'action' => 'AdminsingleEditTypeData']);
    $routes->connect('product-categories/adminedit-product-categories', ['controller' => 'ProductCategories', 'action' => 'AdmineditProductCategories']);
    $routes->connect('product-categories/adminsingle-edit-category/*', ['controller' => 'ProductCategories', 'action' => 'AdminsingleEditCategory']);
    $routes->connect('ProductCategories/AdminsingleCategoryData', ['controller' => 'ProductCategories', 'action' => 'AdminsingleCategoryData']);
    $routes->connect('product-sub-categories/adminedit-product-sub-categories', ['controller' => 'ProductSubCategories', 'action' => 'AdmineditProductSubCategories']);
    $routes->connect('product-sub-categories/adminsingle-edit-sub-categories/*', ['controller' => 'ProductSubCategories', 'action' => 'AdminsingleEditSubCategories']);
    $routes->connect('ProductSubCategories/AdminsingleEditSubCategoriesData', ['controller' => 'ProductSubCategories', 'action' => 'AdminsingleEditSubCategoriesData']);
    $routes->connect('product-brands/edit-product-brand', ['controller' => 'ProductBrands', 'action' => 'AdmineditProductBrand']);
    $routes->connect('product-brands/single-edit-brand/*', ['controller' => 'ProductBrands', 'action' => 'AdminsingleEditBrand']);
    $routes->connect('ProductBrands/singleEditProductBrandData', ['controller' => 'ProductBrands', 'action' => 'AdminsingleEditProductBrandData']);
    $routes->connect('product-categories/adminadd-product', ['controller' => 'ProductCategories', 'action' => 'AdminaddProduct']);
    $routes->connect('AttributeClasses/Adminadd', ['controller' => 'AttributeClasses', 'action' => 'Adminadd']);
    $routes->connect('AttributeTypes/Adminadd', ['controller' => 'AttributeTypes', 'action' => 'Adminadd']);
    $routes->connect('AttributeValues/AdminfullAdd', ['controller' => 'AttributeValues', 'action' => 'AdminfullAdd']);
    $routes->connect('AttributeTypes/AdmingetTypeData', ['controller' => 'AttributeTypes', 'action' => 'AdmingetTypeData']);
    $routes->connect('AttributeValues/AdmingetValueData', ['controller' => 'AttributeValues', 'action' => 'AdmingetValueData']);
    $routes->connect('ProductCategories/CategoryCoverImage', ['controller' => 'ProductCategories', 'action' => 'CategoryCoverImage']);
    $routes->connect('ShopDiscounts/addShopDiscounts', ['controller' => 'ShopDiscounts', 'action' => 'addShopDiscounts']);
    $routes->connect('ShopDiscounts/addShopDiscountsData', ['controller' => 'ShopDiscounts', 'action' => 'addShopDiscountsData']);
    $routes->connect('ShopDiscounts/shopDiscountsListView', ['controller' => 'ShopDiscounts', 'action' => 'shopDiscountsListView']);
    $routes->connect('ShopDiscounts/singleEditShopDiscount/*', ['controller' => 'ShopDiscounts', 'action' => 'singleEditShopDiscount']);
    $routes->connect('ShopDiscounts/editShopDiscountData', ['controller' => 'ShopDiscounts', 'action' => 'editShopDiscountData']);
    $routes->connect('ShopDiscounts/discountsNotPublished/*', ['controller' => 'ShopDiscounts', 'action' => 'discountsNotPublished']);
    $routes->connect('ShopDiscounts/discountPublished/*', ['controller' => 'ShopDiscounts', 'action' => 'discountPublished']);
    $routes->connect('ProductMetas/AdminMultiImageUpld', ['controller' => 'ProductMetas', 'action' => 'AdminMultiImageUpld']);
    $routes->connect('ProductCategories/Adminadd', ['controller' => 'ProductCategories', 'action' => 'Adminadd']);
    $routes->connect('ProductSubCategories/Adminadd', ['controller' => 'ProductSubCategories', 'action' => 'Adminadd']);
    $routes->connect('ProductBrands/Adminadd', ['controller' => 'ProductBrands', 'action' => 'Adminadd']);
    $routes->connect('ProductMetas/AdminaddMetas', ['controller' => 'ProductMetas', 'action' => 'AdminaddMetas']);
    $routes->connect('ProductMetas/Adminadd', ['controller' => 'ProductMetas', 'action' => 'Adminadd']);
    $routes->connect('ProductSubCategories/AdmingetSubCategoriesData', ['controller' => 'ProductSubCategories', 'action' => 'AdmingetSubCategoriesData']);
    $routes->connect('ShopProducts/Adminadd', ['controller' => 'ShopProducts', 'action' => 'Adminadd']);
    $routes->connect('shop-products/adminview-product-list', ['controller' => 'ShopProducts', 'action' => 'AdminviewProductList']);
    $routes->connect('shop-products/adminview-product-search-list', ['controller' => 'ShopProducts', 'action' => 'AdminviewProductSearchList']);
    $routes->connect('shop-products/adminsingle-stock-product/*', ['controller' => 'ShopProducts', 'action' => 'AdminsingleStockProduct']);
    $routes->connect('shop-products/adminproduct-sale-status-not-publish/*', ['controller' => 'ShopProducts', 'action' => 'AdminproductSaleStatusNotPublish']);
    $routes->connect('shop-products/adminproduct-sale-status-publish/*', ['controller' => 'ShopProducts', 'action' => 'AdminproductSaleStatusPublish']);
    $routes->connect('ProductStocksDetails/Adminadd', ['controller' => 'ProductStocksDetails', 'action' => 'Adminadd']);
    $routes->connect('shop-products/adminsingle-view-product/*', ['controller' => 'ShopProducts', 'action' => 'AdminsingleViewProduct']);
    $routes->connect('shop-products/adminsingle-edit-product/*', ['controller' => 'ShopProducts', 'action' => 'AdminsingleEditProduct']);
    $routes->connect('shop-products/adminsingle-delete-product/*', ['controller' => 'ShopProducts', 'action' => 'AdminsingleDeleteProduct']);
    $routes->connect('ShopProducts/AdminUpdateShopProduct', ['controller' => 'ShopProducts', 'action' => 'AdminUpdateShopProduct']);
    $routes->connect('ProductMetas/AdminUpdateMultiImageUpld', ['controller' => 'ProductMetas', 'action' => 'AdminUpdateMultiImageUpld']);
    $routes->connect('ProductMetas/AdminupdateAddedImage', ['controller' => 'ProductMetas', 'action' => 'AdminupdateAddedImage']);
    $routes->connect('ShopProducts/AdmindeleteMainImage', ['controller' => 'ShopProducts', 'action' => 'AdmindeleteMainImage']);
    $routes->connect('ShopProducts/AdmindeleteRelatedImage', ['controller' => 'ShopProducts', 'action' => 'AdmindeleteRelatedImage']);
    $routes->connect('ProductMetas/AdmindeleteResizeImage', ['controller' => 'ProductMetas', 'action' => 'AdmindeleteResizeImage']);
    $routes->connect('ProductMetas/updateNewArivalFalse', ['controller' => 'ProductMetas', 'action' => 'updateNewArivalFalse']);
    $routes->connect('ProductMetas/updateNewArivalTrue', ['controller' => 'ProductMetas', 'action' => 'updateNewArivalTrue']);
    $routes->connect('order-details/adminsingle-view-product/*', ['controller' => 'OrderDetails', 'action' => 'AdminsingleViewProduct']);
    
    $routes->connect('orders/user-order-info/*', ['controller' => 'Orders', 'action' => 'userOrderInfo']);
    
    $routes->connect('Orders/AdminDeleteOrder/*', ['controller' => 'Orders', 'action' => 'AdminDeleteOrder']);
    $routes->connect('Orders/AdminviewOrderReport', ['controller' => 'Orders', 'action' => 'AdminviewOrderReport']);
    $routes->connect('Orders/getToken', ['controller' => 'Orders', 'action' => 'getaccessToken']);
    $routes->connect('Orders/testDelivery', ['controller' => 'Orders', 'action' => 'testDelivery']);
    $routes->connect('orders/order-status-pending', ['controller' => 'Orders', 'action' => 'orderStatusPending']);
    $routes->connect('admininsta-download', ['controller' => 'Community', 'action' => 'addCommunity']);

    $routes->connect('ProductMetas/editSliderTitleColor', ['controller' => 'ProductMetas', 'action' => 'editSliderTitleColor']);

//////////////////////////// Under Construction  ///////////////////////


    $routes->connect('community/addCommunityInfo/*', ['controller' => 'Community', 'action' => 'addCommunityInfo']);
    $routes->connect('Community/singleEditCommunityInfo', ['controller' => 'Community', 'action' => 'singleEditCommunityInfo']);
    $routes->connect('viewCommunity', ['controller' => 'Community', 'action' => 'viewCommunity']);
    $routes->connect('community', ['controller' => 'Community', 'action' => 'index']);
    $routes->connect('community/single-edit-community/*', ['controller' => 'Community', 'action' => 'singleEditCommunity']);


//////////////////////////// Under Construction  ///////////////////////


    $routes->connect('product-sub-categories/add-baner-image-view', ['controller' => 'ProductSubCategories', 'action' => 'addBanerImageView']);
    $routes->connect('ProductMetas/addSliderImage', ['controller' => 'ProductMetas', 'action' => 'addSliderImage']);
    $routes->connect('ProductMetas/editSliderTitle', ['controller' => 'ProductMetas', 'action' => 'editSliderTitle']);
    $routes->connect('ProductMetas/getSliderTitle', ['controller' => 'ProductMetas', 'action' => 'getSliderTitle']);
    $routes->connect('ProductMetas/deleteSlider/*', ['controller' => 'ProductMetas', 'action' => 'deleteSlider']);
    $routes->connect('ProductMetas/coverimagelistview', ['controller' => 'ProductMetas', 'action' => 'coverimagelistview']);
    $routes->connect('/attributeSettings', ['controller' => 'AttributeClasses', 'action' => 'attributeSettings']);
    $routes->connect('/addProduct', ['controller' => 'ProductCategories', 'action' => 'addProduct']);
    $routes->connect('/RestApi/getProductDataApi', ['controller' => 'RestApi', 'action' => 'getProductDataApi', 'allowWithoutToken' => false]);
    $routes->connect('/RestApi/getToken', ['controller' => 'RestApi', 'action' => 'getToken', 'allowWithoutToken' => true]); 
    $routes->connect('/RestApi/deliverStatusApi', ['controller' => 'RestApi', 'action' => 'deliverStatusApi', 'allowWithoutToken' => false]);


//    Admin  end



    

// $routes->setExtensions(['json']);

// $routes->fallbacks(DashedRoute::class);











    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);

    $routes->connect('/404', ['controller' => 'Home', 'action' => 'error']);

    $routes->connect('/ajax-instagram', ['controller' => 'Home', 'action' => 'ajaxInstagram']);

    

    $routes->connect('/find-store', ['controller' => 'Home', 'action' => 'map']);

    $routes->connect('/checkout', ['controller' => 'Home', 'action' => 'checkout']);

    $routes->connect('/cart', ['controller' => 'Home', 'action' => 'cart']);

    $routes->connect('/privacy-policy', ['controller' => 'Home', 'action' => 'privacyPolicy']);

    $routes->connect('/cookie-policy', ['controller' => 'Home', 'action' => 'cookiePolicy']);

    $routes->connect('/terms-of-use', ['controller' => 'Home', 'action' => 'termsOfUse']);

    $routes->connect('/size-guide', ['controller' => 'Home', 'action' => 'sizeGuide']);

    $routes->connect('/delivery', ['controller' => 'Home', 'action' => 'delivery']);

    $routes->connect('/payment-methods', ['controller' => 'Home', 'action' => 'paymentMethods']);

    $routes->connect('/customer-care', ['controller' => 'Home', 'action' => 'customerCare']);

    $routes->connect('/about', ['controller' => 'Home', 'action' => 'about']);

    $routes->connect('/contact', ['controller' => 'Home', 'action' => 'contact']);

    $routes->connect('/contact-send-mail', ['controller' => 'Home', 'action' => 'contactMail']);

    $routes->connect('/faq', ['controller' => 'Home', 'action' => 'faq']);

    $routes->connect('/returns-exchanges', ['controller' => 'Home', 'action' => 'returnsExchanges']);

    $routes->connect('/wishlist', ['controller' => 'Home', 'action' => 'wishlist']);

    

    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);

    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

    $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);

    $routes->connect('/users/add/:remember_token', ['controller' => 'Users', 'action' => 'activate'])->setPass(['remember_token']);

    $routes->connect('/my-account', ['controller' => 'Users', 'action' => 'myAccount']);

    $routes->connect('/change-info', ['controller' => 'Users', 'action' => 'changeInfo']);

    $routes->connect('/ajax-order-details', ['controller' => 'OrderDetails', 'action' => 'ajaxOrderDetails']);

    $routes->connect('/change-password', ['controller' => 'Users', 'action' => 'changePassword']);

    $routes->connect('/reference', ['controller' => 'Users', 'action' => 'reference']);

    $routes->connect('/subscribe', ['controller' => 'Users', 'action' => 'subscribe']);



    $routes->connect('/order/cash-on-delivery', ['controller' => 'Orders', 'action' => 'cashOnDelivery']);

    $routes->connect('/order/testSsl', ['controller' => 'Orders', 'action' => 'testSslTransaction']);

    $routes->connect('/order/success', ['controller' => 'Orders', 'action' => 'success']);

    $routes->connect('/order/fail', ['controller' => 'Orders', 'action' => 'fail']);

    $routes->connect('/order/cancel', ['controller' => 'Orders', 'action' => 'cancel']);

    $routes->connect('/order/get-token', ['controller' => 'Orders', 'action' => 'getaccessToken']);

    

    $routes->connect('/ajax-sorting', ['controller' => 'ShopProducts', 'action' => 'ajaxSorting']);

    $routes->connect('/check-stock/:id', ['controller' => 'ProductStocksDetails', 'action' => 'checkStock'])->setPass(['id']);

    $routes->connect('/check-stock/:size/:color', ['controller' => 'ProductStocksDetails', 'action' => 'checkStock2'])->setPass(['size','color']);



    $routes->connect('/add-to-cart', ['controller' => 'Carts', 'action' => 'addToCart']);

    $routes->connect('/add-to-wishlist', ['controller' => 'Carts', 'action' => 'addToWishlist']);

    $routes->connect('/remove-from-cart/:id', ['controller' => 'Carts', 'action' => 'removeFromCart'])->setPass(['id']);

    $routes->connect('/remove-from-wishlist/:id', ['controller' => 'Carts', 'action' => 'removeFromWishlist'])->setPass(['id']);

    $routes->connect('/update-cart-quantity/:id', ['controller' => 'Carts', 'action' => 'edit'])->setPass(['id']);



    $routes->connect('/search', ['controller' => 'Home', 'action' => 'search']);



    $routes->connect('/:slug', ['controller' => 'ProductCategories', 'action' => 'index'])->setPass(['slug']);

    $routes->connect('/:category/:slug', ['controller' => 'ProductSubCategories', 'action' => 'index'])->setPass(['category', 'slug']);

    $routes->connect('/:category/:subcategory/:slug', ['controller' => 'ShopProducts', 'action' => 'index'])->setPass(['subcategory','slug']);



    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);



    $routes->fallbacks(DashedRoute::class);

});



Plugin::routes();

