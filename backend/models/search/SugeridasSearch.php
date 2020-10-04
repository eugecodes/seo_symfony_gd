<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sugeridas;

/**
 * SugeridasSearch represents the model behind the search form about `common\models\Sugeridas`.
 */
class SugeridasSearch extends Sugeridas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsugeridas', 'busquedas', 'cliente_id'], 'integer'],
            [['palabra', 'competencia','cliente_id','busquedas'], 'safe'],
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
        $query = Sugeridas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idsugeridas' => $this->idsugeridas,
            'palabra' => $this->palabra,
            'competencia' => $this->competencia,
            'cliente_id' => $this->cliente_id,
            'busquedas' => $this->busquedas,

        ]);

        $query->andFilterWhere(['like', 'palabra', $this->palabra]);

        return $dataProvider;
    }
}
