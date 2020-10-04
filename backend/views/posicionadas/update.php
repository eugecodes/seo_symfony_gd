<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posicionadas */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Posicionadas',
]) . ' ' . $model->palabra;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Posicionadass'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->palabra, 'url' => ['view', 'id' => $model->idposicionadas]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="Posicionadas-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
</div>