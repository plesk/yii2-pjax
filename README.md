Plesk extension for Yii2 framework to extend it's PJAX functions 
============================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

- Add the following lines to your `composer.json` file:

    ```js
    "repositories": [
        {
            "type": "vcs",
            "url":  "ssh://git@git.plesk.ru:7999/id/yii2-pjax.git"
        }
    ]
    ```

- Run `composer require "plesk/yii2-pjax:^1.0.0"`

API
------------

Setup the component in your web.php config:
```php
[
    'components' => [
        'pjax' => [
            'class' => 'plesk\yii2pjax\Component',
        ],
    ],
]
```

Convert PJAX config from Yii2 widget format to JS format.
```php
$this->registerJs(
    '$("#plesk-pjax-search-form").on("pjax:success", function() {
        $.pjax.reload(' . Json::encode(Yii::$app->pjax->pjaxConvertConfigWidgetToJs($gridPjaxOptions)) . ');
    });'
);
```

Exceptions

    - plesk\yii2pjax\exceptions\Exception

        All exceptions thrown by the extension, extend this exception.