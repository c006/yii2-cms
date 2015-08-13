<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "cms_fonts".
 *
 * @property integer $id
 * @property string $name
 * @property string $font_family
 * @property string $url
 */
class CmsFonts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_fonts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['font_family', 'url'], 'required'],
            [['name', 'font_family'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('app', 'ID'),
            'name'        => Yii::t('app', 'Name'),
            'font_family' => Yii::t('app', 'Font Family'),
            'url'         => Yii::t('app', 'Url'),
        ];
    }
}
