<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "cms".
 *
 * @property integer $id
 * @property integer $layout_id
 * @property string $name
 * @property integer $css_id
 * @property string $url
 * @property integer $active
 *
 * @property CmsCss $css
 * @property CmsLayout $layout
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['layout_id', 'name', 'url'], 'required'],
            [['layout_id', 'css_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 200],
            [['css_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => CmsCss::className(), 'targetAttribute' => ['css_id' => 'id']],
            [['layout_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => CmsLayout::className(), 'targetAttribute' => ['layout_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => Yii::t('app', 'ID'),
            'layout_id' => Yii::t('app', 'Layout ID'),
            'name'      => Yii::t('app', 'Name'),
            'css_id'    => Yii::t('app', 'Css ID'),
            'url'       => Yii::t('app', 'Url'),
            'active'    => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCss()
    {
        return $this->hasOne(CmsCss::className(), ['id' => 'css_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayout()
    {
        return $this->hasOne(CmsLayout::className(), ['id' => 'layout_id']);
    }
}
