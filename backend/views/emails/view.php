<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Collapse;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Comprobante '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-view">

<p>
    <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>



    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Cliente',
                'value' => $model->cliente->nombre,
            ],
            'enviado',
            'contenido:html',
        ],
    ]) ?>

</div>