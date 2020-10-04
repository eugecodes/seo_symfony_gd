<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sugeridas".
 *
 * @property integer $idsugeridas
 * @property string $palabra
 * @property integer $busquedas
 * @property string $competencia
 * @property integer $cliente_id
 *
 * @property Cliente $cliente
 */
class Sugeridas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sugeridas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['palabra','cliente_id'], 'required'],
            [['busquedas'], 'integer'],
            //[['idsugeridas', 'busquedas', 'cliente_id'], 'integer'],
            [['competencia'], 'string'],
            [['palabra'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsugeridas' => 'Idsugeridas',
            'palabra' => 'Palabra',
            'busquedas' => 'Busquedas',
            'competencia' => 'Competencia',
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

    public static function getCompetencia()
    {
        return array(
            'baja' => 'Baja',
            'baja/media' => 'Baja / Media',
            'media' => 'Media',
            'alta' => 'Alta',
            );
    }

}
