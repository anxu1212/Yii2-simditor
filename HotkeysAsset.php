<?php
/**
 * User: anxu
 * Date: 16-4-4
 * Time: 上午1:01
 */

namespace anxu\Yii2Simditor;

use yii\web\AssetBundle;

class HotkeysAsset extends AssetBundle
{
    /**
     * [$sourcePath description]
     * @var string
     */
    public $sourcePath = __DIR__.'/assets';


    /**
     * [$js description]
     * @var array
     */
    public $js = [
        'scripts/hotkeys.min.js',
    ];

}