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

?>
<h1>Countries</h1>
<p>
	<?= Html::a('Create Country', ['create','a'=>1], ['class' => 'btn btn-success']) ?>
</p>
<ul>
	<?php foreach ($countries as $country): ?>
		<li>
			<?= Html::encode("{$country->username} ({$country->uid})") ?>:
			<?= $country->sex ?>
		</li>
	<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
