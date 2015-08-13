<?php

namespace c006\cms\models;

use Yii;

/**
 * This is the model class for table "css_files".
 *
 * @property integer $id
 * @property string $name
 * @property string $file
 * @property string $file_type
 */
class CmsFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'css_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'required'],
            [['name', 'file'], 'string', 'max' => 100],
            [['file_type'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => Yii::t('app', 'ID'),
            'name'      => Yii::t('app', 'Name'),
            'file'      => Yii::t('app', 'File'),
            'file_type' => Yii::t('app', 'File Type'),
        ];
    }
}
