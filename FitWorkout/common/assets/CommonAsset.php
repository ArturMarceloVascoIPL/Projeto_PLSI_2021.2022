<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CommonAsset extends AssetBundle
{
    public $basePath = '@common';
    public $baseUrl = '@common'; 
    public $sourcePath = '@common/uploads/';
    public $css = [];
    public $js = [];
    public $depends = [];
}
