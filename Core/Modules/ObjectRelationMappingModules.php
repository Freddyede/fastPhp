<?php

namespace Core\Modules;

use PDO;

class ObjectRelationMappingModules
{
    private static null|PDO|array $multipleDatabases = [];

    public static function getPdo(bool $activatedArray, ?array $multipleDatabases = NULL): array|null|PDO
    {

        require __DIR__ . '/../../bin/init/databases.php';
        if ($activatedArray) {
            for ($i = 0; $i < count($multipleDatabases); $i++) {
                if (
                    !empty($multipleDatabases[$i]['username']) &&
                    !empty($multipleDatabases[$i]['password']) &&
                    !empty($multipleDatabases[$i]['databases'])
                ) {
                    self::$multipleDatabases[$i][] = new PDO('mysql:host=localhost;dbname=' . $multipleDatabases[$i]['databases'], $multipleDatabases[$i]['username'], $multipleDatabases[$i]['password']);
                } else {
                    self::$multipleDatabases = NULL;
                }
            }
        } else {
            self::$multipleDatabases = new PDO('mysql:host=localhost;dbname=' . $multipleDatabases['databases'], $multipleDatabases['username'], $multipleDatabases['password']);
        }
        return self::$multipleDatabases;
    }
}