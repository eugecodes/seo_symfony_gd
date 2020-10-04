<?php
/* @var $this yii\web\View */
/* @var $model common\models\Organicas */
/* @var $categories common\models\OrganicasCategory[] */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Orgánicas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Organicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Organicas-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes
    ]) ?>

</div>