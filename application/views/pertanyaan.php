<?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-info" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>

<div class="row pt-2">
	<div class="col">
		<?php foreach ($topik as $key): ?>
	    		<li>
	    			<a href="<?php echo site_url('beranda/feed/'.$key->id_topik) ?>"><?php echo $key->nama_topik ?></a>
	    		</li>
	    	<?php endforeach ?>
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
			  </div>
			</div>
		<?php endforeach ?>
		<hr>
		<?php foreach ($jawaban as $key): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small><?php echo $key['tanggal']; ?></small>
			    <p> <?php echo $key['jawaban']; ?></p>
	   	 		<a href="<?php echo site_url('dukungan/dukung_naik/'.$key['id_jawaban']) ?>" class="btn"><i class="fa fa-arrow-up"></i> Naik</a>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form action="<?php echo site_url('pertanyaan/tambah_pertanyaan') ?>" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <textarea name="pertanyaan" class="form-control" placeholder="awali pertanyaan anda dengan Apa, bagaimana, mengapa, dll" required></textarea>
	        <label>Url (optional)</label>
	        <input type="text" class="form-control" name="link">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-primary" value="Tambahkan pertanyaan"></input>
      	</div>
	    </form>
    </div>
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