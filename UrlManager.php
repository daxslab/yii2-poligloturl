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

	/**
     * The name of the param containing the code of the language to the set application one
     */
    public $langParam = '_lang';

	/**
     * @inheritdoc
     *
     * Tries to set the application language if it finds a the $langParam set on $_GET params
     */
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

	/**
     * @inheritdoc
     *
     * Always add the current language to the URLs created with this component
     */    
	public function createUrl($params) {

        if (!isset($params[$this->langParam])) {
            $params[$this->langParam] = Yii::$app->language;
        }

        return parent::createUrl($params);
    }

}
