<?php

namespace frontend\application;
/**
 * Class ServiceTrait - возвращает сервисы из контейнера зависимостей
 * @package frontend\application
 */
trait ServiceTrait
{
    /**
     * @return CustomerService
     */
    public static function getCustomerService()
    {
        return service('customer');
    }

    /**
     * @return MasterService
     */
    public static function getMasterService()
    {
        return service('master');
    }

    /**
     * @return ProjectService
     */
    public static function getProjectService()
    {
        return service('project');
    }

    /**
     * @return IssueService
     */
    public static function getIssueService()
    {
        return service('issue');
    }
}
