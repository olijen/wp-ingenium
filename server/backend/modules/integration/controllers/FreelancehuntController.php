<?php

namespace backend\modules\integration\controllers;

use yii\web\Controller;

class FreelancehuntController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetThreads()
    {
        $api_token = 'sokokirivok'; // ваш идентификатор
        $api_secret = 'dd68dd49e398008be491c684584c0b135049372f'; // ваш секретный ключ

        function sign($api_secret, $url, $method, $post_params = '') {
            return base64_encode(hash_hmac("sha256", $url.$method.$post_params, $api_secret, true));
        }

        $url = "https://api.freelancehunt.com/threads";
        $method = "GET";
        $signature = sign($api_secret, $url, $method); // реализацию функции смотрите выше

        $curl = curl_init();
        curl_setopt_array($curl, [
            //CURLOPT_HEADER       => 1, // позволяет просмотреть заголовки ответа сервера при необходимости отладки
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERPWD        => $api_token . ":" . $signature,
            CURLOPT_URL            => $url
        ]);

        $threads = json_decode(curl_exec($curl), true);
        dump($threads);
        curl_close($curl);

        return $this->render('threads', [
            'threads' => $threads,
        ]);
    }

    public function actionPostMessageToThread($thread_id)
    {
        $api_token = 'sokokirivok'; // ваш идентификатор
        $api_secret = 'dd68dd49e398008be491c684584c0b135049372f'; // ваш секретный ключ

        function sign($api_secret, $url, $method, $post_params = '') {
            return base64_encode(hash_hmac("sha256", $url.$method.$post_params, $api_secret, true));
        }

        $url = "https://api.freelancehunt.com/threads/$thread_id";
        $method = "POST";
        $params = json_encode([
            'message'   => "Тестовое сообщение от WP-ingenium.com"
        ]);

        $signature = sign($api_secret, $url, $method, $params);

        $curl = curl_init();
        curl_setopt_array($curl, [
            //CURLOPT_HEADER       => 1, // позволяет просмотреть заголовки ответа сервера при необходимости отладки
            CURLOPT_HTTPHEADER     => [ 'Content-Type: application/json', 'Content-Length: ' . strlen($params)],
            CURLOPT_USERPWD        => $api_token . ":" . $signature,
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $params,
        ]);

        $result = curl_exec($curl);
        var_dump($result);

    }
}
