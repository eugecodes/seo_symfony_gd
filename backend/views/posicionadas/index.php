<?php

use yii\helpers\Html;
use yii\grid\GridView;
//date_default_timezone_set('America/Argentina/Buenos_Aires');
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Posicionadas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(
            Yii::t('backend', 'Crear {modelClass}', ['modelClass' => 'Posicionadas']),
            ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'idposicionadas',
            'palabra',
            'posicion',
            'traficomensual',
            [
                'attribute'=>'idcliente',
                'value'=>function ($model) {
                    return $model->cliente ? $model->cliente->nombre : null;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cliente::find()->all(), 'id', 'nombre')
            ],
            //'created_at:datetime',
            /*'url',
            [
                'class'=>\common\grid\EnumColumn::className(),
                'attribute'=>'activo',
                'enum'=>[
                    Yii::t('backend', 'Disabled'),
                    Yii::t('backend', 'Enabled')
                ]
            ],*/


            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ]
        ]
    ]); ?>

</div>
