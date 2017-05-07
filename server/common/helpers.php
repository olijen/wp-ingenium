<?php
/**
 * @return \yii\console\Application|\yii\web\Application
 */
function app() {
    return Yii::$app;
}

/**
 * @return \yii\di\Container
 */
function container() {
    return Yii::$container;
}

/**
 * @return mixed|\yii\web\User
 */
function user() {
    return app()->user;
}

/**
 * @return null|\yii\web\IdentityInterface
 */
function identity()
{
    return user()->identity;
}

/**
 * @return int|string
 * @throws Exception
 */
function userId()
{
    if (null !== ($identity = identity())) {
        return $identity->getId();
    }
    throw new Exception('Запрашивается id пользователя гостем. Поправь доступы контроллера!');
}

/**
 * Возвращает сервис из контейнера зависимостей
 * @param $name
 * @return object
 * @throws \yii\base\InvalidConfigException
 */
function service($name)
{
    return container()->get($name . 'Service');
}

//--- Logs and dumps

/**
 * @param $var
 */
function dump($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

/**
 * @param $var
 */
function dumpExit($var)
{
    dump($var);
    exit;
}