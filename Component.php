<?php
// Copyright 2017. Plesk International GmbH.

namespace plesk\yii2pjax;

use Yii;
use yii\base\Component as YiiComponent;


/**
 * Convert PJAX config from Yii2 widget format to JS format.
 * <code>
 *  $this->registerJs(
 *      '$("#plesk-pjax-search-form").on("pjax:success", function() {
 *          $.pjax.reload(' . Json::encode(Yii::$app->pjax->pjaxConvertConfigWidgetToJs($gridPjaxOptions)) . ');
 *      });'
 *  );
 * </code>
 */
class Component extends YiiComponent
{
    /**
     * @var array
     */
    public $pjaxConfigMapWidgetJs = [
        'enablePushState' => 'push',
        'enableReplaceState' => 'replace',
        'timeout' => 'timeout',
        'scrollTo' => 'scrollTo',
    ];


    public function pjaxConvertConfigWidgetToJs($widgetConfig)
    {
        $jsConfig = [];
        foreach ($this->pjaxConfigMapWidgetJs as $widgetOption => $jsOption) {
            if (isset($widgetConfig[$widgetOption])) {
                $jsConfig[$jsOption] = $widgetConfig[$widgetOption];
            }
        }
        $jsConfig['container'] = isset($widgetConfig['container']) ?
            $widgetConfig['container'] :
            "#{$widgetConfig['id']}";
        return $jsConfig;
    }
}