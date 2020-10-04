<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trafico".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property string $fecha
 * @property integer $volumen
 *
 * @property Cliente $cliente
 */
class Trafico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trafico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'volumen'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'fecha' => 'Fecha',
            'volumen' => 'Volumen',
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