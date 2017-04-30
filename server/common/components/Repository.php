<?php

namespace common\components;

use Yii;
use Exception;
use yii\base\Component;

/**
 * Class Repository - моделирует хранилище.
 * -Сохранение бизнес-объекта в хранилище
 * -Восстановление бизнес-объекта из хранилища
 * @package common\components
 */
abstract class Repository extends Component
{
    /**
     * @return string - имя таблицы в базе данных
     */
    abstract protected function getTable();

    /**
     * @param array $fields
     * @return bool|int id
     * @throws Exception
     */
    protected function insert(array $fields)
    {
        $result = Yii::$app->db
            ->createCommand()
            ->insert($this->getTable(), $fields)
            ->execute();

        return (boolval($result)) ? $result : false;
    }

    /**
     * @param array $fields
     * @param $condition
     * @return bool
     * @throws Exception
     */
    protected function update(array $fields, $condition)
    {
        $result = Yii::$app->db
            ->createCommand()
            ->update($this->getTable(), $fields, $condition)
            ->execute();

        return boolval($result);
    }

    /**
     * @param $id
     * @return int
     * @throws Exception
     */
    protected function deleteById($id)
    {
        $result = Yii::$app->db
            ->createCommand()
            ->delete($this->getTable(), ['id' => $id])
            ->execute();

        return boolval($result);
    }
}
