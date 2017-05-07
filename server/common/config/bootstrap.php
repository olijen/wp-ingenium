<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

//Разрешение зависимостей

Yii::$container->setDefinitions([
    'customerService' => function () {
        $cr = new \common\domain\human\CustomerRepository();
        return new \frontend\application\CustomerService($cr);
    },
    'projectService' => function () {
        $pr = new \common\domain\project\ProjectRepository();
        return new \frontend\application\ProjectService($pr);
    },
    'issueService' => function () {
        $ir = new \common\domain\issue\IssueRepository();
        $pr = new \common\domain\project\ProjectRepository();
        return new \frontend\application\IssueService($ir, $pr);
    }
]);
