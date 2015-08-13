<?php

namespace c006\cms\models\search;

use c006\cms\models\CmsSections as CmsSectionsModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CmsSections represents the model behind the search form about `c006\cms\models\CmsSections`.
 */
class CmsSections extends CmsSectionsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cms_id', 'position'], 'integer'],
            [['name', 'html'], 'safe'],
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
        $query = CmsSectionsModel::find();

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
            'id'       => $this->id,
            'cms_id'   => $this->cms_id,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'html', $this->html]);

        return $dataProvider;
    }
}
