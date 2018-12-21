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
    //网站根路由
    Route ::get ('/', 'Home\IndexController@index'
    );
    //后台需要验证的路由
    Route ::group ([ 'middleware' => 'login.auth', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.' ], function () {
        //后台首页
        Route ::get ('/', 'Indexcontroller@index') -> name ('index');
        //退出
        Route ::get ('login/logout', 'LoginController@logout') -> name ('login.logout');
        //管理商品分类
        Route ::resource ('product', 'ProductController');
        //管理商品
        Route ::resource ('good', 'GoodController');
        //配置项
        Route ::get ('config/edit', 'ConfigController@edit') -> name ('config.edit');
        Route ::post ('config/update', 'ConfigController@update') -> name ('config.update');

    });
    //后台不需要验证的路由
    Route ::group ([ 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.' ], function () {
        //后台登录
        Route ::get ('login/index', 'LoginController@index') -> name ('login.index');
        //登录提交
        Route ::post ('login/login_store', 'LoginController@loginStore') -> name ('login.login_store');
    });
    //工具类
    Route ::group ([ 'prefix' => 'util', 'namespace' => 'Util', 'as' => 'util.' ], function () {
        Route ::any ('upload', 'UploadController@upload') -> name ('upload');
        Route ::post ('code', 'CodeController@send') -> name ('code.send');
    });
    //微信支付
    Route ::any ('pay/pay_wechat', 'Home\PayController@payWechat') -> name ('pay.pay_wechat');
    Route::any ('pay/notify','Home\PayController@notify')->name ('pay.notify');
    Route::post ('pay/check_order_status','Home\PayController@checkOrderStatus')->name ('pay.check_order_status');
    //前台主页
    Route ::group ([ 'prefix' => 'home', 'namespace' => 'Home', 'as' => 'home.' ], function () {
        //首页
        Route ::get ('/', 'IndexController@index') -> name ('index');
        //商品页
        Route ::get ('goods', 'GoodsController@index') -> name ('goods.index');
        //商品详情
        Route ::get ('goods/show', 'GoodsController@show') -> name ('goods.show');
        //用户注册
        Route ::get ('user/register', 'UserController@register') -> name ('user.register');
        //提交注册
        Route ::post ('user/register_store', 'UserController@registerStore') -> name ('user.register_store');
        //用户登录
        Route ::get ('user/login', 'UserController@login') -> name ('user.login');
        //提交登录
        Route ::post ('user/login_store', 'UserController@loginStore') -> name ('user.login_store');
        //退出
        Route ::get ('user/logout', 'UserController@logout') -> name ('user.logout');
        //修改密码
        Route ::get ('user/reset_password', 'UserController@resetPassword') -> name ('user.reset_password');
        Route ::post ('user/reset_password_store', 'UserController@resetPasswordStore') -> name ('user.reset_password_store');
        //获取规格
        Route ::post ('goods/find_spec', 'GoodsController@findSpec') -> name ('goods.find_spec');
        //购物车
        Route ::resource ('cart', 'CartController');
        //购物车改变数值

    });
    //登录验证
    Route ::group ([ 'middleware' => 'auth', 'prefix' => 'home', 'namespace' => 'Home', 'as' => 'home.' ], function () {
        //个人中心
        Route ::get ('user/user_info/{user}', 'UserController@userInfo') -> name ('user.user_info');
        //用户地址管理
        Route ::resource ('address', 'AddressController');
        //选择默认地址
        Route ::post ('address/select_adr', 'AddressController@select_adr') -> name ('address.select_adr');
        //立即购买
        Route::post ('order/buy_store','OrderController@buyStore')->name ('order.buy_store');
        //我的订单
        Route::get ('order/my_order','OrderController@myOrder')->name ('order.my_order');
       //订单资源路由
        Route ::resource ('order', 'OrderController');
        //支付
        Route ::get ('pay/index', 'PayController@index') -> name ('pay.index');



    });
