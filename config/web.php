<?php

$params = require(__DIR__ . '/params.php');
//$config中的配置，都可以通过 Yii::$app->属性名 来访问和重新设置
//在初始化的时候都把这些属性设置为Yii::$app对象(yii\web\application类的对象)的属性
$config = [
    /*************Required Properties 必要属性****************/
    //http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#required-properties

    'id' => 'basic',//这个应用的id(必要)
    'basePath' => dirname(__DIR__),//（必要）@app的值 指定应用的跟目录  (e.g. @app/runtime to refer to the runtime directory).
    /*************Required Properties 必要属性结束*************/


    /*************Important Properties 重要属性****************/
    //http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#important-properties

    'defaultRoute'=>'country/index',//设置默认的controller和action，（这个不属于重要，但是我认为重要）
    //指定随应用初始化的组件（components），直接生成实例的componetID 也就是'components'属性中的组件
    // 不可设置太多，会影响效率 gii和debug通过这个引入 bootstrap @http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#bootstrap
    'bootstrap' => ['log'],
    //注册要用的组件,这些部件是没有生成实例的，而是要通过Yii::$app->componentID 获取，通过魔术方法生成对应的实例
    //不要在这里注册太多，不利于维护和测试，在可以动态的添加，再要用的时候添加，详见http://www.yiiframework.com/doc-2.0/guide-concept-service-locator.html
    //应用会初始化一些核心的component应对基本的请求处理 详见 http://www.yiiframework.com/doc-2.0/guide-structure-application-components.html#core-application-components
    //http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#components
    //http://www.yiiframework.com/doc-2.0/guide-concept-service-locator.html
    //http://www.yiiframework.com/doc-2.0/guide-structure-application-components.html
    'components' => [
        //格式 'componentID'=>'className|array(some config)'
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123456',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\common\User',
            'enableAutoLogin' => true,
			'loginUrl'=>['news/user/login'],//定义后台默认登录界面[权限不足跳到该页]
		],
        'errorHandler' => [
            'errorAction' => 'zxz/error',//定义用来处理错误的控制器和方法
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','profile'],
					'logVars' => [],
					'categories' => [
						'yii\db\*',
						'yii\web\HttpException:*',
					],
					'except' => [
//						'yii\web\HttpException:404',
					],
					'prefix' => function ($message) {
						$user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
						$userID = $user ? $user->getId(false) : '-';
						return "[$userID][zxz][{$_SERVER['REMOTE_ADDR']}]";
					},
					'logFile' => '@app/runtime/logs/weblogs/' . date('Y').'/' . date('m').'/' . date('d').'/'.date('Y-m-d').'.log',
//					'maxFileSize'=>2,//单位 kb 默认10M
					'maxLogFiles' => 3,
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'suffix' => ".html",
            'rules' => [
            	''=>'news/user/index',
                '<controller:(\w+)>/<id:\d+>/<action:(\w+)>' => '<controller>/<action>',
                '<controller:(\w+)>/<id:\d+>' => '<controller>/index',
                '<controller:(\w+)>/<action:(.*)>' => '<controller>/<action>',
            ],
        ],
		
		//设置资源类的加载
        'assetManager' => [
//            'bundles' => false
        ],
    ],

	//自定义的模块添加 yii和debug模块就是靠这个属性来加载的，这里
	'modules' => [
		'forum' => [
			'class' => 'app\modules\forum\Module',
			// ... other configurations for the module ...
		],
	],

    //params设置一些常用的参数信息，以便在引用中多次用到的时候在这里同一修改就可以了，
    //可以它同一配置在一个文件中，然后在那个文件中以数组返回给params,比如头像大小设置，
    //在具体应用中通过 如：$size = \Yii::$app->params['thumbnail.size']; $width = \Yii::$app->params['thumbnail.size'][0];
    //    'params' => [
    //        'thumbnail.size' => [128, 128],
    //    ],
    'params' => $params,

    //catchAll 设置每次求情都执行的controller和action (在开发环境中不可用) @http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#catchAll
    /*
    'catchAll' => [
        'offline/notice',//每次请求都执行的控制器和方法
        'param1' => 'value1',//绑定传递给改控制器方法的参数
        'param2' => 'value2',
    ],
    */

    //controllerMap 将指定的控制器指定给其他控制器处理 @http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#controllerMap
    /*
    'controllerMap' => [
        'account' => 'app\controllers\UserController',//将AccountController控制器的访问指定给UserController
        'article' => [
            'class' => 'app\controllers\PostController',
            'enableCsrfValidation' => false,
        ],
    ],
    */

    //controllerNamespace 指定控制器的目录 默认为'controllerNamespace'=>'app\controllers'
    //指定后记得其下控制器的命名空间也命名为对应目录，如'controllerNamespace'=>'app\controllers\admin'，对应目录下控制器中namespace app\controllers\admin;
    /*
    'controllerNamespace'=>'app\controllers\admin',//指定默认控制器所在位置app\controllers\admin\
    */

    //指定应用所使用的语言，只要设置这个yii会自动转换语言，主要是一些提示语
    //http://www.yiiframework.com/doc-2.0/guide-tutorial-i18n.html
    'language'=>'zh-CN',

    //sourceLanguage 指定应用是用什么语言来写的（这个有点懵）
    'sourceLanguage' => 'en-US',

    //modules 指定应用包含的某块
    //http://www.yiiframework.com/doc-2.0/guide-structure-modules.html
    /*
    'modules' => [
        // a "booking" module specified with the module class
        'booking' => 'app\modules\booking\BookingModule',

        // a "comment" module specified with a configuration array
        'comment' => [
            'class' => 'app\modules\comment\CommentModule',
            'db' => 'db',
        ],
    ],
    */

    //name 给此应用的名字，如果在写代码中有用到就设置，没有用到就不用设置，可以通过Yii::$app->name;访问和设置
    'name'=>'我的yii第一个应用',


    //设置时区，值跟用于 date_default_timezone_set() 设置时区
    //这个一定要设置，不然默认变成utc(世界标准时间)的时间
    'timeZone' => 'Asia/Shanghai',

    //version 设置你应用的版本号，有用到的话就设置
    'version'=>'1.0',

    /*************Important Properties 重要属性结束****************/


    /*************Useful Properties 有用的属性****************/
    //http://www.yiiframework.com/doc-2.0/guide-structure-applications.html#useful-properties
    //这些配置很多都是不需要的，因为默认的好像是通用的，按照它的说话，配置这些根据你的conventions（习俗）

    //charset 设置应用使用的编码，默认是UTF-8
    /*
    'charset'=>'UTF-8',
    */

    //设置默认的controller和action，（这个不属于重要，但是我认为重要）,因为yii默认指向了SiteController
    /*
    'defaultRoute'=>'index/index',
    */

    //extensions 应用要用到的一些扩展,默认它的数组值来自@vendor/yiisoft/extensions.php返回的数组
    //可以用 Composer来书后去yii扩展
    /*
    'extensions' => [
        [
            'name' => 'extension name',
            'version' => 'version number',
            'bootstrap' => 'BootstrapClassName',  // optional, may also be a configuration array
            'alias' => [  // optional
                '@alias1' => 'to/path1',
                '@alias2' => 'to/path2',
            ],
        ],

        // ... more extensions like the above ...

    ],
    */

    //viewPath 视图魔板所在目录路径，注意一定要使用绝对路径，默认值'@app/views'，@app代表应用所在目录
    //layoutPath 指定通过魔板的目录路径(默认值'@app/views/layouts')
    //layout 指定通用魔板的名字（默认main,即main.php）
    /*
    'viewPath'=>'@app/views',//这里如果要设置要填绝对路劲（或者别人绝对路劲，否则也会找不到）
    'layoutPath'=>'@app/views/layouts',//只填'layouts'是找不到视图的，注意这里的layout要是绝对路劲（可以使用别名前最路劲，如@app/views/layouts）
    'layout'=>'main',
    */

    //runtimePath 临时文件目录路径，缓存日志文件和缓存，默认@app/runtime
    //一定注意值要使用绝对路劲，否则会是相对路径，比如你配置'runtimePath'=>'runtime'是不对的，因为runtime目录则是在入口文件index.php同级目录下
    /*
    'runtimePath'=>'@app/runtime'
    */

    //vendorPath 指定conposer下载文件库的目录，默认值@app/vendor
    /*
    'vendorPath'=>'@app/vendor',
    */

    //enableCoreCommands 只用于命yii令行模式,yii发行是否可用核心命令，默认为 true
    /*
    'enableCoreCommands'=>true,
    */

    /*************Useful Properties 有用的属性结束****************/






];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'] // adjust this to your needs
    ];
}

return $config;
