<?php
/* @var $this yii\web\View */
/* @var $model common\models\Trafico */
/* @var $categories common\models\TraficoCategory[] */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Trafico',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Trafico'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Trafico-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes
    ]) ?>

</div>