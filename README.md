PoliglotUrl
===========
Extension to help setup the language of an application based on params specifing the language 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist daxslab/yii2-poligloturl "*"
```

or add

```
"daxslab/yii2-poligloturl": "*"
```

to the require section of your `composer.json` file.

Configuration
-------------

Configure the View component into the main configuration file of your application:

    'components' => [
        ...
        'urlManager' => [
            'class' => 'daxslab\poligloturl\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //home
                ['pattern' => '/', 'route' => 'site/index', 'defaults' => ['lang' => 'en-US']],
                ['pattern' => '/es', 'route' => 'site/index', 'defaults' => ['lang' => 'es']],
                ['pattern' => '/de', 'route' => 'site/index', 'defaults' => ['lang' => 'de']],
            ],
        ],
        ...
    ]

Usage
-----

Once the extension is configured, simply use it in your views by:

    <?= Html::a('Spanish version', ['/site/index', 'lang' => 'es']) ?>