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

     <?php if (isset($pengikut[0]['id_following'])): ?>
       <?php if ($pengikut[0]['id_following'] == $this->session->userdata('id_member')): ?>
        <a href="<?=site_url('profil/follow/'.$profil[0]['id_member'].'/0') ?>"><i class="fa fa-rss-square"></i> Followed</a>
        <?php else: ?>
          <a href="<?=site_url('profil/follow/'.$profil[0]['id_member'].'/1') ?>"><i class="fa fa-rss-square"></i> Follow</a>
       <?php endif ?>
     <?php else: ?>
        <a href="<?=site_url('profil/follow/'.$profil[0]['id_member'].'/1') ?>"><i class="fa fa-rss-square"></i> Follow</a>
     <?php endif ?>
     
	</div>
	<?php $i = 0; ?>
  <div class="col-sm-4">
  	<h6><br><b>Kredensial & Sorotan</b></h6><hr>
  	<?php foreach ($pekerjaan as $key): ?>
      <?php if ($key['id_pekerjaan'] == null) {
        echo "belum ada data pekerjaan";
      }else{
        echo $key['posisi'].' - '.$key['perusahaan'];
      } ?>
    <?php endforeach ?><br>

    <?php foreach ($pendidikan as $key): ?>
      <?php if ($key['id_pendidikan'] == null) {
        echo "belum ada data pekerjaan";
      }else{
        echo $key['sekolah'].' - '.$key['konsen'];
      } ?>
    <?php endforeach ?><br>

    <?php foreach ($lokasi as $key): ?>
      <?php if ($key['id_lokasi'] == null) {
        echo "belum ada data pekerjaan";
      }else{
        echo $key['lokasi'].' | '.$key['mulai_tahun'].' - '.$key['sampai_tahun'];
      } ?>
    <?php endforeach ?>
	</div>
</div><br>
<hr>
<div class="row">
  <div class="col-md-2">
    <ul>
      <a href="<?php echo site_url('profil/id/'.$this->uri->segment(3)) ?>"><li>Pertanyaan</li></a>
      <a href="<?php echo site_url('profil/id_jawaban/'.$this->uri->segment(3)) ?>"><li>Jawaban</li></a>
      <a href="<?php echo site_url('profil/pengikut_member/'.$this->uri->segment(3)) ?>"><li>Pengikut</li></a>
      <a href="<?php echo site_url('profil/mengikuti_member/'.$this->uri->segment(3)) ?>"><li>Mengikuti</li></a>
    </ul>
  </div>