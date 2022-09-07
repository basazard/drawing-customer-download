<div class="modal-dialog">
      <div class="modal-content" style="height: 100%; margin-bottom: 30%;margin-top: 30%">
          <div class="modal-header">
            <h5 class="modal-title">Change Data Karyawan :</h5>
              <button class="close" data-dismiss="modal">&times;</button>
          </div>
        <div class="modal-body">
        <form method="post" action="formpost.php" autocomplete="off">
          <table width="100%">
            <input type="hidden" name="form" value="editkaryawan">
            <tr><td>NPK</td><td>:</td><td><input type="text" name="editnpk" id="editnpk" class="form-control my-1" placeholder="*NPK" readonly /></td></tr>
            <tr><td>Nama</td><td>:</td><td><input type="text" name="editnama" id="editnama" class="form-control my-1" placeholder="*Nama Lengkap"required /></td></tr>
            <tr><td>Dept.</td><td>:</td><td><input type="text" name="editdepartemen" id="editdepartemen" class="form-control my-1" placeholder="*Departemen"required /></td></tr>
            <tr><td>Pass.</td><td>:</td><td><input type="password" name="editpass" id="editpass" class="form-control my-1" placeholder="*Password" maxlength="8" required /></td></tr>
            <tr><td>Confirm.</td><td>:</td><td><input type="password" name="editpass1" id="editpass1" class="form-control my-1" placeholder="*Password Confirm" maxlength="8" required /> </td></tr>
          </table>
          <span id='message1'></span>
          <input class="col-sm-2 btn-sm btn-success ml-1" type="submit" value="Edit" style="float: right;" />
          <input class="col-sm-2 btn-sm btn-danger mx-1" type="button" data-dismiss="modal" value="Cancel" style="float: right;" />  
        </form>
      </div>
      </div>
    </div>