<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-7-30
 * Time: 下午8:29
 * @see http://xdsoft.net/jqplugins/datetimepicker/
 */

namespace common\widgets;
use Yii;
use yii\helpers\Json;
//use yii\widgets\InputWidget;
use yii\jui\InputWidget;
use yii\helpers\Html;

class DateTimePicker extends InputWidget
{
    /**
     * @var string the locale ID (eg 'fr', 'de') for the language to be used by the date picker.
     * If this property is empty, then the current application language will be used.
     */
    public $language;
    /**
     * @var boolean If true, shows the widget as an inline calendar and the input as a hidden field.
     */
    public $inline = false;
    /**
     * @var array the HTML attributes for the container tag. This is only used when [[inline]] is true.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $containerOptions = [];

    /**
     * 默认设置
     * @var array
     */
    private $_defaultsetting = [
        'lang'=>'ch',//中文
        'timepicker'=>false,//不选择时间
        'format'=>'Y-m-d',//格式
        'closeOnDateSelect'=>true,//选择完日期关闭插件
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->inline && !isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = $this->options['id'] . '-container';
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo $this->renderWidget() . "\n";
        $containerID = $this->inline ? $this->containerOptions['id'] : $this->options['id'];

        $view = $this->getView();
        $options = Json::encode(array_merge($this->_defaultsetting,$this->clientOptions));
        $view->registerJs("jQuery('#{$containerID}').datetimepicker($options);");
        $this->clientOptions = false; // the datepicker js widget is already registered
        $this->registerWidget('datetimepicker', DateTimePickerAsset::className(), $containerID);
    }

    /**
     * Renders the DatePicker widget.
     * @return string the rendering result.
     */
    protected function renderWidget()
    {
        $contents = [];

        if ($this->inline === false) {
            if ($this->hasModel()) {
                $contents[] = Html::activeTextInput($this->model, $this->attribute, $this->options);
            } else {
                $contents[] = Html::textInput($this->name, $this->value, $this->options);
            }
        } else {
            if ($this->hasModel()) {
                $contents[] = Html::activeHiddenInput($this->model, $this->attribute, $this->options);
                $this->clientOptions['defaultDate'] = $this->model->{$this->attribute};
            } else {
                $contents[] = Html::hiddenInput($this->name, $this->value, $this->options);
                $this->clientOptions['defaultDate'] = $this->value;
            }
            $this->clientOptions['altField'] = '#' . $this->options['id'];
            $contents[] = Html::tag('div', null, $this->containerOptions);
        }

        return implode("\n", $contents);
    }
} 