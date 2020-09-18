<div class="container-fluid">
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_meteran">
		<i class="fas fa-plus fa-sm"></i> Tambah Meteran </button>
    
    <?php
      date_default_timezone_set("Asia/Bangkok");
    ?>
    
    <table class="table table-bordered">
        <tr class="text-center">
            <th width="120">No Meteran</th>
            <th>Nama Pelanggan</th>
            <th width="200">Volume Air</th>
            <th>Tagihan</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        foreach ($pemakaian as $pakai) : ?>
            <tr class="text-center">
                <td><?php echo $pakai->no_meteran ?></td>
                <td><?php echo $pakai->nama ?></td>
                <td><?php echo $pakai->volume ?></td>
                <td>Rp. <?php echo number_format($pakai->nominal, 0, ',', '.'); ?></td>
				        <!-- <td><button class="btn btn-small btn-primary" data-toggle="modal" data-target="#edit_meteran<?php echo $pakai->no_meteran ;?>"><i class="fas fa-edit"></i></a></td> -->
                <td><a onclick="deleteConfirm('<?php echo site_url('c_admin/data_pemakaian/hapus/'.$pakai->no_meteran) ?>')"
											 href="#!" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach ?>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_meteran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH METERAN</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url().'c_admin/data_pemakaian/tambah' ?>" method="post"
					enctype="multipart/form-data">

					<div class="form-group">
						<label>No Meteran</label>
						<input type="text" name="no_meteran" id="no_meteran" class="form-control" required
						oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')"/>
					</div>
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<select class="form-control" name="id_pelanggan" id="id_pelanggan" required
						oninvalid="this.setCustomValidity('Silahkan pilih terlebih dahulu.')" oninput="setCustomValidity('')">
							<option value="">No Selected</option>
							<?php foreach($pelanggan as $row):?>
							<option value="<?php echo $row->id_pelanggan;?>"><?php echo $row->nama;?></option>
							<?php endforeach;?>
						</select>
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
    foreach ($pemakaian as $row) :
?>
<div class="modal fade" id="edit_meteran<?php echo $row->no_meteran ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT Meteran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'c_admin/data_pemakaian/edit' ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="no_meteran" class="form-control" value="<?php echo $row->no_meteran; ?>" 
								 readonly="readonly" />

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $row->nama; ?>" readonly="readonly" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Volume</label>
                <input type="number" name="volume" class="form-control" value="<?php echo $row->volume; ?>" required
                oninvalid="this.setCustomValidity('Field tidak boleh kosong!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
                <label>Nominal</label>
                <input type="number" name="nominal" class="form-control" value="<?php echo $row->nominal; ?>" required
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