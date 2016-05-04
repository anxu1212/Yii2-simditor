<?php

/**
 * User: anxu
 * Date: 16-3-29
 * Time: 下午10:27
 */

namespace anxu;

use Yii;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\base\Widget;
use yii\base\Model;
use yii\base\InvalidConfigException;


class Yii2Simditor extends Widget
{

    /**
     * @var Model the data model that this widget is associated with.
     */
    public $model;
    /**
     * @var string the model attribute that this widget is associated with.
     */
    public $attribute;
    /**
     * @var string the input name. This must be set if [[model]] and [[attribute]] are not set.
     */
    public $name;
    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];




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

        if ($this->name === null && !$this->hasModel()) {
            throw new InvalidConfigException("Either 'name', or 'model' and 'attribute' properties must be specified.");
        }
        //checks for the element id
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
        parent::init();
    }

    /**
     * @return boolean whether this widget is associated with a data model.
     */
    protected function hasModel()
    {
        return $this->model instanceof Model && $this->attribute !== null;
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::beginTag('div') . "\n";
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, '',$this->options);
        }
        echo Html::endTag('div') . "\n";

        $this->registerPlugin();
    }


    /**
     * Registers the javascript assets and builds the requiered js  for the widget and the related events
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