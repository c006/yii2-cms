<?php

namespace c006\cms\models\search;

use c006\cms\models\CmsFiles as CssFilesModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CmsFiles represents the model behind the search form about `c006\cms\models\CmsFiles`.
 */
class CmsFiles extends CssFilesModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cms_id', 'name', 'file', 'file_type'], 'safe'],
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
        $query = CssFilesModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('cms');

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'file_type', $this->file_type])
            ->orFilterWhere(['like', 'cms.name', $this->cms_id])
            ->orFilterWhere(['like', 'cms.id', $this->cms_id]);

        return $dataProvider;
    }
}
