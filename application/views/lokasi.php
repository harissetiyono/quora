<div class="col-md-10">
	<label><b>Edit Lokasi</b></label><hr><br>
	<form action="<?php echo site_url('profil/lokasi_action') ?>" method="POST">
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">lokasi</label>
		    <div class="col-sm-8">
		    	<input type="text" class="form-control" name="lokasi" placeholder="Posisi pekerjaan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Tahun Mulai</label>
		    <div class="col-sm-8">
		    	<select name="mulai_tahun" class="form-control">
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
		    </select>
		  </div>
		  </div>
		  <div class="form-group row">
		    <label class="col-sm-2 col-form-label">Tahun Selesai</label>
		    <div class="col-sm-8">
			    <select name="sampai_tahun" class="form-control">
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
	  <div class="modal-footer">
	    
		</div>
	</form>
</div>