<?php

class UserModel {

    public function focus() {
        $sql = <<<SQL
SELECT id,name FROM focus WHERE id = :id
SQL;

        $bind = [
            ':id' => '1',
        ];

        return Mysql::instance()->query($sql, $bind);
    }
}
