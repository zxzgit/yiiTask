<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/13 9:33
 */
/* @var $exception \yii\web\HttpException|\Exception */
/* @var $handler \yii\web\ErrorHandler */
if ($exception instanceof \yii\web\HttpException) {
	$code = $exception->statusCode;
} else {
	$code = $exception->getCode();
}
$name = $handler->getExceptionName($exception);
if ($name === null) {
	$name = 'Error';
}
if ($code) {
	$name .= " (#$code)";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
echo "this is customer error page by xz";<?= $handler->htmlEncode($name) ?>
</body>
</html>