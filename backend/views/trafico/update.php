<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trafico */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Trafico',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Trafico'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="Trafico-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
</div>