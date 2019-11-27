<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require 'install.php';



Route::middleware(['IsInstalled','visitor'])->group(function(){

    Auth::routes(['verify' => true]);
    
    Route::get('/','HomeController@index'); 
    Route::get('schedule/run','HomeController@scheduleRun'); 
    Route::get('gallery','HomeController@showGalary');
    Route::get('contact-us','HomeController@showContactPage');
    Route::post('contact-us','HomeController@sendContactMessage')->name('contact_message_send');
    Route::get('our-clients/','HomeController@showClientPage');
    Route::get('about-us/','HomeController@showAboutUSPage');
    Route::get('certificate/','HomeController@showCertificatePage');
    Route::get('voyager-apparels/','HomeController@ShowVoyagerApparels');
    Route::get('farseeing-knit-composite/','HomeController@showFarseeing');
    
    
    /*--------------------------------------------------------------------------
     * Show All Product From Category 
     * And sub-subcategory and 
     * View Product Details
     *-------------------------------------------------------------------------*/
    Route::get('view/product/{id}/{pnm}','FrontEnd\ProductController@viewProductDetails');
    Route::get('view-category/{cnm}','FrontEnd\ProductController@showAllProducts');
    Route::get('view-category/{cnm}/{scnm}','FrontEnd\ProductController@showAllProducts');
    //Route::get('product/get-quantity','FrontEnd\ProductController@getQuantity')->name('product_qty_check');
    // Route::get('search','FrontEnd\ProductController@searchProduct');
    
    /*--------------------------------------------------------------------------
     *  Cart Page || 
     *  Show Cart | Update, Modify & Checkout 
     *-------------------------------------------------------------------------*/
    // Route::post('cart/add-cart','FrontEnd\CartController@addCart')->name('add_cart');
    // Route::get('cart/view','FrontEnd\CartController@index');
    // Route::post('cart/view','FrontEnd\CartController@updateCart');
    // Route::get('cart/remove/{id}','FrontEnd\CartController@removeItem');
    // Route::get('cart/store','FrontEnd\CartController@storeInDB');

    /*--------------------------------------------------------------------------
     *  Account Create 
     *  Account Info Update 
     *--------------------------------------------------------------------------*/
    // Route::get('customer/open-account','FrontEnd\CustomerController@createAccount');
    // Route::post('customer/open-account','FrontEnd\CustomerController@store');

    /*---------------------------------------------------------------------------
    |   Others Page
    |   Footer Menu Pages
    *---------------------------------------------------------------------------*/
    Route::get('open-footer/{id}/{name}','FrontEnd\OtherController@showfooterPage');
    Route::post('subscribe/','FrontEnd\SubscribeController@store');
    // Route::post('get/discount','FrontEnd\SubscribeController@getDiscount');
 
});

Route::middleware(['IsInstalled','customer','verified'])->group(function(){

    /*--------------------------------------------------------------------------
     * Account Section
     * Update Info
     *-------------------------------------------------------------------------*/
    // Route::get('my-account','FrontEnd\CustomerController@customerAccount');
    // Route::get('account/profile','FrontEnd\CustomerController@userProfile')->name('user-profile');
    // Route::post('my-account/update','FrontEnd\CustomerController@updateProfile');
    // Route::post('my-account/update-password','FrontEnd\CustomerController@updatePassword');
    // Route::get('wishlist/','FrontEnd\WishlistController@index');
    // Route::get('wishlist/remove/{id}','FrontEnd\WishlistController@remove');
    // Route::get('wishlist/add/{id}','FrontEnd\WishlistController@store');

    /*--------------------------------------------------------------------------
     * Order Confirmation
     * Order Details | Checkout Page
     *-------------------------------------------------------------------------*/
    // Route::get('checkout','FrontEnd\CartController@checkout');
    // Route::post('coupon/apply','FrontEnd\OrderController@checkCoupon');
    // Route::post('order/place','FrontEnd\OrderController@placeOrder');
    // Route::get('order/{id}/confirm','FrontEnd\OrderController@confirmOrder');
    // Route::get('user-order','FrontEnd\OrderController@userOrderList')->name('user-order');
    // Route::get('order/{id}/details','FrontEnd\OrderController@orderDetails');
    // Route::get('order/{id}/delete','FrontEnd\OrderController@orderDelete');
    // Route::post('review/add','FrontEnd\ProductController@addReview');
    // Route::get('order/{id}/order-confirmation','FrontEnd\OrderController@orderConfirmation');
    
    /*----------------------------------------------------------------------------
    |   Paypal Payments
    |----------------------------------------------------------------------------*/
    // Route::get('payment/{order_id}/paypal','PaypalPaymentController@payWithPaypal');
    // Route::get('payment/paypal/status','PaypalPaymentController@getPaymentStatus');

    /*-----------------------------------------------------------------------------
    |   Logout
    |-----------------------------------------------------------------------------*/
    // Route::get('/logout-user','Auth\LoginController@logout');

});


Route::middleware(['IsInstalled','IsAdmin'])->group( function(){

	    Route::get('/home', 'HomeController@backEndIndex')->name('home');
        Route::get('/logout', 'Auth\LoginController@logout');
        
        /*
         * Admin Controller and Admin Profile
         */
        Route::get('website/setting','BackEnd\AdminController@ShowSettings');
        Route::post('website/setting','BackEnd\AdminController@UpdateSettings');
        Route::get('user/profile/{id?}','BackEnd\AdminController@getProfile');
        Route::post('profile/update','BackEnd\AdminController@updateProfile');
        Route::post('profile/update-password','BackEnd\AdminController@updatePassword');
        Route::get('user/manage','BackEnd\AdminController@manageUser');
        Route::get('user/create','BackEnd\AdminController@createUser');
        Route::post('user/create','BackEnd\AdminController@storeUser');
        
        /*User Login Logout History */
        Route::get('user/history','BackEnd\UserController@showLoginDetails')->name('user.history');
        
        // Seo Part
        Route::get('manage/seo','BackEnd\SeoController@show');
        Route::post('manage/seo','BackEnd\SeoController@store');
        
        //Category Section
        Route::get('category/show','BackEnd\CategoryController@showCategory');
        Route::get('category/create','BackEnd\CategoryController@createCategory');
        Route::post('category/create','BackEnd\CategoryController@storeCategory');
        Route::get('category/edit/{id}','BackEnd\CategoryController@editCategory');
	    Route::get('category/{id}/delete','BackEnd\CategoryController@deleteCategory');
        
        //subCategory
        Route::get('sub-category/show','BackEnd\CategoryController@showSubCategory');
        Route::get('sub-category/create','BackEnd\CategoryController@createSubCategory');
        Route::post('sub-category/create','BackEnd\CategoryController@storeSubCategory');
        Route::get('sub-category/edit/{id}','BackEnd\CategoryController@EditSubCategory');
        Route::get('sub-category/{id}/delete','BackEnd\CategoryController@DeleteSubCategory');
        Route::get('get/sub-category/{id}','BackEnd\CategoryController@getSubCategory');
        
        //Slider Section
        Route::get('slider/','BackEnd\SliderController@show');
        Route::post('slider','BackEnd\SliderController@store');
        Route::post('slider/video','BackEnd\SliderController@addVideo');
        Route::get('slider/{id}/edit','BackEnd\SliderController@edit');
        Route::get('slider/{id}/delete','BackEnd\SliderController@delete');

        //Branding Image
        Route::get('branding/','BackEnd\BrandController@index');
        Route::get('branding/create','BackEnd\BrandController@create');
        Route::post('branding/create','BackEnd\BrandController@store');
        Route::get('branding/edit/{id}','BackEnd\BrandController@edit');
        
        //Product Section
        Route::get('product','BackEnd\ProductController@index');
        Route::get('product/create','BackEnd\ProductController@create');
        Route::post('product/create','BackEnd\ProductController@store');
        Route::put('product/create','BackEnd\ProductController@updateProduct');
        Route::get('product/{id}/edit','BackEnd\ProductController@editProduct');
        Route::get('product/{id}/delete','BackEnd\ProductController@deleteProduct');
        Route::get('product/delete','BackEnd\ProductController@showDeleteProduct');
        Route::get('product/{id}/restore','BackEnd\ProductController@restoreProduct');
        Route::get('product/{id}/view-details','BackEnd\ProductController@viewProductDetails');

        //Product Review
        Route::get('product/review','BackEnd\ProductController@productReview');
        Route::get('product/review/{id}/edit','BackEnd\ProductController@editReview');
        Route::post('product/review/update','BackEnd\ProductController@updateReview');
        Route::get('product/review/{id}/delete','BackEnd\ProductController@deleteReview');

        //Product Stock 
        Route::get('product/product-stock','BackEnd\ProductController@stockIndex');
        Route::post('product/product-stock/create','BackEnd\ProductController@addStock');
        Route::get('product-stock/delete/{id}','BackEnd\ProductController@deleteStock');
        Route::get('product-stock/edit/{id}','BackEnd\ProductController@editStock');
        Route::post('product/product-stock/update','BackEnd\ProductController@addStock');
        
        //Feature Product 
        Route::get('feature-products','BackEnd\FeatureProductController@index');
        Route::post('feature-products','BackEnd\FeatureProductController@store');
        Route::get('feature-products/{id}/edit','BackEnd\FeatureProductController@edit');
        Route::get('feature-products/{id}/delete','BackEnd\FeatureProductController@delete');

        // Galary
        Route::get('galary/menu','BackEnd\GalaryController@galaryMenuIndex');
        Route::get('galary/menu/create','BackEnd\GalaryController@createMenu');
        Route::post('galary/menu/create','BackEnd\GalaryController@storeMenu');
        Route::get('galary/menu/edit/{id}','BackEnd\GalaryController@editMenu');
        Route::get('galary/menu/delete/{id}','BackEnd\GalaryController@deleteMenu');
        
        Route::get('get/galary-menu','BackEnd\GalaryController@getMenuList');
        Route::get('galary/sub-menu','BackEnd\GalaryController@galarySubMenuIndex');
        Route::get('galary/sub-menu/create','BackEnd\GalaryController@createSubMenu');
        Route::post('galary/sub-menu/create','BackEnd\GalaryController@storeSubMenu');
        Route::get('galary/sub-menu/edit/{id}','BackEnd\GalaryController@editSubMenu');
        Route::get('galary/sub-menu/delete/{id}','BackEnd\GalaryController@deleteSubMenu');

        Route::get('galary/content','BackEnd\GalaryController@galaryContentIndex');
        Route::get('galary/content/create','BackEnd\GalaryController@galaryContentCreate');
        Route::post('galary/content/create','BackEnd\GalaryController@storeContentCreate');
        Route::get('galary/content/edit/{id}','BackEnd\GalaryController@editContent');
        Route::get('galary/content/delete/{id}','BackEnd\GalaryController@deleteContent');

        //Goals
        Route::get('goals','BackEnd\GoalsController@index');
        Route::post('goals','BackEnd\GoalsController@store');
        Route::get('goals/content','BackEnd\GoalsController@goalContent');
        Route::get('goals/content/create','BackEnd\GoalsController@createContent');
        Route::post('goals/content/create','BackEnd\GoalsController@storeContent');
        Route::get('goals/content/edit/{id}','BackEnd\GoalsController@editContent');
        Route::get('goals/content/delete/{id}','BackEnd\GoalsController@deleteContent');

        // Client List
        Route::get('client/','BackEnd\ClientController@index');
        Route::post('client/','BackEnd\ClientController@store');
        Route::get('client/list','BackEnd\ClientController@clientList');
        Route::get('client/list/create','BackEnd\ClientController@createContent');
        Route::post('client/list/create','BackEnd\ClientController@storeClientList');
        Route::get('client/list/edit/{id}','BackEnd\ClientController@editClientList');
        Route::get('client/list/delete/{id}','BackEnd\ClientController@deleteClientList');

        // About US
        Route::get('about/','BackEnd\AboutUsController@index');
        Route::post('about/','BackEnd\AboutUsController@store');

        Route::get('about/service/create','BackEnd\AboutUsController@createService');
        Route::get('about/service/list','BackEnd\AboutUsController@serviceList');
        Route::post('about/service/create','BackEnd\AboutUsController@serviceStore');
        Route::get('about/service/edit/{id}','BackEnd\AboutUsController@editServiceList');
        Route::get('about/service/delete/{id}','BackEnd\AboutUsController@deleteServiceList');

        Route::get('about/management','BackEnd\AboutUsController@management');
        Route::get('about/management/create','BackEnd\AboutUsController@createManagement');
        Route::post('about/management/create','BackEnd\AboutUsController@storeManagement');
        Route::get('about/management/edit/{id}','BackEnd\AboutUsController@editManagement');
        Route::get('about/management/delete/{id}','BackEnd\AboutUsController@deleteManagement');

        //coupon Code
        Route::get('coupon','BackEnd\CouponController@index');
        Route::get('coupon/create','BackEnd\CouponController@create');
        Route::post('coupon/create','BackEnd\CouponController@store');
        Route::get('coupon/edit/{id}','BackEnd\CouponController@edit');
        Route::get('coupon/delete/{id}','BackEnd\CouponController@delete');
        Route::get('coupon/show/delete-coupon/','BackEnd\CouponController@showDeleteCoupon');
        Route::get('coupon/restore/{id}','BackEnd\CouponController@restoreCoupon');
        Route::get('coupon/used','BackEnd\CouponController@showUsedCoupon');

        // Discount Wheel
        Route::get('wheel','BackEnd\WheelController@index');
        Route::post('wheel','BackEnd\WheelController@storeConfiguration');
        Route::get('wheel-component/create','BackEnd\WheelController@componentCreate');
        Route::post('wheel-component/create','BackEnd\WheelController@componentStore');  
        Route::get('wheel/edit/{id}','BackEnd\WheelController@editComponent');      
        
        //Newslatter part
        Route::get('newslatter/subscribe','BackEnd\NewslatterController@index');
        Route::get('newslatter/subscribe/send-message/{id}','BackEnd\NewslatterController@sendSingleMessage');
        Route::get('newslatter/subscribe/send-message','BackEnd\NewslatterController@sendGroupMessage');
        Route::post('subscribe/send-email','BackEnd\NewslatterController@sendMail');
        
        //Social Media
        Route::get('social-media','BackEnd\SocialMediaController@index');
        Route::post('social-media','BackEnd\SocialMediaController@store');
        Route::get('social-media/{id}/edit','BackEnd\SocialMediaController@edit');
        Route::get('social-media/{id}/delete','BackEnd\SocialMediaController@delete');

        // Footer Menu
        Route::get('footer-menu','BackEnd\FooterMenuController@index');
        Route::get('footer-menu/create','BackEnd\FooterMenuController@create');
        Route::post('footer-menu/create','BackEnd\FooterMenuController@store');
        Route::get('footer-menu/edit/{id}','BackEnd\FooterMenuController@edit');

        //Order
        Route::get('order/new','BackEnd\OrderController@newOrder');
        Route::get('order/shipping','BackEnd\OrderController@onShipping');
        Route::get('order/delivered','BackEnd\OrderController@deliverdOrders');
        Route::get('order/{id}/view-details','BackEnd\OrderController@orderDetails');
        Route::get('order/{id}/edit-status','BackEnd\OrderController@editStatus');
        Route::post('order/status-update','BackEnd\OrderController@updateStatus');
        Route::get('order/{id}/view-invoice','BackEnd\OrderController@viewInvoice');

        //Make Pdf
        Route::get('make-pdf/{id}','BackEnd\OrderController@makePDf');
        
        //Repost
        Route::get('report/stock','BackEnd\ReportController@stockReport');
        Route::get('report/sale','BackEnd\ReportController@saleReport');
        

});


