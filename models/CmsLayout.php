<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "cms_layout".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Cms[] $cms
 */
class CmsLayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'   => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCms()
    {
        return $this->hasMany(Cms::className(), ['layout_id' => 'id']);
    }
}
