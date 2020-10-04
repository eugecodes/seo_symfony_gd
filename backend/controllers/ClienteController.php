<?php

namespace backend\controllers;

use Yii;
use common\models\Cliente;
use backend\models\search\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Organicas;
use common\models\Informes;
use common\models\Emails;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ]
            ]
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder'=>['id'=>SORT_DESC]
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'categories' => ClienteCategory::find()->active()->all(),
            ]);
        }
    }


    public function actionPreenviar($id,$accion){
        if ($accion=='preview'){
            $this->actionEnviar($id,true);
        }else{
            $this->actionEnviar($id);
        }
    }

    public function actionEnviar($id,$preview=false)
    {
        $model = $this->findModel($id);
        // Busco las palabras del cliente
       /* $org = Organicas::findAll([
                'cliente_id'=>$id,
                'MONTH(fecha_registro)'=>date('m'),
                'YEAR(fecha_registro)'=>date('Y'),


            ]);*/


        $org= Organicas::find()
        ->where(['cliente_id'=>$id])
         /*   'MONTH(fecha_registro)'=>date('m'),
            'YEAR(fecha_registro)'=>date('Y'),])*/
        ->orderBy('posicion ASC')
        ->all();

        $cantPalabras = count($org);


        if (empty($org)) {
            Yii::$app->session->setFlash('alert', [
                'body' => Yii::t('backend', ' No hay registros para enviar'),
                'options' => ['class' => 'alert alert-error']
            ],true);
            return $this->redirect(['index']);
        }

        $arrayPos = array();
        $tablaPos = '<table width="500" bgcolor="#34495E" class="rwd-table" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #34495E; border-collapse: collapse; border-radius: .4em; color: #fff; font-weight: normal !important; margin: 1em 0; min-width: 0.4em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; overflow: hidden">
<tbody><tr>
  <td width="139"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left; color: #57BBD2;"><strong>Palabra</strong></span></td>
  <td width="146"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left; color: #57BBD2;"><strong>Posición</strong></span></td>
  <td width="75"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left; color: #57BBD2;"><strong>Volumen</strong></span></td>
  <td width="45"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left; color: #57BBD2;"><strong>CPC</strong></span></td>
  <td width="71"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left; color: #57BBD2;"><strong>Resultado</strong></span></td>
</tr>';


        $con1 = 0;
        $con5 = 0;
        $con10 = 0;
        $con15 = 0;
        $con20 = 0;
        $con50 = 0;
        $con100 = 0;
        $con120 = 0;
        $conSupera = 0;
        $mayor = 0;
        $mayorTemp = 0;

        foreach ($org as $key => $posicion) :
            

           /* if(!in_array($posicion->posicion, $arrayPos)){
                $orgPos = Organicas::findAll([
                    'cliente_id'=>$id,
                    'MONTH(fecha_registro)'=>date('m'),
                    'YEAR(fecha_registro)'=>date('Y'),
                    'posicion'=>$posicion->posicion
                ]);



                $arrayPos[$posicion->posicion]=count($orgPos);
            }*/

            
//echo $posicion->posicion."<br>";
            switch ($posicion->posicion) {
                case 1:
                    $con1++; 
                    $mayorTemp = $con1;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;


                    break;
                case ($posicion->posicion>1 and $posicion->posicion<=5):
                    $con5++;
                    $mayorTemp = $con5;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;
                case ($posicion->posicion>5 and $posicion->posicion<=10):
                    $con10++;
                    $mayorTemp = $con10;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;     
                case ($posicion->posicion>10 and $posicion->posicion<=15):
                    $con15++;
                    $mayorTemp = $con15;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;
                case ($posicion->posicion>15 and $posicion->posicion<=20):
                    $con20++;
                    $mayorTemp = $con20;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;
                case ($posicion->posicion>20 and $posicion->posicion<=50):
                    $con50++;
                    $mayorTemp = $con50;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;
                case ($posicion->posicion>50 and $posicion->posicion<=100):
                    $con100++;
                    $mayorTemp = $con100;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;
                case ($posicion->posicion>100 and $posicion->posicion<=120):
                    $con120++;
                    $mayorTemp = $con120;
                    if ($mayorTemp>$mayor)
                        $mayor = $mayorTemp;
                    break;     
                default:
                    # code...
                    break;
            }

            $laCaptura = (!empty($posicion->captura)) ? '<a href="'.Yii::getAlias('@backendUrl').'/capturas/'.$posicion->captura.'"><img src="'.Yii::getAlias('@backendUrl').'/img/click.png" alt="" width="48" height="20" /></a>' : "" ;

            $tablaPos .= '

<tr>
  <td><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-top: 0.5em; text-align: left">'.$posicion->palabra.'</span></td>
  <td><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: left">'.$posicion->posicion.'</span></td>
  <td><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: left">'.$posicion->volumen.'</span></td>
  <td><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: left">'.$posicion->costo.'</span></td>
  <td><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: block; font-size: 11px; font-weight: normal !important; margin: .5em 1em; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-bottom: .5em; text-align: left">'.$laCaptura.'</span></td>
</tr>';
        endforeach;

        $tablaPos .= '</tbody></table>';

        //echo $tablaPos;

$ejeY = "";
$ejeX = "";
foreach ($arrayPos as $key => $value) {
    $ejeY .= $key.",";
    $ejeX .= $value."|";
   //echo $key." ".$value."<br>";
}

$ejeY = trim($ejeY,"|");
$ejeX = trim($ejeX,",");
//echo $ejeY;
//$urlImg = "https://chart.googleapis.com/chart?chs=500x250&cht=bvs&chd=t:".$ejeX."&chxt=x,y,x&chxl=1:|".$ejeY."|2:|Cantidad de Palabras claves posicionadas&chbh=100&chxs=0,000000,12,1,lt|1,222D32,8,0,lt|2,222D32,8,-1,lt&chco=5ABAD0&chg=15,20";
//ksort($arrayPos);
//$urlImg = "https://chart.googleapis.com/chart?chs=320x200&cht=bvs&chd=t:".$ejeY."&chxt=y,x&chxr=0,0,71,5&chxl=1:|".$ejeX."&chbh=35";
//$urlImg = "https://chart.googleapis.com/chart?chs=500x250&cht=bvg&chd=t:1,5,10&chxt=y,x&chxr=0,0,5,10&chxl=0:|0|5|10|1:|0|5|10&chbh=35";

$urlImg = "http://chart.apis.google.com/chart?
cht=bvg&chs=510x250&chd=t:".$con1.",".$con5.",".$con10.",".$con15.",".$con20.",".$con50.",".$con100."&
chxr=1,0,".$mayor.",1&chds=0,".$mayor."&
chco=5ABAD0&
chbh=35,0,30&
chxt=x,y,x&chxl=0:|1ra Posición|Primeros 5|Primeros 10|Primeros 15|Primeros 20|Primeros 50|Primeros 100|2:||||&chxs=0,000000,10|2,000000,15&
chtt=&chts=000000,15&
chg=0,34,5,5";
/*
echo '<img src="'.$urlImg.'">';
exit();*/

/*
$urlImg = "http://chart.apis.google.com/chart?
cht=bvg&chs=510x250&chd=t:".$con1.",".$con5.",".$con10.",".$con15.",".$con20.",".$con50.",".$con100.",".$con120."&
chxr=1,0,".$mayor.",1&chds=0,".$mayor."&
chco=5ABAD0&
chbh=30,0,30&
chxt=x,y,x&chxl=0:|1ra Posición|Primeros 5|Primeros 10|Primeros 15|Primeros 20|Primeros 50|Primeros 100|Primeros 120|2:||||&chxs=0,000000,10|2,000000,15&
chtt=Cantidad+palabras+claves+por+posicion&chts=000000,15&
chg=0,34,5,5";
*/



/*echo '<img src="'.$urlImg.'">';

exit();*/



// Busco los informes
$Inf = Informes::findAll([
        'cliente_id'=>$id,
        'MONTH(fecha)'=>date('m'),
        'YEAR(fecha)'=>date('Y'),
]);
$htmlInf = "";
foreach ($Inf as $key => $informe) {
    $htmlInf .='<span style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">'.$informe->informe.'</span><br><br>';
}

// Preparmos contenido para guardar historico
$historiaEnviados = Yii::$app->view->render('@app/mail/prueba', [
    'model'=>$model,
    'tablaPos'=>$tablaPos,
    'id'=>$id,
    'cantPalabras'=>$cantPalabras,
    'grafico'=>$urlImg,
    'informe'=>$htmlInf
    ]);

    $emails = new Emails();
    $emails->cliente_id = $id;
    $emails->enviado = Yii::$app->formatter->asDate('now','php:Y-m-d');
    $emails->contenido = $historiaEnviados;
    $emails->save();

    if ($preview){
        $destinatario="alejandro@grupodeboss.com";
    }else{
        $destinatario=$model->email0;
    }

    Yii::$app->mail->compose(['html' => 'prueba'], [
        'model'=>$model,
        'tablaPos'=>$tablaPos,
        'id'=>$id,
        'cantPalabras'=>$cantPalabras,
        'grafico'=>$urlImg,
        'informe'=>$htmlInf


        ])
     ->setFrom('seo@grupodeboss.com')
     ->setTo($destinatario)
     ->setBcc(array('alejandro@grupodeboss.com','seo@grupodeboss.com','jpherrera@gmail.com'))
     ->setSubject('Informe de Posicionamiento (SEO) Grupo Deboss - '.ucfirst(Yii::$app->formatter->asDate('now', 'php:F')).' '.date('Y'))
     ->send();

        Yii::$app->session->setFlash('alert', [
                'body' => Yii::t('backend', ' Se ha enviado el reporte'),
                'options' => ['class' => 'alert alert-success']
            ],true);
        return $this->redirect(['index']);


    }


    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                //'categories' => ClienteCategory::find()->active()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
