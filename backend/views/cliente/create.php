<?php
/* @var $this yii\web\View */
/* @var $model common\models\Cliente */

$this->title = Yii::t('backend', 'Crear {modelClass}', [
    'modelClass' => 'Cliente',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?php echo $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
