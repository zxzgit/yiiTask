<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/9 14:13
 */

namespace app\assets;


use yii\web\AssetBundle;

class helloPublishAsset extends AssetBundle {
	public $sourcePath = '@app/static';
	public $basePath = '@webroot';
	public $css = [
		'css/hellobootstrap.css',
	];
	public $js = [
//		'http://libs.baidu.com/jquery/1.9.1/jquery.min.js',
		'js/hellojquery.js',
		'js/zxzjquery.js',

	];
//	public $publishOptions = [
//		'only' => [
//			'js/',
//			'css/',
//		],
//	];
}