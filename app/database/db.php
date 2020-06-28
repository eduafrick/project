<?php 

session_start();
require('connect.php');

#DECLARING LONG GLOBAL VARIABLE FOR EASY REFERENCE
$s = $_SESSION;

function dd($value) { // to be deleted
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQurey($sql, $data) {
global $conn;
 
    $stmt = $conn->prepare($sql);
    $value = array_values($data);
    $type = str_repeat('s', count($value));
   
    $stmt->bind_param($type, ...$value);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = []) {
    global $conn;

    $sql = "SELECT * FROM $table";

    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }   
    else {
        $i = 0;
        foreach ($conditions as $key=>$value)
        {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
    } 
    $stmt = executeQurey($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectOne($table, $conditions) {
    global $conn;
    
    $sql = "SELECT * FROM $table";

        $i = 0;
        foreach ($conditions as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executeQurey($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
    
}

function selectAny($table, $conditions = []){
    global $conn;
    $sql = "SELECT * FROM $table";

    if (count($conditions) === 1) {
        $i = 0;
        foreach($conditions as $key=>$value){
            if($i === 0){
                $sql = $sql . " WHERE $key= '$value'" . " LIMIT 1";
            }
            $i++;
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{  
        $i = 0;
        foreach($conditions as $key=>$value){
            if($i === 0){
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " OR $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $stmt = executeQurey($sql, $conditions);
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }
}

function create($table, $data){
    global $conn;

    $sql = "INSERT INTO " . "`" . $table . "` (";
    $i = 0;
    foreach($data as $key=>$value){
        if($i === 0){
            $sql = $sql . $key;
        }else {
            $sql = $sql . ", " . $key;
        }
        $i++;
    }
    $sql = $sql . ") VALUES (";
    $x = 0;
    foreach ($data as $key=>$value) {
        if($x === 0){
        $sql = $sql . "?";
        }else{
            $sql = $sql . ", ?";
        }
        $x++;
    }
    $sql = $sql . ")";
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function createi($table, $data) {
    global $conn;

    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;   
    }
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table, $id, $data) {
    global $conn;

    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach ($data as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;   
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function delete($table, $id) {
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    
    $stmt = executeQurey($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

function getPublishedpost() {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQurey($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPublishedpostAll() {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published<?";

    $stmt = executeQurey($sql, ['published' => 2]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPOstById($topic_id) {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

    $stmt = executeQurey($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function search($term) {
    global $conn;

    $match = '%' . $term . '%';
    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u 
            ON p.user_id=u.id WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ?";

    $stmt = executeQurey($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

?>