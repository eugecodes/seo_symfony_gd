<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Emails".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property string $fecha
 * @property integer $volumen
 *
 * @property Cliente $cliente
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id'], 'integer'],
            [['enviado','contenido'], 'safe']
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
            'enviado' => 'Fecha',
            'contenido' => 'Contenido',
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