<?php

namespace frontend\application;


use common\domain\customer\CustomerRepository;
use common\domain\project\ProjectRepository;
use yii\web\IdentityInterface;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var IdentityInterface
     */
    private $identity;

    public function __construct(IdentityInterface $identity, ProjectRepository $projectRepository)
    {
        $this->identity = $identity;
        $this->projectRepository = $projectRepository;
    }

    public function getById()
    {

    }

    public function getAll()
    {
        $customer = (new CustomerRepository())
            ->fetchByIdentityId($this->identity->getId());
        return $this->projectRepository->fetchAllForCustomer($customer->id);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
