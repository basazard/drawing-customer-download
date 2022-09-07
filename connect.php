<?php
	$connect = mysqli_connect("localhost", "root", "", "drawing")
	or die ("Gagal koneksi ke server".mysqli_connect_error());

/*	
// cek koneksi
if (mysqli_connect_errno())
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}*/

	if(!isset($_SESSION)){
    session_start();
}

?>