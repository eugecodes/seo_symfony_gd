<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Organicas */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Organicas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php echo $form->field($model, 'cliente_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $clientes,
            'id',
            'nombre'
        ), ['prompt'=>'']) ?>
    <?php echo $form->field($model, 'palabra')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'posicion')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'volumen')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'busquedas_mes')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'buscador')->dropDownList($model->getBuscador()) ?>
    <?php echo $form->field($model, 'fecha_registro')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',]) ?>
    <?php echo $form->field($model, 'capturaTemp')->fileInput() ?>

    <?php if(!$model->isNewRecord):?>

        <?php if(!empty($model->captura)): ?>
            <?= Html::img('@web/capturas/'.$model->captura, ['alt' => $model->palabra]) ?>
            <?php echo $model->captura; ?>
        <?php endif; ?>    
    <?php endif; ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>