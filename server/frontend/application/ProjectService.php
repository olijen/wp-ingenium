<?php

namespace frontend\application;

use common\domain\project\ProjectRepository;
use common\domain\project\ProjectFactory;
use common\components\ObjectConverter;

use Yii;

class ProjectService implements IProjectService
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $pr)
    {
        $this->projectRepository = $pr;
    }

    public function getById($id)
    {
        return $this->projectRepository->fetchByIdForCustomer($id);
    }

    public function getAll()
    {
        return $this->projectRepository->fetchAllForCustomer();
    }

    public function create(array $projectData)
    {
        $project = ProjectFactory::create($projectData);
        return $this->projectRepository->save($project);
    }

    public function updateById($projectId, array $projectData)
    {
        $project = $this->projectRepository->fetchByIdForCustomer($projectId);
        ObjectConverter::loadDataToObject($projectData, $project);
        return $this->projectRepository->save($project);
    }

    public function deleteById($projectId)
    {
       if ($this->projectRepository->detectByIdForCustomer($projectId)) {
           $this->projectRepository->removeById($projectId);
       }
    }
}
