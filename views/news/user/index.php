<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:54
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

echo "this is vieweeeee";
$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
print_r($this->params);
?>

<h1>zxz主页面</h1>
<?php
echo Html::a('退出',['news/user/logout']);
?>


