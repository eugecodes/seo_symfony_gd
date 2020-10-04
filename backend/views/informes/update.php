<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posicionadas */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Informes',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Informes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="Informes-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
</div>