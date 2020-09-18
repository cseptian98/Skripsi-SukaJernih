<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_pelanggan">
  <i class="fas fa-plus fa-sm"></i> Tambah Pelanggan</button>

    <?php
      date_default_timezone_set("Asia/Bangkok");
    ?>

    <table class="table table-bordered"> 
        <tr class="text-center">
            <th>No</th>
            <th width="300">ID PELANGGAN</th>
            <th width="300">NAMA</th>
            <th width="100">ALAMAT</td>
            <th width="200">NOMOR TELEPON</th>
            <th colspan="2">ACTION</th>
        </tr>

        <?php
        $no=1;
        foreach ($pelanggan as $plg) : ?>
            <tr class="text-center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $plg->id_pelanggan ?></td>
                <td><?php echo $plg->nama ?></td>
                <td><?php echo $plg->alamat ?></td>
                <td><?php echo $plg->no_telp ?></td>
                <td><button class="btn btn-small btn-primary" data-toggle="modal" data-target="#edit_pelanggan<?php echo $plg->id_pelanggan ;?>"><i class="fas fa-edit"></i></a></td>
                <td><a onclick="deleteConfirm('<?php echo site_url('c_admin/data_pelanggan/hapus/'.$plg->id_pelanggan) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach ?>

</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH PELANGGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_admin/data_pelanggan/tambah' ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_pelanggan" class="form-control" 
            value="PLG-<?php echo date("YmdHis"); ?>" readonly="readonly" />

            <input type="hidden" name="id_petugas" class="form-control"
						value="<?php echo $this->session->userdata('id_petugas');?>" readonly="readonly" />

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_plg" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_plg" class="form-control" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="telp" class="form-control" required
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
    foreach ($pelanggan as $plg) :
?>
<div class="modal fade" id="edit_pelanggan<?php echo $plg->id_pelanggan ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT PELANGGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_admin/data_pelanggan/edit' ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_pelanggan" class="form-control" value="<?php echo $plg->id_pelanggan; ?>" 
								 readonly="readonly" />

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_plg" class="form-control" value="<?php echo $plg->nama; ?>" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_plg" class="form-control" value="<?php echo $plg->alamat; ?>" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="telp" class="form-control" value="<?php echo $plg->no_telp; ?>" required
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
