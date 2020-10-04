<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Trafico */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Trafico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'fecha')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',]) ?>

    <?php echo $form->field($model, 'volumen')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cliente_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $clientes,
            'id',
            'nombre'
        ), ['prompt'=>'']) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>