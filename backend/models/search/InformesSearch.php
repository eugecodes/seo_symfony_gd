<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Informes;

/**
 * InformesSearch represents the model behind the search form about `common\models\Informes`.
 */
class InformesSearch extends Informes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['informe', 'fecha'], 'safe'],
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
        $query = Informes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'informe' => $informe,
            'cliente_id' => $this->cliente_id,

        ]);

        /*$query->andFilterWhere(['like', 'url', $this->url])
        ->andFilterWhere(['like', 'palabra', $this->palabra]);*/

        return $dataProvider;
    }
}
