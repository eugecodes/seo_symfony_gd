<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posicionadas */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Organicas',
]) . ' ' . $model->palabra;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Organicass'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->palabra, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="Organicas-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
</div>