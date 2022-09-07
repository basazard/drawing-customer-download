<?php 
include 'connect.php';
$form = $_POST['form'];

if ($form == 'addkaryawan') {
	$newnpk  = $_POST['newnpk'];
	$newnama = $_POST['newnama'];
	$newdept = $_POST['newdepartemen'];
	$pass	 = $_POST['newpass'];
	$pass1	 = $_POST['newpass1'];
	if($pass == $pass1){
		$add = mysqli_query($connect,"INSERT INTO karyawan (npk, nama, departemen, password) VALUES ('$newnpk', '$newnama', '$newdept' ,'$pass')");
		if($add){?> <script>alert('New Data Added Successfully !')</script> <?php }
	} else {?> <script>alert('Password Not Match !')</script> <?php }
}

if ($form == 'editkaryawan') {
	$editnpk  = $_POST['editnpk'];
	$editnama = $_POST['editnama'];
	$editdept = $_POST['editdepartemen'];
	$editpass = $_POST['editpass'];
	$editpass1= $_POST['editpass1'];
	if($editpass == $editpass1){
		$edit = mysqli_query($connect,"UPDATE karyawan SET nama = '$editnama', departemen = '$editdept', password = '$editpass' WHERE npk = '$editnpk'");
		if($edit){?> <script>alert('Data has been changed successfully !')</script> <?php }
	} else {?> <script>alert('Password Not Match !')</script> <?php }
}

if ($form == 'deletekaryawan') {
	$delnpk  = $_POST['npk'];
	$delnama = $_POST['nama'];
	$del = mysqli_query($connect,"DELETE FROM karyawan WHERE npk = '$delnpk' OR nama = '$delnama'");
}

if ($form == 'addmodel'){
	$newmodel = $_POST['newmodel'];
	$add = mysqli_query($connect,"INSERT INTO model (model) VALUES ('$newmodel')");
	if($add){?> <script>alert('New Model Added Successfully !')</script> <?php }
}

if ($form == 'deletemodel'){
	$model = $_POST['model'];
	$del = mysqli_query($connect,"DELETE FROM model WHERE model = '$model'");
}

if ($form == 'addcustomer'){
	$newcustomer = $_POST['newcustomer'];
	$add = mysqli_query($connect,"INSERT INTO customer (customer) VALUES ('$newcustomer')");
	if($add){?> <script>alert('New Customer Added Successfully !')</script> <?php }
}

if ($form == 'deletecustomer'){
	$customer = $_POST['customer'];
	$del = mysqli_query($connect,"DELETE FROM customer WHERE customer = '$customer'");
}
?>
<script>window.location.href='index.php';</script>
