<?php

namespace daxslab\poligloturl;

use Yii;
use yii\web\UrlManager as BaseUrlManager;

/**
 * Description of UrlManager
 *
 * @author glpz
 */
class UrlManager extends BaseUrlManager {

    public function parseRequest($request) {
        $result = parent::parseRequest($request);
        $lang = isset($result[1]['lang']) ? $result[1]['lang'] : null;

        if ($lang) {
            Yii::$app->session->set('lang', $lang);
        }

        if (Yii::$app->session->get('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        return $result;
    }

    public function createUrl($params) {

        if (!isset($params['lang'])) {
            $params['lang'] = Yii::$app->language;
        }

        return parent::createUrl($params);
    }

}
