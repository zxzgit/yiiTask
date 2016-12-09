<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 22:23
 */

namespace app\assets;
use yii\web\AssetBundle;

class zxzAsset extends AssetBundle{
	public $css=[
		'http://cdn.bootcss.com/bootstrap/4.0.0-alpha.5/css/bootstrap.css',//bootcdn cdn
	];
	public $js=[
		'http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js',//sina cdn
		'http://libs.baidu.com/jquery/1.9.1/jquery.min.js',//baidu cnd this is fastest
		'http://libs.useso.com/js/jquery/1.9.1/jquery.min.js',//360 cdn
	];
}