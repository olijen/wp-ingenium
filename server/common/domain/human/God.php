<?php

/**
 * Бога смоделировал:
 * Олег Григрьев - olijen (olijenius@gmail.com)
 * 24 Апреля, 17:24
 *
 * Как и в вещественном мире, Бог был создан для решения
 * логического парадокса самозамыкающейся системы.
 * Но в моей системе он не будет просить объекты убивать другие объекты,
 * если они не из одного пространства имён или типа того...
 */

namespace common\domain\human;
use common\fixtures\User;

/**
 * Class God
 * Бог был назначен, как генеральный директор ingenium
 * Ему делегированы обязанности по созданию первых объектов в смоделированной системе
 * @package common\domain\human
 */
class God
{
    public function createHuman($name, $email, User $user)
    {
        return new Human($name, $email, $user);
    }

    public function createManager()
    {

    }

    public function createMaster()
    {

    }
}

class Jesus extends God
{
    public function makeWine($water)
    {
        return 'Wine';
    }
}
