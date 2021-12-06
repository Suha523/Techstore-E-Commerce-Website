<?php

// include("app.php");
namespace Techstore\Classes;

abstract class DB{
    
    protected $conn;
    protected $table;

    public function connect(){
       $this->conn = mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }

    public function selectAll($fields="*"){
     $sql = "SELECT $fields FROM $this->table";
     $result=mysqli_query($this->conn, $sql);
     return mysqli_fetch_all($result,MYSQLI_ASSOC); 

    }

    public function selectId($id, $fields="*"){
        $sql = "SELECT $fields FROM $this->table WHERE id=$id";
        $result=mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);  // return row
    }

    public function selectWhere($cond, $fields="*"){
        $sql = "SELECT $fields FROM $this->table WHERE $cond";
        $result=mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result);  // return row
    }

    // public function selectJoin($cond, $fields="*"){
    //     $sql = "SELECT $fields FROM $this->table WHERE $cond";
    //     $result=mysqli_query($this->conn, $sql);
    //     return mysqli_fetch_all($result);  // return row
    // }

    public function getCount(){
        $sql = "SELECT count(*) AS cnt FROM $this->table";
        $result = mysqli_query($this->conn,$sql);
        return mysqli_fetch_assoc($result)['cnt'];
    }

    public function insert($fields, $values):bool{
        $sql="INSERT INTO $this->table ($fields) VALUES ($values)";
        return mysqli_query($this->conn, $sql);
    }

    public function insertAndGetId($fields, $values){
        $sql="INSERT INTO $this->table ($fields) VALUES ($values)";
        mysqli_query($this->conn, $sql);
        return mysqli_insert_id($this->conn);
    }

    public function update($set, $id):bool{
       $sql = "UPDATE $this->table SET $set WHERE id=$id";
       return mysqli_query($this->conn,$sql);
    }

    public function delete($id):bool{
        $sql="DELETE FROM $this->table WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}

?>