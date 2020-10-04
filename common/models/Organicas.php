<?php

namespace common\models;
use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "organicas".
 *
 * @property integer $id
 * @property string $palabra
 * @property string $posicion
 * @property integer $volumen
 * @property string $costo
 * @property string $url
 * @property integer $cliente_id
 *
 * @property Cliente $cliente
 */
class Organicas extends \yii\db\ActiveRecord
{
    public $capturaTemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organicas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['volumen', 'cliente_id','busquedas_mes'], 'integer'],
            [['costo'], 'number'],
            [['captura'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['fecha_registro'], 'date', 'format'=>'yyyy-M-d'],
            [['palabra'], 'string', 'max' => 255],
            [['posicion'], 'string', 'max' => 25],
            [['buscador'], 'string'],
            [['url'], 'string', 'max' => 250],
            [['palabra','cliente_id','fecha_registro'], 'required'],
            [['url'], 'url']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'palabra' => 'Palabra',
            'posicion' => 'Posición',
            'volumen' => 'Volumen',
            'costo' => 'Costo',
            'buscador' => 'Buscador',
            'url' => 'Url',
            'cliente_id' => 'Cliente',
            'fecha_registro' => 'Fecha muestra',
            'busquedas_mes' => 'Busquedas por mes',
            'captura' => 'Captura',
            'capturaTemp' => 'Captura'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
           
            if (!empty($this->capturaTemp)) {
                $this->capturaTemp->saveAs(Yii::$app->basePath.'/web/capturas/' . $this->capturaTemp->baseName . '.' . $this->capturaTemp->extension);
            }
            return true;
        } else {
            return false;
        }
    }


    public static function getBuscador()
    {
        return array(
            'google.com' => 'google.com',
            'google.com.ar' => 'google.com.ar',
            'yahoo.com' => 'yahoo.com',
            );
    }
}