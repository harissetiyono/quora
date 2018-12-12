<?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-info" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>
<?php $i=0; ?>
<div class="row pt-2">
	<div class="col">
	</div>
	<div class="col-8">
		<h4><center>Silahkan memilih minimal 5 Topik !</center></h4>
		<form id="feed_form" action="<?php echo site_url('beranda/add_feed_action') ?>" method="POST">
		<div class='row'>
	 		<?php foreach ($topik as $key): ?>
	 			<?php echo "<div class='col-sm-4'>"; ?>
				<div class="card" style="width: 15rem;">
				  <div class="card-body">
				  	<h6><?php echo $key->nama_topik; ?> <input type="checkbox" name="topik[]" value="<?php echo $key->id_topik; ?>"></h6>
				  	<input type="text" name="id_topik" value="<?php echo $key->id_topik; ?>" hidden>
				  	
				  </div>
				</div>
				<?php echo '</div><br>'; ?>

				<?php 
					$i++;
				  	if ($i % 3 == 0) {echo '</div><div class="row">';} 
			  	?>
			<?php endforeach ?>
		</div>

		<input class="btn btn-primary btn-md" id="lanjut" type="submit" name="simpan" value="lanjutkan..">
		</form>
	</div>

	<div class="col">
		
	</div>
</div>

<script type="text/javascript">
	$("#feed_form").submit(function(){
	    var checked = $("#feed_form input:checked").length > 4;
	    if (!checked){
	        alert("Pilih minimal 5 topik !");
	        return false;
	    }
	});
</script>