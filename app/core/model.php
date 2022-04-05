<!-- contains db table-related classes -->

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
    public function where($data)
    {
        $keys = array_keys($data);

        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key && ";
        }

        $query = trim($query, "&& ");

        $db = new Database;

        return $db->query($query, $data);
    }
}