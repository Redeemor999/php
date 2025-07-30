<?php

namespace App\Model;

use \Core\DB;

class Crud
{
    public function __construct(protected DB $db) {}

    public function showAll(string $table, int $userId)
    {
        return $this->db->query("SELECT * FROM $table WHERE user_id= :userId", [
            'userId' => $userId
        ]);
    }

    public function show(string $table, array $data, int $userId)
    {
        $col = key($data);
        [$key, $val] = $data[$col];
        
        return $this->db->queryOne("SELECT $col FROM $table WHERE $key=:$key AND user_id= :userId", [
            $key => $val,
            'userId' => $userId
        ])[$col];
    }

    /**
     * Storing data in mydb:
     *
     * @param array $data
     * $data['TABLE_NAME'] = ['KEY AS PLACEHOLDERS AND RESULT AS VALUES']
     */
    public function store(array $data)
    {
        $table = key($data);
        $cols = implode(',', array_keys($data[$table]));
        $placeHolders = array_keys($data[$table]);
        $result = implode(',', array_map(fn($k) => ':' . $k, $placeHolders));

        return $this->db->query("INSERT INTO $table ($cols) VALUES ($result)", $data[$table]);
    }

    public function destroy(array $data)
    {
        $table = key($data);
        $col = key($data[$table]);
        
        return $this->db->query("DELETE FROM $table WHERE $col =:$col", $data[$table]);
    }

    public function update()
    {

    }
}