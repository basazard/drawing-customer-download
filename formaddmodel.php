<div class="modal-dialog">
    <div class="modal-content" style="height: 100%; margin-top: 30%; margin-bottom: 30%">
        <div class="modal-header">
          <h5 class="modal-title">Masukan Model baru ke system BOM :</h5>
            <button class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
      <form method="post" action="formpost.php" autocomplete="off">
        <table width="100%">
        <input type="hidden" name="form" value="addmodel">
        <tr><td>Model</td><td>:</td><td><input type="text" name="newmodel" id="newmodel" class="form-control my-1" placeholder="*New Model"required /></td></tr>
        </table>
        <input class="col-sm-2 btn-sm btn-success ml-1" type="submit" value="Add" style="float: right;" />
        <input class="col-sm-2 btn-sm btn-danger mx-1" type="button" data-dismiss="modal" value="Cancel" style="float: right;" />  
      </form>
    </div>
    </div>
  </div>  