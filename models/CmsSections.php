<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "cms_sections".
 *
 * @property integer $id
 * @property integer $cms_id
 * @property string $name
 * @property string $html
 * @property integer $position
 */
class CmsSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_id', 'name', 'position'], 'required'],
            [['cms_id', 'position'], 'integer'],
            [['html'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('app', 'ID'),
            'cms_id'   => Yii::t('app', 'Cms ID'),
            'name'     => Yii::t('app', 'Name'),
            'html'     => Yii::t('app', 'Html'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCms()
    {
        return $this->hasOne(Cms::className(), ['id' => 'cms_id']);
    }
}
