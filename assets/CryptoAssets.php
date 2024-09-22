<?php

namespace app\modules\control\modules\cmsModulePasswords\assets;

use yii\web\AssetBundle;

class CryptoAssets extends AssetBundle
{
    public $sourcePath = '@control/modules/cmsModulePasswords/web';

    public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $js = [
        'js/aes.js'
    ];
}
