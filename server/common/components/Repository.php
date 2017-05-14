<?php

namespace common\components;

use Yii;
use Exception;
use yii\base\Component;
use yii\db\Query;

/**
 * Class Repository - моделирует хранилище.
 * -Сохранение бизнес-объекта в хранилище
 * -Восстановление бизнес-объекта из хранилища
 * -Для проверки доступа загружает цепочку зависимостей вплоть до human
 * @package common\components
 */
abstract class Repository extends Component implements IRepository
{
    /**
     * @var Query
     */
    protected $query;
    
    public function __construct()
    {
        parent::__construct([]);
        $this->query = new Query();
    }

    /**
     * Возвращает имя таблицы репозитория. По умолчанию - по имени класса без постфикса.
     * Перегрузить, если имя класса не поддерживает семантику "<Table name>Repository"
     * @return string
     */
    protected function getTableName()
    {
        $className = explode('\\', get_class($this));
        $className = $className[count($className)-1];
        return (strtolower(str_replace('Repository', '', $className)));
    }

    /**
     * @param array $fields
     * @return bool|int id
     * @throws Exception
     */
    protected function insert(array $fields, $table = null)
    {
        $table = $table ? $table : $this->getTableName();
        $result = Yii::$app->db
            ->createCommand()
            ->insert($table, $fields)
            ->execute();

        return (boolval($result)) ? $result : false;
    }

    /**
     * @param array $fields
     * @param mixed $condition
     * @param string $table
     * @return bool
     * @throws Exception
     */
    protected function update(array $fields, $condition, $table = null)
    {
        $table = $table ? $table : $this->getTableName();
        $result = Yii::$app->db
            ->createCommand()
            ->update($table, $fields, $condition)
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
            ->delete($this->getTableName(), ['id' => $id])
            ->execute();

        return boolval($result);
    }
}
