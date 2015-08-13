<?php

namespace c006\cms\assets;

use c006\cms\models\CmsCss;
use c006\cms\models\CmsFiles;
use c006\cms\models\CmsFonts;
use c006\cms\models\CmsSections;

/**
 * Class AppHelper
 * @package c006\cms\assets
 */
class AppHelper
{


    /**
     * @param $html
     *
     * @return mixed
     */
    static public function addImages($html)
    {
        $array = [];
        $url = '/images/cms';
        preg_match_all('/({IMG_[0-9]+})/', $html, $matches);

        foreach ($matches as $k => $item) {
            if (isset($item[0])) {
                $array[ $item[0] ] = self::getImageFile(preg_replace('/[^0-9]/', '', $item[0]));
            }
        }
        foreach ($array as $k => $v) {
            $html = str_replace($k, $url . '/' . $v, $html);
        }

        return $html;
    }


    static public function cleanCss($css)
    {
        $out = '';
        $max = 0;
        $min = 20;
        $array = [];
        foreach (explode(PHP_EOL, $css) as $line) {
            $css = $line;
            if (stripos($css, ':') !== FALSE) {
                list($a, $b) = explode(':', $css);
                $a = trim($a);
                $b = trim($b);
                if ($max < strlen($a)) {
                    $max = strlen($a);
                }
                if ($min > strlen($b)) {
                    $min = strlen($b);
                }
                $array[] = [$a, $b];
            }
        }

        foreach ($array as $item) {
            $len = $max - strlen($item[0]);
            $ratio = ceil($max / $min / 2);
            $ratio = ($ratio < 3) ? 3 : $ratio;
            $ratio = ($ratio > 3) ? 4 : $ratio;
            if (strlen($item[0]) == $max) {
                $out .= $item[0] . "\t: " . trim($item[1]) . PHP_EOL;
            } else {
                $out .= $item[0] . str_repeat("\t", ceil(($len + 1) / $ratio)) . ': ' . trim($item[1]) . PHP_EOL;
            }

        }

        return $out;
    }

    /**
     * @param $id
     *
     * @return bool|string
     */
    static public function getImageFile($id)
    {

        $model = CmsFiles::findOne($id);
        if (is_object($model)) {
            return $model->file;
        }

        return FALSE;
    }

    /**
     * @param int $id
     *
     * @return string
     */
    static public function getCss($id = 0)
    {
        $css = '';
        if ($id) {
            $model = CmsCss::find()
                ->where(['id' => $id])
                ->asArray()
                ->one();
        } else {
            $model = CmsCss::find()
                ->asArray()
                ->all();
        }
        foreach ($model as $item) {
            $css .= PHP_EOL . '.CMS ' . $item['selector'] . ' {';
            $css .= PHP_EOL . $item['css'];
            $css .= PHP_EOL . '}';
        }

        return $css;
    }

    /**
     * @param int $id
     *
     * @return bool|mixed
     */
    static public function getCssSelector($id = 0)
    {
        $model = CmsCss::find()
            ->where(['id' => $id])
            ->asArray()
            ->one();
        if (sizeof($model)) {
            return str_replace('.', '', $model['selector']);
        }

        return FALSE;
    }

    /**
     * @param $cms_id
     *
     * @return int
     */
    static public function getCssSections($cms_id)
    {
        if (!$cms_id) {
            return 0;
        }
        $model = CmsCss::find()
            ->where(['cms_id' => $cms_id])
            ->asArray()
            ->one();

        if (sizeof($model)) {
            return $model;
        }

        return [];
    }

    /**
     * @param $cms_id
     *
     * @return array|int|null|\yii\db\ActiveRecord
     */
    static public function getSections($cms_id)
    {
        if (!$cms_id) {
            return 0;
        }
        $model = CmsSections::find()
            ->where(['cms_id' => $cms_id])
            ->orderBy('position')
            ->asArray()
            ->all();

        if (sizeof($model)) {
            return $model;
        }

        return [];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getFonts()
    {
        $model = CmsFonts::find()
            ->asArray()
            ->all();

        if (sizeof($model)) {
            return $model;
        }

        return [];
    }
}