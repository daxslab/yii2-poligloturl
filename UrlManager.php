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

    public $langParam = '_lang';

    public function parseRequest($request) {
        $result = parent::parseRequest($request);
        $lang = isset($result[1][$this->langParam]) ? $result[1][$this->langParam] : null;

        if ($lang) {
            Yii::$app->session->set($this->langParam, $lang);
        }

        if (Yii::$app->session->get($this->langParam)) {
            Yii::$app->language = Yii::$app->session->get($this->langParam);
        }

        return $result;
    }

    public function createUrl($params) {

        if (!isset($params[$this->langParam])) {
            $params[$this->langParam] = Yii::$app->language;
        }

        return parent::createUrl($params);
    }

}
