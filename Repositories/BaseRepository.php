<?php

namespace Repositories;

use DB\Connection;
use Tools\ReflectionSqlBuilder;

abstract class BaseRepository
{
    public static function getAll(object $entity): array {
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        return $connection->getAll($rSqlBuilder->buildGetAll());
    }

    public static function getAllById(object $entity, int $id): array {
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        return $connection->getAll($rSqlBuilder->buildGetAll($id));
    }

    public static function getAllBySelector(object $entity, array $selectors): array {
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        return $connection->getAll($rSqlBuilder->buildGetAllBySelector($selectors));
    }

    public static function insert(object $entity): int{
        print_r($entity);
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        return $connection->insert($rSqlBuilder->buildInsert());
    }

    public static function update(object $entity, int $id, array $selectors): void{
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        $connection->update($rSqlBuilder->buildUpdate($id, $selectors));
    }

    public static function delete(object $entity, int $id): void{
        $connection = new Connection();
        $rSqlBuilder = new ReflectionSqlBuilder($entity);
        $connection->connect();
        $connection->delete($rSqlBuilder->buildDelete($id));
    }
}
