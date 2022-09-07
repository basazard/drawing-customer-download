<?php include 'connect.php'; ?>
<div class="row mx-0">
  <div class="col-md-4">
    <div class="row" style="width: 100%">
      <div class="col"><span>List Karyawan : </span></div>
      <div class="col">
        <button class="btn btn-sm" style="float: right; color: black" onclick="addkaryawan()"><i class="fas fa-plus-square"></i> New</button>
      </div>
    </div>
    <div style="overflow-y: auto; height: 425px">
      <table class="table table-striped table-hover">
        <?php 
        $no = 0;
        $query = mysqli_query($connect,"SELECT * FROM karyawan");
        while($data = mysqli_fetch_array($query)){ 
          $npk  = $data['npk'];
          $nama = $data['nama'];
          $no++;
          if ($npk <= 9){ $npk1 = '000'.$npk; }
          else if ($npk > 9 && $npk <= 99 ) { $npk1 = '00'.$npk; } 
          else if ($npk > 99 && $npk <= 999) { $npk1 = '0'.$npk; }
          else if ($npk > 999) {$npk1 = $npk;} ?>
          <tr>
            <td style="text-align: center;"><b><?=$no?></b></td>
            <td style="text-align: right;"><?=$npk1?></td>
            <td><?=$nama?></td>
            <td width="3%"><button class="btn btn-sm" onclick="editkaryawan('<?=$npk?>','<?=$nama?>')"><i class="fas fa-edit"></i></button></td>
            <td width="3%"><button class="btn btn-sm" onclick="deletekaryawan('<?=$npk?>','<?=$nama?>')"><i class="fas fa-times"></i></button></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <div class="col-md-4">
    <div class="row mx-0" style="width: 100%">
      <div class="col px-0"><span>List Model : </span></div>
      <div class="col">
        <button class="btn btn-sm" style="float: right; color: black" onclick="addmodel()"><i class="fas fa-plus-square"></i> New</button>
      </div>
    </div>
    <div style="overflow-y: auto; height: 425px">
      <table class="table table-striped table-hover">
        <?php 
        $no = 0;
        $query = mysqli_query($connect,"SELECT * FROM model");
        while($data = mysqli_fetch_array($query)){ 
          $no++;?>
          <tr>
            <td style="text-align: center;"><b><?=$no?></b></td>
            <td><?=$data['model']?></td>
            <td width="3%"><button class="btn btn-sm" onclick="deletemodel('<?=$data['model']?>')"><i class="fas fa-times"></i></button></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <div class="col-md-4">
    <div class="row mx-0" style="width: 100%">
      <div class="col px-0"><span>List Customer : </span></div>
      <div class="col">
        <button class="btn btn-sm" style="float: right; color: black" onclick="addcustomer()"><i class="fas fa-plus-square"></i> New</button>
      </div>
    </div>
    <div style="overflow-y: auto; height: 425px">
      <table class="table table-striped table-hover">
        <?php 
        $no = 0;
        $query = mysqli_query($connect,"SELECT * FROM customer");
        while($data = mysqli_fetch_array($query)){ 
          $no++;?>
          <tr>
            <td style="text-align: center;"><b><?=$no?></b></td>
            <td><?=$data['customer']?></td>
            <td width="3%"><button class="btn btn-sm" onclick="deletecustomer('<?=$data['customer']?>')"><i class="fas fa-times"></i></button></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>