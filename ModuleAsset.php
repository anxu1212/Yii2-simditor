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
    public $sourcePath = '@vendor/bower/simple-module';


    /**
     * [$js description]
     * @var array
     */
    public $js = [
        'lib/module.js',

    ];

}