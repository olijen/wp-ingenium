<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;

use frontend\components\RestAction;
use Yii;
use yii\web\Controller;

class Index extends RestAction
{
    public function __construct($id, Controller $controller, array $config, ProjectService $projectService)
    {
        parent::__construct($id, $controller, $config);
        $this->projectService = $projectService;
    }

    public function run()
    {
        return (new ProjectService())->getAll();
    }
}
