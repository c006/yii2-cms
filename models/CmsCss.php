<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "cms_css".
 *
 * @property integer $id
 * @property string $selector
 * @property string $css
 *
 * @property Cms[] $cms
 */
class CmsCss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_css';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['selector'], 'required'],
            [['css'], 'string'],
            [['selector'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('app', 'ID'),
            'selector' => Yii::t('app', 'Selector'),
            'css'      => Yii::t('app', 'Css'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCms()
    {
        return $this->hasMany(Cms::className(), ['css_id' => 'id']);
    }
}
