<?php

namespace backend\modules\integration;

/**
 * Модуль инкапсулирует интеграцию с внешними ресурсами
 * Slack, Freelancehunt, Asana, GoogleDrive, Bitbusket
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\integration\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
