<?php include 'connect.php'; ?>
<div class="row mx-2" style="height: 450px;">
          <div class="col-md-6">
            <span style="padding-bottom: 10px;">File Uploaded :</span>
            <div style="overflow-y: auto; height: 350px;">
            <table width="100%" class="table table-sm table-hover text-dark my-2" style="border-bottom:1px solid grey; ">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Model</th>
                  <th>For</th>
                  <th style="width: 20%;">Uploader</th>
                  <th style="width: 15%;">Action</th>
                </tr>
              <?php
              $no=0;
              $query = mysqli_query($connect,"SELECT * FROM file ORDER BY id DESC"); 
              if (mysqli_num_rows($query) != 0){
                while($data = mysqli_fetch_array($query)){
                $no++;?>
                <tr>
                  <td width="5%" style="vertical-align: middle;"><?=$no?></td>
                  <td style="vertical-align: middle;"><?php echo $data['namafile']; ?></td>
                  <td style="vertical-align: middle;"><?php echo $data['model']; ?></td>
                  <td style="vertical-align: middle;"><?php echo $data['file_for']; ?></td>
                  <td style="vertical-align: middle;"><?php echo $data['uploader']; ?></td>
                  <td style="text-align: left;"><button type="button" value="<?=$data['namafile']?>:<?=$data['file_for']?>" id="btndelete" data-toggle="modal" data-target="#modal_delete" class="btn-sm btn-danger">Delete</button></td>
                </tr>
                <?php 
                } 
              } else {?> <tr><td><center> No File Uploaded !</center></td></tr> <?php } ?>
              </tbody>
            </table>
            </div>
            <div class="row my-2 mx-0 d-flex justify-content-between">
              <button type="button" id="btnupload" data-toggle="modal" data-target="#modal_upload" class="btn-sm btn-success" />Upload a New File</button>
              <a type="button" id="btnmassupload" class="btn-sm btn-success" href="mass_upload"/>Mass Upload</a>
            </div>
          </div>

          <div class="col-md-6">
            <h8 style="padding-bottom: 10px;">Customer Drawing Report :</h8>
            <div class="row mx-0"><span class="mr-2 mb-0">Model : </span>
              <form method="POST" action="reportexport.php">
              <select type="select" name="modelshow" id="modelshow">
                <option value="All" selected> All </option>
                  <?php
                    $query = mysqli_query($connect,"SELECT model FROM model");
                    while ($data = mysqli_fetch_array($query)) {
                      $model = $data['model'];
                      echo "<option value='$model'> $model </option>";
                      }?>
              </select>
                <button type="submit" name="export" id="export" class="btn-sm btn-primary">Export</button>
              </form>
            </div>
            <div id="report_tabel" style="overflow-y: auto; height: 375px;">
              <?php require 'reporttable.php'; ?>
            </div>
          </div>
        </div>