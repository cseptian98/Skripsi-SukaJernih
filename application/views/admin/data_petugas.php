<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_petugas">
  <i class="fas fa-plus fa-sm"></i> Tambah Petugas</button>

    <table class="table table-bordered">
        
        <tr class="text-center">
            <th>No</th>
            <th width="300">Username</th>
            <th width="300">Nama Petugas</th>
            <th width="200">Nomor Telepon</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        $no=1;
        foreach ($petugas as $ptg) : ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ptg->username ?></td>
                <td><?php echo $ptg->nama_petugas ?></td>
                <td><?php echo $ptg->no_telp ?></td>
                <td><button class="btn btn-small btn-primary" data-toggle="modal" data-target="#edit_petugas<?php echo $ptg->id_petugas ;?>"><i class="fas fa-edit"></i></a></td>
                <td><a onclick="deleteConfirm('<?php echo site_url('c_admin/dashboard_admin/hapus/'.$ptg->id_petugas) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach ?>

</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_petugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH PETUGAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_admin/dashboard_admin/tambah' ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_petugas" class="form-control" value="PTG-<?php echo date("YmdHis"); ?>" 
								 readonly="readonly" />

            <input type="hidden" name="id_admin" class="form-control" value="<?php echo $this->session->userdata('username')?>" 
								 readonly="readonly" />

            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="username" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required data-toggle="password"
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Masukan Ulang Password</label>
                <input type="password" name="confirm_password" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="no_telp" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php 
    foreach ($petugas as $ptg) :
?>
<div class="modal fade" id="edit_petugas<?php echo $ptg->id_petugas ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT PETUGAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_admin/dashboard_admin/edit' ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $ptg->id_petugas; ?>" 
								 readonly="readonly" />
            
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $ptg->username; ?>" readonly required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" value="<?php echo $ptg->nama_petugas; ?>" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Masukan Ulang Password</label>
                <input type="password" name="confirm_password" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="no_telp" class="form-control" value="<?php echo $ptg->no_telp; ?>" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach ?>
<?php $this->load->view("/partials/modal.php") ?>
<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>
