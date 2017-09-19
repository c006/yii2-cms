<?php

namespace c006\cms\models\search;

use c006\cms\models\CmsFonts as CmsFontsModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CmsFonts represents the model behind the search form about `c006\cms\models\CmsFonts`.
 */
class CmsFonts extends CmsFontsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'font_family', 'url'], 'safe'],
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
        $query = CmsFontsModel::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'font_family', $this->font_family])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
