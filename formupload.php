<div class="modal-dialog modal-fullscreen">
	<div class="modal-content">
		<div class="modal-header">
			<h8 class="modal-title">Upload a New File</h8>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form method="post" action="upload.php" id="form_upload" onsubmit="return confirm('Upload File ?')" class="text-sm-dark" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="action">
				<table style="font-size: 12px">
					<tr>
						<td width="10%">NPK</td>
						<td> : </td>
						<td><input type="text" name="npk" id="npk1" class="form-control input-sm" placeholder="*NPK" maxlength="4" required /></td>
						<td width="10%">Name</td>
						<td> : </td>
						<td><input type="text" name="nama" id="nama1" class="form-control input-sm" placeholder="*Nama Lengkap" required readonly /></td>
					</tr>
					<tr>
						<td width="10%">Pass.</td>
						<td> : </td>
						<td><input type="password" name="password" id="password" class="form-control input-sm" placeholder="*Password (8 digit)" maxlength="8" required /></td>
						<td width="10%">Depart.</td>
						<td> : </td>
						<td><input type="text" name="departemen" id="departemen1" class="form-control input-lg" placeholder="*Departemen" required readonly /></td>
					</tr>
					<tr>
						<td width="10%">File</td>
						<td> : </td>
						<td colspan="4"><input type="file" name="file" required></td>
					</tr>
					<tr>
						<td width="10%">Customer</td>
						<td> : </td>
						<td colspan="4">
							<select type="select" name="customer" id="customer" class="form-control" required>
								<option value="" disabled selected>- Select Customer -</option>
								<?php
								$query = mysqli_query($connect, "SELECT customer FROM customer");
								while ($data = mysqli_fetch_array($query)) {
									$customer = $data['customer'];
									echo "
		                    <option value='$customer'> $customer </option>
		                    ";
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="10%">Model</td>
						<td> : </td>
						<td colspan="4">
							<select type="select" name="model" id="model" class="form-control" required>
								<option value="" disabled selected>- Select Model -</option>
								<?php
								$query = mysqli_query($connect, "SELECT model FROM model");
								while ($data = mysqli_fetch_array($query)) {
									$model = $data['model'];
									echo "
		                    <option value='$model'> $model </option>
		                    ";
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="10%">Upload for</td>
						<td> : </td>
						<td colspan="4">
							<select type="select" name="upfor" id="upfor" class="form-control" required>
								<option value="" disabled selected>- Select For -</option>
								<option value="Product Development">Product Development</option>
								<option value="Quality Assurance">Quality Assurance</option>
								<option value="Quality Control">Quality Control</option>
								<option value="Engineering">Engineering</option>
								<option value="Project Management">Project Management</option>
							</select>
						</td>
					</tr>
				</table>
				<div class="row justify-content-end mx-0 my-2">
					<input class="col-sm-2 btn btn-sm btn-success ml-1" type="submit" name="submit" id="log_login" value="Ok" />
					<input class="col-sm-2 btn btn-sm btn-danger mx-1" type="reset" name="reset" id="log_reset" value="Reset" />
				</div>
			</form>
		</div>
	</div>
</div>