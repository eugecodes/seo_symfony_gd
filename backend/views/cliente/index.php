<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(
            Yii::t('backend', 'Crear {modelClass}', ['modelClass' => 'Cliente']),
            ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'nombre',
            'url',
            [
                'class'=>\common\grid\EnumColumn::className(),
                'attribute'=>'activo',
                'enum'=>[
                    Yii::t('backend', 'Disabled'),
                    Yii::t('backend', 'Enabled')
                ]
            ],
                        ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}{enviar}{preenviar}',
                'buttons' => [
                    'enviar' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, 
                        [
                            'title' => 'Enviar Reporte',
                            'data-confirm' => \Yii::t('yii', '¿Está seguro que quiere enviar un reporte?'),
                        ]);
                    },
                    'preenviar' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url."&accion=preview", 
                        [
                            'title' => 'Enviar Preview Reporte',
                            'data-confirm' => \Yii::t('yii', '¿Está seguro que quiere enviar un preview de reporte?'),
                        ]);
                    },



                ],


            ],


            // 'updated_at',

           /* [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ]*/
        ]
    ]); ?>

</div>
