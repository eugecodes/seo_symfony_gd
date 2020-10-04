<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sugeridas */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Sugeridas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'palabra')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'busquedas')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cliente_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $clientes,
            'id',
            'nombre'
        ), ['prompt'=>'']) ?>

    <?php echo $form->field($model, 'competencia')->dropDownList($model->getCompetencia()); ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>