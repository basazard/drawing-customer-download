<?php 
include 'connect.php';
$model = $_POST['model'];
$result = '';

if ($model == 'All'){
  $query  = mysqli_query($connect,"SELECT * FROM report ORDER BY id DESC");
} else if ($model != 'All'){
  $query  = mysqli_query($connect,"SELECT * FROM report WHERE model = '$model' ORDER BY id DESC");
}

$result .='
<table id="report" width="100%" class="table table-striped table-bordered text-dark my-2" style="font-size: 10px">
  <thead class="thead-dark">
    <tr>
      <th width="3%">No</th>
      <th>Date</th>
      <th>NPK</th>
      <th>Name</th>
      <th width="20%">Dept.</th>
      <th width="7%">Model</th>
      <th>File</th>
    </tr>
  </thead>
  <tbody>';

if (mysqli_num_rows($query) !=0 ){
	$nourut = 1;
	while ($data = mysqli_fetch_array($query)) {
        $date = $data['date'];
        $npk  = $data['npk'];
        $query1 = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk = $npk");
        $data1  = mysqli_fetch_array($query1);
        $nama = $data1['nama'];
        $dept = $data1['departemen'];
        $model= $data['model'];
        $file = $data['file'];
		$result .= '
        	<tr>
          		<td width="3%">'.$nourut.'</td>
          		<td>'.$date.'</td>
          		<td>'.$npk.'</td>
          		<td>'.$nama.'</td>
              <td>'.$dept.'</td>
          		<td>'.$model.'</td>
          		<td>'.$file.'</td>
        	</tr>';
        $nourut++;
	}

} else {
  $result .= '<tr><td colspan="7"><center>- No Report Found -</center></td></tr>';
}
$result .= '</tbody></table>';

echo $result;
?>