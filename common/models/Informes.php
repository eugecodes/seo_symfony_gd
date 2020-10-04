<?php

namespace common\models;
use common\models\query\InformesQuery;
use Yii;

/**
 * This is the model class for table "Informes".
 *
 * @property integer $idInformes
 * @property string $fecha
 * @property string $competencia
 * @property integer $cliente_id
 *
 * @property Cliente $cliente
 */
class Informes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['informe','cliente_id'], 'required'],
            //[['idInformes', 'busquedas', 'cliente_id'], 'integer'],
            [['fecha'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'informe' => 'Informe',
            'fecha' => 'Fecha',
            'cliente_id' => 'Cliente ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

}
