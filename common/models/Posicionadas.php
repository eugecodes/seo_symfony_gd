<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "posicionadas".
 *
 * @property integer $idposicionadas
 * @property string $palabra
 * @property integer $posicion
 * @property string $buscador
 * @property integer $traficomensual
 * @property string $costo
 * @property integer $idcliente
 *
 * @property Cliente $idcliente0
 */
class Posicionadas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posicionadas';
    }

    /**
     * @return PosicionadasQuery
     */
    /*public static function find()
    {
        return new PosicionadasQuery(get_called_class());
    }*/


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcliente', 'palabra'], 'required'],
            [['created_at'], 'default', 'value' => time()],
            [['created_at'], 'filter', 'filter' => 'strtotime'],
            [['posicion', 'traficomensual', 'idcliente'], 'integer'],
            [['posicion'], 'integer', 'max' => 5],
            [['traficomensual'], 'integer'],
            [['buscador'], 'string'],
            [['costo'], 'number'],
            [['palabra'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idposicionadas' => 'Idposicionadas',
            'palabra' => 'Palabra',
            'posicion' => 'Posicion',
            'buscador' => 'Buscador',
            'traficomensual' => 'Búsquedas por mes',
            'costo' => 'Costo',
            'created_at' => 'Creado el',
            'idcliente' => 'Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idcliente']);
    }

    public static function getBuscador()
    {

    /*    return[
    'value1' => ['disabled' => true],
    'value2' => ['label' => 'value 2'],
];*/
        return array(
            'google.com' => 'google.com',
            'google.com.ar' => 'google.com.ar',
            'yahoo.com' => 'yahoo.com',
            );
    }


}
