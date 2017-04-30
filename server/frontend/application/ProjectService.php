<?php

namespace frontend\application;

use common\domain\project\ProjectRepository;
use common\domain\human\CustomerRepository;
use common\domain\project\ProjectFactory;
use common\domain\project\Project;
use common\components\ObjectConverter;

use Yii;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct()
    {
        $this->projectRepository = new ProjectRepository();
        $this->customerRepository = new CustomerRepository();
    }

    public function getById($id)
    {
        return $this->projectRepository->fetchById($id);
    }

    public function getAll()
    {
        $customer = $this->customerRepository->fetchById(Yii::$app->user->identity->getId());
        return $this->projectRepository->fetchAllForCustomer($customer);
    }
    
    public function create($projectData)
    {
        $customer = $this->customerRepository->fetchById(Yii::$app->user->identity->getId());
        $project = ProjectFactory::create($projectData, $customer);
        return $this->projectRepository->save($project);
    }

    public function updateById($projectId, $projectData)
    {
        $customer = $this->customerRepository->fetchById(Yii::$app->user->identity->getId());
        $project = $this->projectRepository->fetchOneForCustomer($customer, ['id' => $projectId]);
        ObjectConverter::loadDataToObject($projectData, $project);
        return is_bool($this->projectRepository->save($project));
    }

    public function deleteById($projectId)
    {
        $customer = $this->customerRepository->fetchById(Yii::$app->user->identity->getId());
        $project = $this->projectRepository->fetchOneForCustomer($customer, ['id' => $projectId]);
        $this->projectRepository->delete($project);
    }
}
