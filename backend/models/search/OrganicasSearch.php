<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Organicas;

/**
 * OrganicasSearch represents the model behind the search form about `common\models\Organicas`.
 */
class OrganicasSearch extends Organicas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['palabra', 'volumen','costo','url','posicion','cliente_id','fecha_registro','captura'], 'safe'],
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
        $query = Organicas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_registro' => $this->fecha_registro,
            'volumen' => $this->volumen,
            'costo' => $this->costo,
            'posicion' => $this->posicion,
            'cliente_id' => $this->cliente_id,

        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
        ->andFilterWhere(['like', 'palabra', $this->palabra]);

        return $dataProvider;
    }
}
