<?php

namespace c006\cms\models\search;

use c006\cms\models\Cms as CmsModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Cms represents the model behind the search form about `c006\cms\models\Cms`.
 */
class Cms extends CmsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'css_id', 'active'], 'integer'],
            [['name', 'url'], 'safe'],
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
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CmsModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'     => $this->id,
            'css_id' => $this->css_id,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
