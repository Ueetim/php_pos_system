<!-- for db connections -->

<?php

class Database {

    // connect to db
    private function db_connect() {
        $DBHOST = "localhost";
        $DBNAME = "pos_db";
        $DBUSER = "root";
        $DBPASS = "";
        $DBDRIVER = "mysql";

        // check for errors
        try {
            $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS); //PDO makes it easier to switch btw dbases (unlike mysqli)
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $con;
    }

    // db queries --- todo: study more on PDO
    public function query($query, $data=array()) {
        $con = $this->db_connect();
        $smt = $con->prepare($query);
        $check = $smt->execute($data);

        if($check) {
            $result = $smt->fetchAll(PDO::FETCH_ASSOC); //get all the results as an associative array

            // if the result is a non-empty array...
            if(is_array($result) && count($result) > 0) {
                return $result;
            }
        }
        return false;
    }
}