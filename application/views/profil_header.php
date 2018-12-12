<br>
<div class="row">
  <div class="col-sm-2">
    <?php if ($profil[0]['foto'] == null): ?>
      <img src="<?php echo base_url('assets/images/profil/default.png') ?>" class="rounded-circle" style="width:140px">
    <?php else: ?>
      <img src="<?php echo base_url('assets/images/profil/'.$profil[0]['foto']) ?>" class="rounded-circle" style="width:140px">
    <?php endif ?>
    
	</div>
	<div class="col">
		<h3><?php echo $profil[0]['nama']; ?></h3>
    <?php 
      echo $profil[0]['kredensial'].'<br>'.$profil[0]['deskripsi'].'<br>';
     ?>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-md">Edit</button>
	</div>
	<?php $i = 0; ?>
  <div class="col-sm-4">
  	<h6><br><b>Kredensial & Sorotan</b></h6><hr>
  	<?php foreach ($profil as $key): ?>
  		<?php if ($key['id_pekerjaan'] == null): ?>
  			<a href="<?php echo site_url('profil/pekerjaan') ?>" class="btn"><i class="fa fa-briefcase"></i> Tambahkan kredensial pekerjaan</a>
  		<?php else: ?>
        <?php foreach ($pekerjaan as $key2): ?>
          <?php echo '<i class="fa fa-briefcase"></i> '.$key2['posisi'].' - '.$key2['perusahaan']; ?>
          <a href="<?php echo site_url('profil/pekerjaan_edit') ?>"> Edit</a><br>
        <?php endforeach ?>
  		<?php endif ?>

  		<?php if ($key['id_pendidikan'] == null): ?>
  			<a href="<?php echo site_url('profil/pendidikan') ?>" class="btn" ><i class="fa fa-graduation-cap"></i> Tambahkan kredensial pendidikan</a>
  		<?php else: ?>
        <?php foreach ($pendidikan as $key3): ?>
          <?php echo '<i class="fa fa-graduation-cap"></i> '.$key3['sekolah'].' - '.$key3['konsen']; ?>
        <?php endforeach ?>
        <a href="<?php echo site_url('profil/pendidikan_edit') ?>" > Edit</a><br>
  		<?php endif ?>

  		<?php if ($key['id_lokasi'] == null): ?>
  			<a href="<?php echo site_url('profil/lokasi') ?>" class="btn" ><i class="fas fa-map-marker-alt"></i> Tambahkan kredensial lokasi</a>
  		<?php else: ?>
        <?php foreach ($lokasi as $key4): ?>
          <?php echo '<i class="fas fa-map-marker-alt"></i> '.$key4['lokasi'].' | '.$key4['mulai_tahun'].'-'.$key4['mulai_tahun']; ?>
        <?php endforeach ?>
        <a href="<?php echo site_url('profil/lokasi_edit') ?>"> Edit</a>
  		<?php endif ?>

		<?php endforeach ?>
	</div>
</div>
<hr>
<div class="row" style="height: 500px">
  <div class="col-md-2">
    <label><b>Feed</b></label><hr>
    <ul>
      <a href="<?php echo site_url('profil') ?>"><li>Pertanyaan</li></a>
      <a href="<?php echo site_url('profil/jawaban') ?>"><li>Jawaban</li></a>
      <a href="<?php echo site_url('profil/pengikut') ?>"><li>Pengikut</li></a>
      <a href="<?php echo site_url('profil/mengikuti') ?>"><li>Mengikuti</li></a>
    </ul>
  </div>