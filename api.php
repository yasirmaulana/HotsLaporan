<?php

$conn = new mysqli("localhost", "root", " ", " ");
if($conn->connect_error){
  die("Could not connect to database!");
}

// include_once '../../includes/connectionJson.inc';

$res = array('error' => false);

$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

// MENAMPILKAN DATA ADMIN
if($action == 'readAdmin'){
  $result = $conn->query("SELECT * FROM hots_admin WHERE status = 1 ORDER BY nama");
  $admins = array();

  while($row = $result->fetch_assoc()){
    array_push($admins, $row);
  }

  $res['admins'] = $admins;
}

// MENAMPILKAN DATA GRUP
if($action == 'readGrup'){

  $id_admin = $_POST['id_admin'];

  $result = $conn->query("SELECT * FROM view_hots_grup WHERE id_admin = '$id_admin' ORDER BY nomor_grup");
  $groups = array();

  while($row = $result->fetch_assoc()){
    array_push($groups, $row);
  }

  $res['groups'] = $groups;
}

// MENAMPILKAN DATA FASIL
// if($action == 'readFasil'){
//   $result = $conn->query("SELECT * FROM hots_fasil WHERE status = 1 ORDER BY nama");
//   $fasils = array();

//   while($row = $result->fetch_assoc()){
//     array_push($fasils, $row);
//   }

//   $res['fasils'] = $fasils;
// }



$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();

// include_once '../../includes/connectionJson_close.inc';
