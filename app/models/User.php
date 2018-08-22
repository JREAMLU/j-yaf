<?php

class UserModel extends _MysqlModel {

    public function focus() {
        $sql = <<<SQL
SELECT id,name FROM focus WHERE id = :id
SQL;

        $bind = [
            ':id' => '1',
        ];

        return $this->db->query($sql, $bind);
    }
}
