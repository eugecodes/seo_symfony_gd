<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $url
 * @property string $email0
 * @property string $email1
 * @property string $email2
 * @property integer $activo
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'url', 'email0'], 'required'],
            [['email0'], 'email'],
            [['url'], 'url'],
            [['activo'], 'integer'],
            [['nombre', 'url'], 'string', 'max' => 255],
            [['email0', 'email1', 'email2'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'url' => 'Url',
            'email0' => 'Email para reportes',
            'email1' => 'Email1',
            'email2' => 'Email2',
            'activo' => 'Activo',
        ];
    }
}

?>