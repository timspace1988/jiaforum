<?php

return array(

    /*
     * Package URI
     *
     * @type string
     */
    'uri' => 'admin',

    /*
     *  Domain for routing.(If you have the dedicated domain for administration page)
     *
     *  @type string
     */
    'domain' => '',

    /*
     * Page title display on top left orner
     *
     * @type string
     */
    'title' => env('APP_NAME', 'JiaForum'),

    /*
     * The path to your model config directory
     *
     * @type string
     */
    'model_config_path' => config_path('administrator'),//the folder is config/administrator/

    /*
     * The path to your settings config directory
     *
     * @type string
     */
    'settings_config_path' => config_path('administrator/settings'),

    /*
     * The menu structure of the site. For models, you should either supply the name of a model config file or an array of names of model config
     * files. The same applies to settings config files, except you must prepend 'settings.' to the settings config file name. You can also add
     * custom pages by prepending a view path with 'page.'. By providing an array of names, you can group certain models or settings pages
     * together. Each name needs to either have a config file in your model config path, settings config path with the same name, or a path to a
     * fully-qualified Laravel view. So 'users' would require a 'users.php' file in your model config path, 'settings.site' would require a
     * 'site.php' file in your settings config path, and 'page.foo.test' would require a 'test.php' or 'test.blade.php' file in a 'foo' directory
     * inside your view directory.
     *
     * @type array
     *
     * 	array(
     *		'E-Commerce' => array('collections', 'products', 'product_images', 'orders'),
     *		'homepage_sliders',
     *		'users',
     *		'roles',
     *		'colors',
     *		'Settings' => array('settings.site', 'settings.ecommerce', 'settings.social'),
     * 		'Analytics' => array('E-Commerce' => 'page.ecommerce.analytics'),
     *	)
     */

    /*
     * 后台菜单数组，多维数组渲染结果为多级嵌套菜单。
     *
     * 数组里的值有三种类型：
     * 1. 字符串 —— 子菜单的入口，不可访问；
     * 2. 模型配置文件 —— 访问 `model_config_path` 目录下的模型文件，如 `users` 访问的是 `users.php` 模型配置文件；
     * 3. 配置信息 —— 必须使用前缀 `settings.`，对应 `settings_config_path` 目录下的文件，如：默认设置下，
     *              `settings.site` 访问的是 `administrator/settings/site.php` 文件
     * 4. 页面文件 —— 必须使用前缀 `page.`，如：`page.pages.analytics` 对应 `administrator/pages/analytics.php`
     *               或者是 `administrator/pages/analytics.blade.php` ，两种后缀名皆可
     *
     * 示例：
     *  [
     *      'users',
     *      'E-Commerce' => ['collections', 'products', 'product_images', 'orders'],
     *      'Settings'  => ['settings.site', 'settings.ecommerce', 'settings.social'],
     *      'Analytics' => ['E-Commerce' => 'page.pages.analytics'],
     *  ]
     */
    'menu' => [
        'Users & Permissions' => [
            'users',
            'roles',
            'permissions',
        ],
    ],

    /*
     * The permission option is the highest-level authentication check that lets you define a closure that should return true if the current user
     * is allowed to view the admin section. Any "falsey" response will send the user back to the 'login_path' defined below.
     *
     * @type closure
     */
    // 'permission' => function () {
    //     //Only administrators can access the admin page (This project: Founder and Maintainer)
    //     return Auth::check() && Auth::user()->can('manage_contents');
    // },

    /**
     * In order to boost out application's speed, we need to cache all configuration for our frame work
       You can simply use 'php artisan config:cache' in git bash.
       However, if we have closure function in any config files, after we cache it, the application will
       pop errors.
       The soulution to this is to write your closure function in helpers.php file, and set the function name here, So we change above 'permission' => function() to:
     */
    'permission' => 'manageContents', //will call manageContents() in /app/helpers.php file

    /*
     * This determines if you will have a dashboard (whose view you provide in the dashboard_view option) or a non-dashboard home
     * page (whose menu item you provide in the home_page option)
     *
     * @type bool
     */
    'use_dashboard' => false,

    /*
     * If you want to create a dashboard view, provide the view string here.
     *
     * @type string
     */
    'dashboard_view' => '',

    /*
     * The menu item that should be used as the default landing page of the administrative section
     *
     * @type string
     */
    //Set the menu items to be displayed on non-dashboard home page.
    //Menu items are those you wirte in menu =>[]
    'home_page' => 'users',

    /*
     * The route to which the user will be taken when they click the "back to site" button
     * The button is displayed on top right corner
     *
     * @type string
     */
    'back_to_site_path' => '/',

    /*
     * The login path is the path where Administrator(admin page) will redirect the user if they fail a permission (to access admin page) check
     *
     * @type string
     */
    'login_path' => 'login',

    /*
     * The logout path is the path where Administrator will send the user when they click the logout link
     *
     * @type string
     */
    'logout_path' => false,

    /*
     * This is the key of the return path that is sent with the redirection to your login_action. Session::get('redirect') will hold the return URL.
      允许在登录成功后使用 Session::get('redirect') 将用户重定向到原本想要访问的后台页面
     *
     * @type string
     */
    'login_redirect_key' => 'redirect',

    /*
     * Global default rows per page
     *
     * @type int
     */
    'global_rows_per_page' => 20,

    /*
     * An array of available locale strings. This determines which locales are available in the languages menu at the top right of the Administrator
     * interface.
     *
     * @type array
     */
    'locales' => [],

    'custom_routes_file' => app_path('Http/routes/administrator.php'),
);
