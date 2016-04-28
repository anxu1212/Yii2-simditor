<?php
/**
 * User: anxu
 * Date: 16-3-29
 * Time: 下午10:44
 */

namespace  anxu;

use yii\web\AssetBundle;


class CoreAsset extends AssetBundle
{

    /**
     * [$sourcePath description]
     * @var string
     */
    public $sourcePath = __DIR__.'/assets';

    public $uploader = false;

    /**
     * [$css description]
     * @var array
     */
    public $css = [
        'styles/simditor.css',
    ];

    /**
     * [$js description]
     * @var array
     */
    public $js = [
        'scripts/simditor.js',

    ];

    /**
     * [$depends description]
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'anxu\ModuleAsset',
        'anxu\HotkeysAsset'
    ];
    
    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {

        if($this->uploader){
            $this->depends[] = 'anxu\UploaderAsset';
        }

        parent::registerAssetFiles($view);
    }

}