<?php

/**
 * User: anxu
 * Date: 16-3-29
 * Time: 下午10:27
 */

namespace anxu\Yii2Simditor;

use Yii;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\base\Widget;


class Yii2Simditor extends Widget
{

    public $options = [];


    /**
     * @var array clientOptions the HTML attributes for the widget container tag.
     */
    public $clientOptions = [

    ];

    public $defaultImage ='img/image.png';

    public $toolbarSet = [
        'toolbarFloat ' => false,
        'toolbarHidden' => false, //Can not work together with toolbarFloat.
        'toolbarFloatOffset' => 0,
        'toolbar' =>true
//        'toolbar' =>[
//            'title',
//            'bold',
//            'italic',
//            'underline',
//            'strikethrough',
//            'fontScale',
//            'color',
//            '|',
//            'ol',
//            'ul',
//            'blockquote',
//            'code',
//            'table',
//            '|',
//            'link',
//            'image',
//            'hr',
//            '|',
//            'indent',
//            'outdent',
//            'alignment'
//        ]
    ];
    /**
     * internal marker for the name of the plugin
     * @var string
     */
    private $_pluginName = 'simditor';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        //checks for the element id
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        parent::init();
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::beginTag('div') . "\n";
        echo Html::textarea($this->_pluginName, '', ['autofocus' => true, 'id' => $this->options['id']]);
        echo Html::endTag('div') . "\n";

        $this->registerPlugin();
    }


    /**
     * Registers the FullCalendar javascript assets and builds the requiered js  for the widget and the related events
     */
    protected function registerPlugin()
    {

        /** @var \yii\web\AssetBundle $assetClass */
        $assets = CoreAsset::register($this->view);

        if (isset($this->options['uploader'])) {
            $assets->uploader = $this->options['uploader'];
        }

        $cleanOptions = $this->getClientOptions();

        $js = "var editor=new Simditor($cleanOptions);";

        $this->view->registerJs($js, View::POS_READY);
    }

    /**
     * @return array the options for the text field
     */
    protected function getClientOptions()
    {
        $id = $this->options['id'];
        $options['textarea'] = new JsExpression("$('#{$id}')");
        $options['defaultImage'] = $this->defaultImage;

        $options = array_merge($options, $this->toolbarSet);
        return Json::encode($options);
    }

}