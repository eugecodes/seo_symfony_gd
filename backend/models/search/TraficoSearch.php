<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Trafico;

/**
 * TraficoSearch represents the model behind the search form about `common\models\Trafico`.
 */
class TraficoSearch extends Trafico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['fecha', 'volumen','cliente_id'], 'safe'],
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
        $query = Trafico::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'volumen' => $this->volumen,
            'fecha' => $this->fecha,
            'cliente_id' => $this->cliente_id,

        ]);

        $query->andFilterWhere(['like', 'volumen', $this->volumen])
        ->andFilterWhere(['like', 'fecha', $this->fecha]);

        return $dataProvider;
    }
}
