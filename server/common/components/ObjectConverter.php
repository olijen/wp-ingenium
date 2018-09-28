<?php

namespace common\components;

use Exception;

/**
 * Class ObjectConverter Преобразует данные в бизнес объекты
 * @package common\components
 */
class ObjectConverter
{
    /**
     * Преобразует данные в сущность или коллекцию сущностей
     * @param mixed $row
     * @param string $className
     * @return DomainModel|DomainModel[]
     * @throws Exception
     */
    public static function convert(array $row, $className)
    {
        if (!empty($row))
            return (isset($row[0]) && is_array($row[0]))
                ? self::convertDataArray($row, $className)
                : self::convertData($row, $className);
        return [];
    }

    /**
     * @param array $data
     * @param DomainModel $instance
     * @return void
     * @throws Exception
     */
    public static function loadDataToObject(array $data, DomainModel $instance)
    {
        $className = get_class($instance);
        foreach ($data as $field => $value) {
            if (!property_exists($instance, $field)) {
                throw new Exception("Класс $className не содержит поля/сеттера $field");
            }
            $instance->$field = $data[$field];
        }
    }
    
//----------------------------------------------------------------------------------------------------------------------

    /**
     * Преобразует данные
     * @param array $arrayData
     * @param string $className
     * @return DomainModel[] domain
     * @throws Exception
     */
    private static function convertDataArray(array $arrayData, $className)
    {
        foreach ($arrayData as &$row) {
            $row = self::convertData($row, $className);
        }

        return $arrayData;
    }

    /**
     * Загружает данные в доменный объект
     * Учитывает аргументы конструктора
     * @param array $data
     * @param string $className
     * @return DomainModel
     * @throws Exception
     */
    private static function convertData(array $data, $className)
    {
        $instance = self::createInstance($className, $data);

        self::loadDataToObject($data, $instance);

        return $instance;
    }

    /**
     * Выбирает параметры для конструктора из массива всех полей
     * Удаляет из массива полей свойства для конструктора, т.к. они уже будут загружены в класс и не нужны больше
     * @param $className
     * @param array $data
     * @return DomainModel
     * @throws Exception
     */
    private static function createInstance($className, array &$data)
    {
        $parameters = (new \ReflectionMethod($className, '__construct'))->getParameters();

        $arguments = [];
        foreach ($parameters as $parameter) {
            if (!isset($data[$parameter->name])) {
                throw new Exception("Ошибка при конвертации $className (свойство для конструктора '$parameter->name' не передано с \$data)");
            }
            $arguments[$parameter->name] = $data[$parameter->name];
            unset($data[$parameter->name]);
        }

        $instance = (new \ReflectionClass($className))->newInstanceArgs($arguments);
        if (!$instance instanceof DomainModel) {
            throw new Exception("$className не является наследником BusinessObject");
        }
        return $instance;
    }
}
