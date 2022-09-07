<table id="report" width="100%" class="table table-striped table-bordered text-dark my-2" style="font-size: 10px">
  <thead class="thead-dark">
    <tr>
      <th width="3%">No</th>
      <th>Date</th>
      <th width="6%">NPK</th>
      <th>Name</th>
      <th width="20%">Dept.</th>
      <th width="7%">Model</th>
      <th>File</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nourut = 1;
    $query = mysqli_query($connect,"SELECT * FROM report ORDER BY id DESC");
    if (mysqli_num_rows($query)!=0){
        while ($data = mysqli_fetch_array($query)) {
        $date = $data['date'];
        $npk  = $data['npk'];
        $query1 = mysqli_query($connect,"SELECT * FROM karyawan WHERE npk = $npk");
        $data1  = mysqli_fetch_array($query1);
        $nama = $data1['nama'];
        $dept = $data1['departemen'];
        $model= $data['model'];
        $file = $data['file'];
        
        if ($npk <= 9){ $npk1 = '000'.$npk; }
        else if ($npk > 9 && $npk <= 99 ) { $npk1 = '00'.$npk; } 
        else if ($npk > 99 && $npk <= 999) { $npk1 = '0'.$npk; }
        else if ($npk > 999) {$npk1 = $npk;} ?>
        <tr>
          <td width="3%"><?php echo $nourut?></td>
          <td><?php echo $date ?></td>
          <td><?php echo $npk1 ?></td>
          <td><?php echo $nama ?></td>
          <td><?php echo $dept ?></td>
          <td><?php echo $model ?></td>
          <td><?php echo $file ?></td>
        </tr>
        <?php $nourut++;
        }
    } else {?>
      <tr><td colspan="7"><center>- No Report Found -</center></td></tr><?php
    }?>
  </tbody>
</table>