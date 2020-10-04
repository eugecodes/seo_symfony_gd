<?php
/* @var $this yii\web\View */
/* @var $model common\models\Sugeridas */
/* @var $categories common\models\SugeridasCategory[] */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Sugeridas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Sugeridas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Sugeridas-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes
    ]) ?>

</div>