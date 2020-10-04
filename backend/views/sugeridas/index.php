<?php
//use fedemotta\datatables\DataTables;
use yii\helpers\Html;
use yii\grid\GridView;
//date_default_timezone_set('America/Argentina/Buenos_Aires');
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Sugeridas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(
            Yii::t('backend', 'Crear {modelClass}', ['modelClass' => 'Sugeridas']),
            ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'idposicionadas',
            'palabra',
            'busquedas',
            'competencia',
            [
                'attribute'=>'cliente_id',
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



<?php
   /* $searchModel = new ModelSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/
?>
<?php /*

<?= DataTables::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'palabra',
        ['class' => 'yii\grid\SerialColumn'],

        //columns

        ['class' => 'yii\grid\ActionColumn'],
    ],
    'clientOptions' => [
    "lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
    "info"=>false,
    "responsive"=>true, 
    "dom"=> 'lfTrtip',
    "tableTools"=>[
        "aButtons"=> [  
            [
            "sExtends"=> "copy",
            "sButtonText"=> Yii::t('app',"Copy to clipboard")
            ],[
            "sExtends"=> "csv",
            "sButtonText"=> Yii::t('app',"Save to CSV")
            ],[
            "sExtends"=> "xls",
            "oSelectorOpts"=> ["page"=> 'current']
            ],[
            "sExtends"=> "pdf",
            "sButtonText"=> Yii::t('app',"Save to PDF")
            ],[
            "sExtends"=> "print",
            "sButtonText"=> Yii::t('app',"Print")
            ],
        ]
    ]
],
]);?>

*/?>