<div class="row justify-content-center pt-3">
	<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Selamat datang!</h4><hr>
  <p>Untuk menggunakan layanan Quoara Bisnis, pastikan anda mengisi detail tentang bisnis anda.</p>
</div>

  <div class="col-md-8">
  	<div class="card">
		  <div class="card-header">
		    Detail Bisnis
		  </div>
		  <div class="card-body">
		    <form action="store_detail_member" method="POST">
		    	<h4>Informasi Bisnis</h4><hr>
		    	<input type="text" name="id_member_bisnis" value="<?php echo $this->session->userdata('id'); ?>" hidden="hidden">
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Nama</label>
				    <div class="col-sm-10">
				      <input type="text" name="nama_bisnis" class="form-control" placeholder="contoh: Wesbite Selling" required="required">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
				    <div class="col-sm-10">
				      <textarea name="alamat_bisnis" class="form-control" rows="3" placeholder="contoh: Jl. Sukarno Hatta, Malang, Jawa Timur, 54623" required="required"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Telepon</label>
				    <div class="col-sm-10">
				      <input type="number" name="telepon_bisnis" class="form-control" placeholder="(optional)">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Tax</label>
				    <div class="col-sm-10">
				      <input type="text" name="tax_id_bisnis" class="form-control" placeholder="(optional)">
				    </div>
				  </div>
				  <h4>Informasi Tambahan</h4><hr>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Website</label>
				    <div class="col-sm-10">
				      <input type="text" name="website" class="form-control" placeholder="contoh: http://www.quora.com">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Kategori Industri</label>
				    <div class="col-sm-10">
					    <select name="industri_kategori" class="form-control">
					      <option>1</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
					  </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Informasi Bisnis</label>
				    <div class="col-sm-10">
				      <textarea name="deskripsi_bisnis" class="form-control" rows="3" placeholder="contoh: bisnis untuk menjual webiste"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Kontak</label>
				    <div class="col-sm-10">
				      <input name="cp_bisnis" type="text" class="form-control" placeholder="contoh: 083323971283">
				    </div>
				  </div>
				  <!-- <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Logo Bisnis</label>
				    <div class="col-sm-10">
					    <input type="file" name="logo" class="form-control-file">
					  </div>
				  </div> -->
				  <div class="text-center">
				  	<input type="submit" class="btn btn-primary btn-md btn-block" value="simpan"></input>
				  </div><br>
				  <button type="Reset" class="btn btn-outline-danger" >Reset</button>
				</form>
		  </div>
		</div>
	</div>
</div>