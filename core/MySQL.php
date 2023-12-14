<?php
namespace Saphpi\Core;

class MySQL {
    private static ?\mysqli $db;

    public function __construct(
        string $host,
        string $port,
        string $username,
        string $password,
        string $schema
    ) {
        mysqli_report(MYSQLI_REPORT_ERROR);

        self::$db = new \mysqli($host, $username, $password, $schema, $port);
        if (self::$db->connect_errno) {
            throw new \RuntimeException('MySQLi connection error: ' . self::$db->connect_error);
        }
    }

    public static function db(): ?\mysqli {
        return self::$db;
    }
}
