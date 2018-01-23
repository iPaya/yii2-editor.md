<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\EditorMD;


use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class EditorMD extends InputWidget
{
    /**
     * @var string the input value.
     */
    public $value;
    public $clientOptions = [];

    public function init()
    {
        parent::init();

        $this->registerAsset();
        $this->initClientOptions();
    }

    public function initClientOptions()
    {
        $asset = $this->registerAsset();
        if (!isset($this->clientOptions['path'])) {
            $this->clientOptions['path'] = $asset->baseUrl . '/lib/';
        }
    }

    /**
     * @return EditorMDAsset
     */
    public function registerAsset()
    {
        return EditorMDAsset::register($this->getView());
    }

    public function run()
    {
        $id = $this->options['id'];
        $view = $this->getView();

        ob_start();
        echo Html::beginTag('div', ['id' => $this->options['id']]);
        echo $this->renderInputHtml('textarea');
        echo Html::endTag('div');

        $html = ob_get_clean();

        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '{}' : Json::htmlEncode($this->clientOptions);
            $js = "editormd('$id', $options);";
            $view->registerJs($js);
        }

        return $html;
    }

}
