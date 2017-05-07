<?php

namespace frontend\application;

interface IProjectService
{
    public function getById($id);
    public function getAll();
    public function create(array $projectData);
    public function updateById($projectId, array $projectData);
    public function deleteById($projectId);
}
