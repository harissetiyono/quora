<div class="row">
  <div class="colsm-2">
    <img src="<?php echo base_url('assets/images/profil/5.png') ?>" class="rounded-circle" style="width:140px">
	</div>
	<dir class="col">
		<h3><?php echo $profil[0]['nama']; ?></h3>
		<div class="row">
			<div class="col">
				<a href=""><i class="fa fa-user"></i> Follow</a>
				<a href=""><i class="fa fa-bullhorn"></i> Beritahu Saya</a>
				<a href=""><i class="fa fa-envelope-o"></i> Bertanya</a>
			</div>
		</div>
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
<dir class="row">
	<div class="col-md-2">
		<ul>
			<a href="<?php echo site_url('profil/id/'.$key['id_member']) ?>"><li>Pertanyaan</li></a>
			<a href="<?php echo site_url('profil/id_jawaban/'.$key['id_member']) ?>"><li>Jawaban</li></a>
			<a href="<?php echo site_url('') ?>"><li>Pengikut</li></a>
			<a href="<?php echo site_url('') ?>"><li>Mengikuti</li></a>
		</ul>
	</div>
	<dir class="col">
		<?php foreach ($pertanyaan as $key): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small>pertanyaan - <?php echo $key['nama_topik']; ?></small>
			    <a href="<?php echo site_url('pertanyaan/id/'.$key['id_pertanyaan']) ?>" style="color: black">
			    	<p class="h5"> <?php echo $key['pertanyaan']; ?></p>
			    </a>
			  </div>
			</div>

			<?php $i = 1; ?>
			<?php if ($i == 3): ?>
				<br>
				<div class="card">
			        <div class="card-body">
			          <small id="nama_bisnis_preview">Sponsored by <?php echo $adset[0]['nama_bisnis']; ?></small>
			          <h5 class="card-title" id="headline_preview"><?php echo $adset[0]['judul']; ?></h5>
			          <p class="card-text" id="description_preview"><?php echo $adset[0]['deskripsi'] ?></p>
			          <form action="<?php echo site_url('welcome/action_click') ?>" method="POST">
			          	<input type="text" name="id_adset" value="<?php echo  $adset[0]['id_adset']?>" hidden>
			          	<input type="text" name="url" value="<?php echo  $adset[0]['url']?>" hidden>
			          	<input type="submit" class="btn" value="visit at"><i class="fa fa-external-link" aria-hidden="true"></i><strong id="url_preview"><?php echo $adset[0]['url'] ?></strong></input>
			          </form>
			        </div>
			      </div>
			<?php endif ?>
			
			<?php if ($i == 5): ?>
				<br>
				<div class="card">
			        <div class="card-body">
			          <small id="nama_bisnis_preview">Sponsored by <?php echo $adset[1]['nama_bisnis']; ?></small>
			          <h5 class="card-title" id="headline_preview"><?php echo $adset[1]['judul']; ?></h5>
			          <p class="card-text" id="description_preview"><?php echo $adset[1]['deskripsi'] ?></p>
			          <form action="<?php echo site_url('welcome/action_click') ?>" method="POST">
			          	<input type="text" name="id_adset" value="<?php echo  $adset[1]['id_adset']?>" hidden>
			          	<input type="text" name="url" value="<?php echo  $adset[1]['url']?>" hidden>
			          	<input type="submit" class="btn" value="visit at"><i class="fa fa-external-link" aria-hidden="true"></i><strong id="url_preview"><?php echo $adset[1]['url'] ?></strong></input>
			          </form>
			        </div>
			      </div>
			<?php endif ?>
			<?php $i++; ?>
		<?php endforeach ?>
	</dir>
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