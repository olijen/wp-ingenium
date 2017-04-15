<?php

namespace frontend\controllers\project;

use common\domain\project\ProjectRepository;
use frontend\application\ProjectService;
use frontend\components\RestAction;
use Yii;
use yii\base\Module;

class Index extends RestAction
{
    /**
     * @var ProjectService
     */
    protected $projectService;

    /*public function __construct($id, Module $module, array $config, ProjectService $projectService)
    {
        $this->projectService = $projectService;
        parent::__construct($id, $module, $config);
    }*/

    public function run()
    {
        //todo: DI
        $this->projectService = new ProjectService($this->getUser(), new ProjectRepository());
        return $this->projectService->getAll();
    }
}
