<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Emails;

/**
 * EmailsSearch represents the model behind the search form about `common\models\Emails`.
 */
class EmailsSearch extends Emails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['enviado', 'contenido'], 'safe'],
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
        $query = Emails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'enviado' => $this->enviado,
            'contenido' => $this->contenido,
            'cliente_id' => $this->cliente_id,

        ]);

        $query->andFilterWhere(['like', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}
