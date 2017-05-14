<?php

namespace common\domain\issue;

use common\components\Factory;
use common\components\ObjectConverter;
use common\domain\project\Project;

class IssueFactory extends Factory
{
    public static function create($issueData, Project $project)
    {
        return ObjectConverter::convert(array_merge($issueData, [
            'project_id' => $project->id
        ]), Issue::class);
    }

    /**
     * @param $projectId
     * @param $issueData
     * @return Issue
     */
    public static function createByProjectId($projectId, $issueData)
    {
        return ObjectConverter::convert(array_merge($issueData, [
            'project_id' => $projectId
        ]), Issue::class);
    }
}