<?php

namespace common\domain\project;

interface IProjectRepository
{
    public function fetchAllForCustomer();
    public function fetchByIdForCustomer($id);
    public function detectByIdForCustomer($id);

    public function save(Project $project);
    public function removeById($projectId);
}
