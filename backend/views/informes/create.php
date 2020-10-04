<?php
$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Informes',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Informes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Informes-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes
    ]) ?>

</div>