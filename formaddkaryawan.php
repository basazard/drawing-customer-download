<div class="modal-dialog">
    <div class="modal-content" style="height: 100%; margin-top: 30%; margin-bottom: 30%">
        <div class="modal-header">
          <h5 class="modal-title">Masukan data baru ke system BOM :</h5>
            <button class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
      <form method="post" action="formpost.php" autocomplete="off">
        <table width="100%">
        <input type="hidden" name="form" value="addkaryawan">
        <tr><td>NPK</td><td>:</td><td><input type="text" name="newnpk" id="newnpk" class="form-control my-1" placeholder="*NPK" maxlength="4" required style="width: 50%" /></td></tr>
        <tr><td>Nama</td><td>:</td><td><input type="text" name="newnama" id="newnama" class="form-control my-1" placeholder="*Name"required /></td></tr>
        <tr><td>Dept.</td><td>:</td><td><input type="text" name="newdepartemen" id="newdepartemen" class="form-control my-1" placeholder="*Departemen"required /></td></tr>
        <tr><td>Pass.</td><td>:</td><td><input type="password" name="newpass" id="newpass" class="form-control my-1" placeholder="*Password" maxlength="8" required /></td></tr>
        <tr><td>Confirm.</td><td>:</td><td><input type="password" name="newpass1" id="newpass1" class="form-control my-1" placeholder="*Password Confirm" maxlength="8" required /> </td></tr>
        </table>
        <span id='message'></span>
        <input class="col-sm-2 btn-sm btn-success ml-1" type="submit" value="Add" style="float: right;" />
        <input class="col-sm-2 btn-sm btn-danger mx-1" type="button" data-dismiss="modal" value="Cancel" style="float: right;" />  
      </form>
    </div>
    </div>
  </div>  