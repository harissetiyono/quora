<?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-info" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>

<div class="row pt-2">
	<div class="col">
		<label><b>Pertanyaan</b></label><hr>
		<?php foreach ($topik as $key): ?>
    		<li>
    			<a href="<?php echo site_url('beranda/feed/'.$key->id_topik) ?>"><?php echo $key->nama_topik ?></a>
    		</li>
    	<?php endforeach ?>
    	<a class="btn btn-primary" href="<?php echo site_url('beranda/add_feed') ?>">Tambah Feed Topik</a>
	</div>
	<div class="col-8">
		<?php foreach ($pertanyaan as $key): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small>pertanyaan</small>
			    <p class="h3"> <?php echo $key['pertanyaan']; ?></p>
			    <?php if (!empty($this->session->userdata('id_member'))): ?>
			    	<button type="button" class="jawaban btn btn-link" id="<?php echo $key['id_pertanyaan'] ?>" data-id="<?php echo $key['id_pertanyaan'] ?>" data-toggle="modal"><i class="fa fa-pencil"></i> Jawab</button>
			    	<a href="<?php echo site_url('pertanyaan/ikuti_pertanyaan/'.$key['id_pertanyaan']) ?>" class="btn"><i class="fa fa-rss"></i> Ikuti</a>
			    	<a href="<?php echo site_url('pertanyaan/laporkan_pertanyaan/'.$key['id_pertanyaan']) ?>" class="btn"><i class="fa fa-flag"></i> Laporkan Spam</a>
			    <?php endif ?>
			    <!-- AddToAny BEGIN -->
				<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
					<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_google_plus"></a>
					<a class="a2a_button_email"></a>
				</div>
				<script async src="https://static.addtoany.com/menu/page.js"></script>
				<!-- AddToAny END -->
			  </div>
			</div>
		<?php endforeach ?>
		<hr>
		<?php $jumlah=0; ?>
		<?php foreach ($jawaban as $key): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small><?php echo $key['tanggal']; ?></small>
			    <a href="<?php echo site_url('profil/id/'.$key['id_member']) ?>"><small> <?php echo $key['nama']; ?></small><br><br></a>
			    <p> <?php echo $key['jawaban']; ?></p>
			    <?php foreach ($dukungan as $key2 => $value): ?>
			    	<?php if (($value['id_jawaban']) == ($key['id_jawaban']) && ($value['dukungan']) == 'naik'): ?>
			    		<?php $jumlah++;  ?>
			    	<?php endif ?>
			    <?php endforeach ?>
			    <?php echo $jumlah; ?>
			    <?php $jumlah = 0;  ?>
			    
	   	 		<a href="<?php echo site_url('dukungan/dukung_naik/'.$key['id_jawaban']) ?>" class="btn"><i class="fa fa-arrow-up"></i> Naik</a>

	   	 		<?php foreach ($dukungan as $key2 => $value): ?>
			    	<?php if (($value['id_jawaban']) == ($key['id_jawaban']) && ($value['dukungan']) == 'turun'): ?>
			    		<?php $jumlah++;  ?>
			    	<?php endif ?>
			    <?php endforeach ?>
			    <?php echo $jumlah; ?>
			    <?php $jumlah = 0;  ?>
	   	 		<a href="<?php echo site_url('dukungan/dukung_turun/'.$key['id_jawaban']) ?>" class="btn"><i class="fa fa-arrow-down"></i> Turun</a>
	   	 		<a href="<?php echo site_url('jawaban/laporkan_jawaban/'.$key['id_jawaban']) ?>" class="btn"><i class="fa fa-flag"></i> Laporkan Spam</a>
			  </div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="col">
		Kembangkan Lini Masa Anda
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="jawaban_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form action="<?php echo site_url('jawaban/tambah_jawaban') ?>" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<h5>Jawaban</h5>
	        <textarea name="jawaban" class="form-control" placeholder="" required></textarea>
	        <input type="text" name="id_pertanyaan" id="id_pertanyaan" value="" hidden>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" value="Tambahkan jawaban"></input>
      	</div>
	    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(function(){
	  $(".jawaban").click(function(){
	     $('#id_pertanyaan').val($(this).data('id'));
	    $("#jawaban_modal").modal("show");
	  });
	});
</script>