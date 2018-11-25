<div class="row">
  <div class="colsm-2">
    <img src="<?php echo base_url('assets/images/profil/5.png') ?>" class="rounded-circle" style="width:140px">
	</div>
	<dir class="col">
		<h3><?php echo $this->session->userdata('nama'); ?></h3>
	</dir>
  <div class="col-sm-4">
  	<h4>Kredensial & Sorotan</h4><hr>
  	<?php foreach ($profil as $key): ?>
  		<?php if ($key['id_pekerjaan'] == null): ?>
  			<button type="button" class="btn btn-link" id="pekerjaan" data-toggle="modal" data-target="#pekerjaan_modal"><i class="fa fa-shopping-bag"></i> Tambahkan kredensial pekerjaan</button>
  		<?php else: ?>

  		<?php endif ?>

  		<?php if ($key['id_pendidikan'] == null): ?>
  			<button type="button" class="btn btn-link" id="pendidikan" data-toggle="modal" data-target="#pendidikan_modal"><i class="fa fa-shopping-bag"></i> Tambahkan kredensial pendidikan</button>
  		<?php else: ?>
  			
  		<?php endif ?>

  		<?php if ($key['id_lokasi'] == null): ?>
  			<button type="button" class="btn btn-link" id="lokasi" data-toggle="modal" data-target="#lokasi_modal"><i class="fa fa-shopping-bag"></i> Tambahkan kredensial lokasi</button>
  		<?php else: ?>
  			
  		<?php endif ?>

		<?php endforeach ?>
	</div>
</div>
<hr>
<dir class="row">
	<div class="col-md-2">
		<ul>
			<a href="<?php echo site_url('profil') ?>"><li>Pertanyaan</li></a>
			<a href="<?php echo site_url('profil/jawaban') ?>"><li>Jawaban</li></a>
			<a href="<?php echo site_url('') ?>"><li>Pengikut</li></a>
			<a href="<?php echo site_url('') ?>"><li>Mengikuti</li></a>
		</ul>
	</div>
	<!-- <dir class="col"> -->
		<?php foreach ($pengikut as $key): ?>
			<br>
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			  	<?php if ($key['foto'] == null): ?>
			  		<img src="<?php echo base_url('assets/images/profil/default.png') ?>" style="border-radius: 50%; width:30px; height: 30px;">
			  	<?php else: ?>
			  		<img src="<?php echo base_url('assets/images/profil/'.$key['foto']) ?>" style="border-radius: 50%; width:30px; height: 30px;">
			  	<?php endif ?>
			  	
			    <small> <?php echo $key['nama']; ?></small><br><br>
			    <a href="#" class="btn btn-primary btn-sm">Followed</a>
			  </div>
			</div>
		<?php endforeach ?>
	<!-- </div> -->
</dir>


<div class="modal fade" id="pekerjaan_modal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    	<form action="<?php echo site_url('pertanyaan/tambah_pertanyaan') ?>" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Posisi</label>
				    <input type="text" name="posisi" class="form-control" placeholder="Posisi pekerjaan">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Perusahaan/Organisasi</label>
				    <input type="text" name="perusahaan" class="form-control" placeholder="Perusahaan">
				  </div>
				  <div class="form-group">
				    <label>Tahun Mulai</label>
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
				  <div class="form-group">
				    <label>Tahun Selesai</label>
				    <select name="selesai_tahun" class="form-control">
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
		      <div class="form-group">
				    <label for="exampleInputEmail1">Saat ini saya bekerja di sini</label>
				    <select name="status" class="form-control">
				    	<option value="1">Ya</option>
				    	<option value="0">Tidak</option>
				    </select>
				  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" value="Tambahkan pertanyaan"></input>
      	</div>
	    </form>
    </div>
  </div>
</div>


<!-- form Pendidikan -->

<div class="modal fade" id="pendidikan_modal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    	<form action="<?php echo site_url('pertanyaan/tambah_pertanyaan') ?>" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Sekolah</label>
				    <input type="text" class="form-control" name="sekolah" placeholder="Posisi pekerjaan">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Jurusan</label>
				    <input type="text" name="konsen" class="form-control" placeholder="Jurusan">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Jurusan Sekunder</label>
				    <input type="text" name="konsen_kedua" class="form-control" placeholder="Jurusan Sekunder">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Jenis Gelar Akademik</label>
				    <input type="text" name="gelar" class="form-control" placeholder="Gelar">
				  </div>
		      <div class="form-group">
				    <label>Tahun Selesai</label>
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
				    </select>
	      	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" value="Tambahkan pertanyaan"></input>
      	</div>
	    </form>
    </div>
  </div>
</div>


<!-- form lokasi -->

<div class="modal fade bd-example-modal-lg" id="lokasi_modal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    	<form action="<?php echo site_url('pertanyaan/tambah_pertanyaan') ?>" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">lokasi</label>
				    <input type="text" class="form-control" name="lokasi" placeholder="Posisi pekerjaan">
				  </div>
				  <div class="form-group">
				    <label>Tahun Mulai</label>
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
				  <div class="form-group">
				    <label>Tahun Selesai</label>
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
				    </select>
	      	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" value="Tambahkan pertanyaan"></input>
      	</div>
	    </form>
    </div>
  </div>
</div>