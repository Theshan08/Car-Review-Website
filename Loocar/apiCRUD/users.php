<?php
class User{
// dbection
private $db;
// Table
private $db_table = "users";
// Columns
public $id;
public $name;
public $email;
public $password;
public $created;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getUsers(){
$sqlQuery = "SELECT id, name, email, password, created FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createUser(){
// sanitize
$this->name=htmlspecialchars(strip_tags($this->name));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->created=htmlspecialchars(strip_tags($this->created));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET name = '".$this->name."',
email = '".$this->email."',
password = '".$this->password."',created = '".$this->created."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleUser(){
$sqlQuery = "SELECT id, name, email, password, created FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->name = $dataRow['name'];
$this->email = $dataRow['email'];
$this->password = $dataRow['password'];
$this->created = $dataRow['created'];
}

// UPDATE
public function updateUser(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->created=htmlspecialchars(strip_tags($this->created));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
email = '".$this->email."',
password = '".$this->password."',created = '".$this->created."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteUser(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>