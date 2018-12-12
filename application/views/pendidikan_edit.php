<div class="col-md-10">
	<label><b>Edit Pendidikan</b></label><hr><br>
	<form action="<?php echo site_url('profil/pendidikan_action') ?>" method="POST">
		<?php foreach ($pendidikan as $key): ?>
			<div class="form-group row">
		    <label class="col-sm-2 col-form-label">Sekolah</label>
		    <div class="col-sm-8">
		    	<input type="text" class="form-control" name="sekolah" placeholder="Posisi pekerjaan" value="<?php echo $key['sekolah']?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jurusan</label>
		    <div class="col-sm-8">
		    	<input type="text" name="konsen" class="form-control" placeholder="Jurusan" value="<?php echo $key['konsen']?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jurusan Sekunder</label>
		    <div class="col-sm-8">
		    	<input type="text" name="konsen_kedua" class="form-control" placeholder="Jurusan Sekunder" value="<?php echo $key['konsen_kedua']?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jenis Gelar Akademik</label>
		    <div class="col-sm-8">
		    	<input type="text" name="gelar" class="form-control" placeholder="Gelar" value="<?php echo $key['gelar']?>">
		    </div>
		  </div>
    	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Tahun Selesai</label>
		    <div class="col-sm-8">
			   <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun lulus" maxlength="4" value="<?php echo $key['tahun_lulus']?>"><br>
			    <input type="submit" class="btn btn-primary" value="simpan"></input>
			</div>
		</div>
		<?php endforeach ?>
	</form>
</div>