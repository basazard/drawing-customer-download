<div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
      	<h8 class="modal-title">Delete File</h8>
      	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
      	<div class="modal-body">
		<form method="post" action="delete.php" id="form_upload" onsubmit="return confirm('Delete File ?')" class="text-sm-dark" autocomplete="off">
			<input type="hidden" name="action">	  	
		    <table style="font-size: 12px">
		    	<tr><td width="10%">File</td><td> : </td>
		    		<td colspan="4"><input type="text" name="file" id="file" class="form-control input-sm" required readonly /></td></tr>
		    	<tr><td width="10%">File For</td><td> : </td>
		    		<td colspan="4"><input type="text" id="file_for" name="file_for" class="form-control input-sm" required readonly /></td></tr>
		    	<tr><td width="10%">NPK</td><td> : </td>
		    		<td><input type="text" name="npk" id="npk" class="form-control input-sm" placeholder="*NPK" maxlength="4" required /></td>
		    		<td width="10%">Name</td><td> : </td>
		    		<td><input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="*Nama Lengkap" required readonly /></td></tr>
		    	<tr><td width="10%">Pass.</td><td> : </td>
		    		<td><input type="password" name="password" id="password" class="form-control input-sm" placeholder="*Password (8 digit)" maxlength="8" required /></td>
		    		<td width="10%">Depart.</td><td> : </td>
		    		<td><input type="text" name="departemen" id="departemen" class="form-control input-lg" placeholder="*Departemen" required readonly /></td>		    		</tr>
		    </table>
		    <div class="row justify-content-end mx-0 my-2">
		  	<input class="col-sm-2 btn btn-sm btn-success ml-1" type="submit" name="submit" id="log_login" value="Ok" />
		  	<input class="col-sm-2 btn btn-sm btn-danger mx-1" type="reset" name="reset" id="log_reset" value="Reset" />
		    </div>
		</form>
		</div>
    </div>
</div>