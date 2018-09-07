<?php

$conn = new mysqli("localhost", "root", "", "");
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

// MENYIMPAN DATA LAPORAN
if($action == 'simpanLaporan'){

  $id_admin = $_POST['id_admin'];
  $id_grup = $_POST['id_grup'];
  $memberAktiv = $_POST['memberAktiv'];
  $memberPasif = $_POST['memberPasif'];
  $statusGrup = $_POST['statusGrup'];

  $result = $conn->query("INSERT INTO hots_laporan_group(id_admin, id_grup, memberAktiv, memberPasif, statusGrup) VALUES ('$id_admin', '$id_grup', '$memberAktiv', '$memberPasif', '$statusGrup')");

  $cek = "INSERT INTO hots_laporan_group(id_grup, memberAktiv, memberPasif, statusGrup) VALUES ('$id_admin', '$id_grup', '$memberAktiv', '$memberPasif', '$statusGrup')";

  if($result){
    $res['message'] = "laporan berhasil tersimpan";
  } else {
    $res['error'] = $cek;
  }

  $res['persons'] = $result; 

}



$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();

// include_once '../../includes/connectionJson_close.inc';
