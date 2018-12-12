<div class="col-md-10">
	<label><b>Edit Pendidikan</b></label><hr><br>
	<form action="<?php echo site_url('profil/pendidikan_action') ?>" method="POST">
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Sekolah</label>
		    <div class="col-sm-8">
		    	<input type="text" class="form-control" name="sekolah" placeholder="Posisi pekerjaan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jurusan</label>
		    <div class="col-sm-8">
		    	<input type="text" name="konsen" class="form-control" placeholder="Jurusan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jurusan Sekunder</label>
		    <div class="col-sm-8">
		    	<input type="text" name="konsen_kedua" class="form-control" placeholder="Jurusan Sekunder">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Jenis Gelar Akademik</label>
		    <div class="col-sm-8">
		    	<input type="text" name="gelar" class="form-control" placeholder="Gelar">
		    </div>
		  </div>
    	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Tahun Selesai</label>
		    <div class="col-sm-8">
			    <select name="tahun_lulus" class="form-control">
			    	<option value="2018">2018</option>
			    	<option value="2017">2017</option>
			    	<option value="2016">2016</option>
			    	<option value="2015">2015</option>
			    	<option value="2014">2014</option>
			    	<option value="2013">2013</option>
			    	<option value="2012">2012</option>
			    	<option value="2010">2010</option>
			    	<option value="2009">2009</option>
			    	<option value="2008">2008</option>
			    	<option value="2007">2007</option>
			    	<option value="2006">2006</option>
			    </select><br>
			    <input type="submit" class="btn btn-primary" value="simpan"></input>
			</div>
		</div>
	</form>
</div>