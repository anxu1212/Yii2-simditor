## Install

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require  anxu/yii2-simditor "*"
```

or add

```json
"anxu/yii2-simditor": "*"
```

to the require section of your `composer.json` file.


## Usage

#### Like a widget ####

```php
echo \anxu\Yii2Simditor::widget([
    'toolbarSet'=>[
        'toolbarHidden'=>false,
        'toolbar'=>[//default true
            'title',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'fontScale'
        ]
    ]
]);
```

#### Like an ActiveForm widget ####

```php
use anxu\Yii2Simditor;
echo  $form->field($model, 'content')->widget(Yii2Simditor::classname(),[
    'toolbarSet'=>[
        'toolbarHidden'=>false,
        'toolbar'=>[//default true
            'title',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'fontScale'
        ]
    ]
]);
```
For other options, refer to this website
[http://simditor.tower.im/](http://simditor.tower.im/)
