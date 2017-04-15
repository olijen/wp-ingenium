<?php

namespace frontend\application;

use common\models\AccountRecord;
use Yii;
use common\models\MasterRecord;
use frontend\models\user\Master;
use frontend\models\values\Phone;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class MasterService
{

    static function getAllMasters()
    {
        return MasterRecord::find()->all();
    }

    static function save(Master $master)
    {
        $masterRecord = new MasterRecord;
        $masterRecord->name = $master->name;
        return $masterRecord;
    }

    static function create(/*MasterRecord $masterRecord, PhoneRecord $phoneRecord*/)
    {
        $account = new AccountRecord;
        //$account->load(Yii::$app->getRequest()->getBodyParams()['account']);
        $account->setAttributes(Yii::$app->getRequest()->getBodyParams()['account']);
        if (!$account->save() && $account->hasErrors()) {
            return $account;
        } elseif (!$account->id) {
            throw new ServerErrorHttpException('Failed to create the account for unknown reason.');
        }

        $model = new MasterRecord();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        $model->account_id = $account->id;
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the master for unknown reason.');
        }

        return $model;
    }
}