<?php 
include 'connect.php';
//$filename = $_GET['filename'];
include 'connect.php';
$npk  = $_POST['npk']; 
$nama = $_POST['nama'];
$dept = $_POST['departemen'];
$pass = $_POST['password'];
$file = $_POST['file'];
$file_for = $_POST['file_for'];
// var_dump($file_for);
// die;
if ($npk !='' && $nama !='' && $dept !='' && $pass !='' && $file !=''){
	if ($dept == "Product Development"){
		$query = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk ='$npk' AND password='$pass'");
		if(mysqli_num_rows($query) !=0 ){
			if ($file != ''){
				$deletefile = mysqli_query($connect,"DELETE FROM file WHERE namafile = '$file'");
				unlink("../files/$file_for/$file");
				if ($deletefile){?>
					<script>alert("File deleted successfully")</script><?php
				} else {?> 
					<script>alert("The file failed to delete !")</script><?php 
				}
			} 		
		} else if (mysqli_num_rows($query) == 0){?>
			<script language="javascript">alert("Incorrect username and password !");</script><?php
		}
	} else {?>
		<script>alert("You cannot delete files !");</script> <?php
	}
}?>
<script>document.location.href='index.php';</script>
