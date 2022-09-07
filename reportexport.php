<?php
include 'connect.php';
$model = $_POST['modelshow'];
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Bom Download ($model).xls");

if ($model == 'All'){
	$query  = mysqli_query($connect,"SELECT * FROM report ORDER BY id DESC");
} else if ($model != 'All'){
	$query  = mysqli_query($connect,"SELECT * FROM report WHERE model = '$model' ORDER BY id DESC");
}?>

<p><center><b style="font-size: 24px">Report BOM Download (<?=$model?>)</b></center></p>
<table width="100%" border="1px">
	<thead class="thead-dark">
	    <tr>
	    	<th width="3%">No</th>
	    	<th>Date</th>
	    	<th>NPK</th>
	    	<th>Name</th>
	    	<th>Dept.</th>
	    	<th>Model</th>
	    	<th>File</th>
	    </tr>
	</thead> 
	<tbody>
	 <?php
	if (mysqli_num_rows($query) !=0){
	$nourut = 1;
	while ($data = mysqli_fetch_array($query)) {
        $date = $data['date'];
        $npk  = $data['npk'];
        $query1 = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk = $npk");
        $data1  = mysqli_fetch_array($query1);
        $nama = $data1['nama'];
        $dept = $data1['departemen'];
        $model= $data['model'];
        $file = $data['file'];?>
        <tr>
        	<td width="3%"><?=$nourut ?></td>
        	<td><?=$date ?></td>
        	<td><?=$npk ?></td>
        	<td><?=$nama ?></td>
        	<td><?=$dept ?></td>
        	<td><?=$model ?></td>
        	<td><?=$file ?></td>
        </tr>
        <?php $nourut++ ?>
	<?php }
	} else { ?>
		<tr><td colspan="7"><center>- No Report Found -</center></td></tr><?php
	} ?>
	</tbody>
</table>