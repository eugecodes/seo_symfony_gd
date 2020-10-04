<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Posicionadas */
/* @var $categories common\models\PosicionadasCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Posicionadas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'palabra')->textInput(['maxlength' => true]) ?>



    <?php echo $form->field($model, 'idcliente')->dropDownList(\yii\helpers\ArrayHelper::map(
            $clientes,
            'id',
            'nombre'
        ), ['prompt'=>'']) ?>



       <?php echo $form->field($model, 'buscador')->dropDownList($model->getBuscador()) ?>


<?php echo $form->field($model, 'posicion')->textInput(['maxlength' => 5]) ?>
<?php echo $form->field($model, 'traficomensual')->textInput(['maxlength' => 8]) ?>
<?php echo $form->field($model, 'costo')->textInput(['maxlength' => 8]) ?>
<?php echo $form->field($model, 'created_at')->widget(
        'trntv\yii\datetimepicker\DatetimepickerWidget',
        [
            'phpDatetimeFormat' => 'dd/MM/yyyy'
        ]
    ) ?>
    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
