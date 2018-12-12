<div class="col-md-10">
	<label><b>Edit Pekerjaan</b></label><hr><br>
	<form action="<?php echo site_url('profil/pekerjaan_action') ?>" method="POST">
		<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Posisi</label>
	    <div class="col-sm-8">
	    	<input type="text" name="posisi" class="form-control" placeholder="Posisi pekerjaan" >
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Perusahaan / Organisasi</label>
	    <div class="col-sm-8">
		    <input type="text" name="perusahaan" class="form-control" placeholder="Perusahaan" >
		</div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Tahun Mulai</label>
	    <div class="col-sm-8">
		   <input type="number" name="mulai_tahun" class="form-control" placeholder="contoh: 2016" maxlength="4">
		 </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Tahun Selesai</label>
	    <div class="col-sm-8">
		    <input type="number" name="selesai_tahun" class="form-control" placeholder="contoh: 2018" maxlength="4">
		  </div>
  	</div>
      <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Saat ini saya bekerja di sini</label>
	    <div class="col-sm-8">
		    <select name="status" class="form-control">
			    <option value="1">Ya</option>
			    <option value="0">Tidak</option>
		    </select><br>
		    <input type="submit" class="btn btn-primary" value="simpan"></input>
		  </div>
	  </div>
	</form>
</div>