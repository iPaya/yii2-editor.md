<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\EditorMD;


use yii\web\AssetBundle;

class EditorMDAsset extends AssetBundle
{
    public $sourcePath = '@bower/editor.md';
    public $css = [
        'css/editormd.css'
    ];
    public $js = [
        'editormd.js'
    ];
    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
        'except' => [
            '/docs',
            '/examples',
            '/scss',
            '/src',
            '/tests',
        ]
    ];
}
