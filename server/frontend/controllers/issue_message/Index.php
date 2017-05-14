<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use Yii;

/**
 * Этот экшн для получения только сообщений по issue_id.
 * Для получения и issue и сообщений юзай /issues/<id>
 * Class Index
 * @package frontend\controllers\issue_message
 */
class Index extends RestAction
{
    public function run($issue_id)
    {
        return self::getIssueMessageService()->getAllByIssueId($issue_id);
    }
}
