<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sugeridas */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Sugeridas',
]) . ' ' . $model->palabra;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'sugeridas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->palabra, 'url' => ['view', 'id' => $model->idsugeridas]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="Sugeridas-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
</div>