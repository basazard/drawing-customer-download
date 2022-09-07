<?php
include 'connect.php';
$npk = $_POST['npk'];
if ($npk != ''){
	$query = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk='$npk'") or die (mysqli_connect_error());
	if (mysqli_num_rows($query)!=0){
		$karyawan = mysqli_fetch_array($query);
		$data = array(
		'nama' => $karyawan['nama'],
		'dept' => $karyawan['departemen'],);
	} else {
		$data = array(
		'nama' => 'NPK is not registered',
		'dept' => 'NPK is not registered',);
	}
} else {$data='';}
echo json_encode($data);
//echo $nama;
//echo $dept;
?>