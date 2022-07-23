<?php

// db model

class Model extends Database
{

    // allowed columns for db insert
    private function get_allowed_columns($data)
    {
        // if allowed columns are specified...
        if (!empty($this->allowed_columns)) {
            // remove values that are not in the array
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowed_columns)) {
                    unset($data[$key]);
                }
            }
            return $data;
        }
    }

    protected $table = "users"; //setup table var to avoid repetition. set default to 'user'

    // insert function
    public function insert($data)
    {
        // get clean array by selecting allowed columns
        $clean_array = $this->get_allowed_columns($data, $this->table);

        // get the keys from the clean array
        $keys = array_keys($clean_array);

        $query = "INSERT INTO $this->table";

        // implode is used to separate the keys where commas are present
        $query .= "(" . implode(",", $keys) . ") values ";
        $query .= "(:" . implode(",:", $keys) . ")"; // values have same name as table columns(keys)

        $db = new Database;
        $db->query($query, $clean_array);

    }

    // where function
    public function where($data, $limit = 10, $offset = 0)
    {
        $keys = array_keys($data);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key && ";
        }

        $query = trim($query, "&& ");

        // limit and offset needed for pagination
        $query .= " limit $limit offset $offset";

        $db = new Database;

        return $db->query($query, $data);
    }

    // get all data from table function
    public function getAll($limit = 10, $offset = 0)
    {

        $query = "SELECT * FROM $this->table limit $limit offset $offset";

        $db = new Database;

        return $db->query($query);
    }

    // get first item
    public function first($data)
    {
        $keys = array_keys($data);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key && ";
        }

        $query = trim($query, "&& ");

        $db = new Database;
        if ($res = $db->query($query, $data)) {
            return $res[0];
        }

        return false;
    }

    // update db row
    public function update($id, $data)
    {
        // get clean array by selecting allowed columns
        $clean_array = $this->get_allowed_columns($data, $this->table);

        // get the keys from the clean array
        $keys = array_keys($clean_array);

        $query = "UPDATE $this->table SET ";

        foreach ($keys as $column) {
            $query .= $column . "=:" . $column . ",";
        }

        $query = trim($query, ","); //remove the last comma

        $query .= " where id = :id";

        $clean_array['id'] = $id;
        $db = new Database;
        $db->query($query, $clean_array);

    }

    public function delete($id) {

        $query = "DELETE FROM $this->table WHERE id = :id limit 1";

        $clean_array['id'] = $id;
        $db = new Database;
        $db->query($query, $clean_array);
    }
}
