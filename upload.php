<?php 
include 'connect.php';
//$filename = $_GET['filename'];
$npk1  = $_POST['npk']; 
$nama1 = $_POST['nama'];
$dept1 = $_POST['departemen'];
$pass1 = $_POST['password'];
$customer = $_POST['customer'];
$model = $_POST['model'];
$upfor = $_POST['upfor'];
if ($npk1 !='' && $nama1 !='' && $dept1 !='' && $pass1 !=''){
	if ($dept1 == "Product Development"){
		$checkdata = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk ='$npk1' AND password='$pass1'");
		if(mysqli_num_rows($checkdata) !=0 ){
			$ekstensi_diperbolehkan	= array('xls', 'doc', 'xlsx', 'pdf', 'docx', 'ppt', 'pptx');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if(!file_exists('../files/'.$upfor.'/'.$nama)){
					if ($ukuran < 52428800) {	
						$query = mysqli_query($connect,"INSERT INTO file VALUES('', '$nama', '$upfor', '$customer', '$model',  '$nama1')");
						if($query){
							move_uploaded_file($file_tmp, '../files/'.$upfor.'/'.$nama);?>
							<script>alert("File Uploaded Successfully !");</script> <?php
						} else { ?> 
							<script>alert("File Upload Failed !");</script> <?php
						}
					} else { ?>
						<script>alert("File Size Too Large !");</script> <?php
					}
				} else { ?>
					<script>alert("The file already exists !");</script> <?php
				}
			} else {?> 
				<script>alert("File Extension Not Registered !");</script> <?php
			}
		} else if (mysqli_num_rows($checkdata) == 0){?>
			<script language="javascript">alert("Incorrect username and password !");</script> <?php
		}
	} else {?>
		<script>alert("You cannot upload files !");</script> <?php
	}
} ?>
<script>document.location.href='index.php';</script>

