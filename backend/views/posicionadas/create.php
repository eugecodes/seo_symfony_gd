<?php
/* @var $this yii\web\View */
/* @var $model common\models\Posicionadas */
/* @var $categories common\models\PosicionadasCategory[] */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Posicionadas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Posicionadass'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Posicionadas-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes
    ]) ?>

</div>