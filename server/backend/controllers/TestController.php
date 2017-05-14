<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Тут transaction script для тестирования рабочего процесса. Переписать и раскидать по слоям.
 * Class TestController
 * @package backend\controllers
 */
class TestController extends Controller
{
    public function actionMessage()
    {
        $post = $_POST['message'];
        $text = $post['text'];
        $issue = $post['issue'];

        //insert into issue_message(user_id, issue_id, text)
        //values ($text, $issue)
        //service->addMessage() ... repository->
    }

    public function actionEstimate()
    {
        $data = $_POST['estimate'];
        $price = $data['price'];
        $deadline = $data['deadline'];
        
        //update issue set stage=x, master_price=$price, master_deadline=$deadline
        //service->estimate() ... repository->
    }
}
