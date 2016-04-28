<?php
/**
 * User: anxu
 * Date: 16-4-4
 * Time: 上午1:01
 */

namespace anxu;

use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle
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
        'scripts/module.min.js',

    ];

}