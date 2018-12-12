<div class="col-md-10">
	<label><b>Edit Lokasi</b></label><hr><br>
	<form action="<?php echo site_url('profil/lokasi_action') ?>" method="POST">
		<?php foreach ($lokasi as $key): ?>
			<div class="form-group row">
		    <label class="col-sm-2 col-form-label">lokasi</label>
		    <div class="col-sm-8">
		    	<input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="<?php echo $key['lokasi'] ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Tahun Mulai</label>
		    <div class="col-sm-8">
		    	<input type="number" class="form-control" name="mulai_tahun" placeholder="" maxlength="4" value="<?php echo $key['mulai_tahun'] ?>">
		  	</div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Tahun Selesai</label>
		    <div class="col-sm-8">
			    <input type="number" class="form-control" name="sampai_tahun" placeholder="" maxlength="4" value="<?php echo $key['sampai_tahun'] ?>"><br>
			    <input type="submit" class="btn btn-primary" value="simpan"></input>
			  </div>
	  	</div>
		  <div class="modal-footer">
		    
		</div>
		<?php endforeach ?>
	</form>
</div>