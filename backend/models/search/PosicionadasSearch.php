<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Posicionadas;

/**
 * PosicionadasSearch represents the model behind the search form about `common\models\Posicionadas`.
 */
class PosicionadasSearch extends Posicionadas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idposicionadas', 'posicion', 'traficomensual', 'idcliente'], 'integer'],
            [['palabra', 'idcliente', 'buscador'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Posicionadas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idposicionadas' => $this->idposicionadas,
            'palabra' => $this->palabra,
            'idcliente' => $this->idcliente,
            //'url' => $this->url,
            /*'email0' => $this->email0,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'activo' => $this->activo,*/
        ]);

        $query->andFilterWhere(['like', 'palabra', $this->palabra]);
            //->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
