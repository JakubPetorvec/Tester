<?php

namespace Repositories;

use DB\Connection;
use Entities\Test;
use SQLBuilders\TestSQLBuilder;
use Validators\TestValidator;

class TestRepository extends BaseRepository
{
    public static function getAll(object $entity) : array {
        return BaseRepository::getAll($entity);
    }

    public static function getAllById(object $entity, int $id): array {
        return BaseRepository::getAllById($entity, $id);
    }

    public static function insert($testData): int {
        return BaseRepository::insert($testData);
    }

    public static function delete(object $entity, int $id) : void {
        BaseRepository::delete($entity, $id);
    }
}
