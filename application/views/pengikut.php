<?php $i=0; ?>
	<div class="col">
		<label><b>Pengikut</b></label><hr>
		 <div class='row'>
	 		<?php foreach ($pengikut as $key): ?>
	 			<?php echo "<div class='col-sm-4'>"; ?>
				<div class="card" style="width: 20rem;">
				  <div class="card-body">
				  	<?php if ($key['foto'] == null): ?>
				  		<img src="<?php echo base_url('assets/images/profil/default.png') ?>" style="border-radius: 50%; width:30px; height: 30px;">
				  	<?php else: ?>
				  		<img src="<?php echo base_url('assets/images/profil/'.$key['foto']) ?>" style="border-radius: 50%; width:30px; height: 30px;">
				  	<?php endif ?>
				  	
				    <a href="<?php echo site_url('profil/id/'.$key['id_member']) ?>"><small> <?php echo $key['nama']; ?></small><br><br></a>
				   <!--  <?php if ($key['id_followed'] == $this->session->userdata('id_member')): ?>
				    	<button id="follow" class="btn btn-primary btn-sm" data-following="true">Unfollow</button>
				    <?php else: ?>
				    	<button id="follow" class="btn btn-primary btn-sm" data-following="false">Follow</button>
				    <?php endif ?> -->
				    
				  </div>
				</div>
				<?php echo '</div>'; ?>

				<?php 
					$i++;
				  	if ($i % 2 == 0) {echo '</div><div class="row">';} 
			  	?>
			<?php endforeach ?>

		</div>

	</div>
	
</dir>

<script type="text/javascript">
	$("[id^=follow]").click(function(){
	    if($(this).attr('data-following') == 'false'){
	        $(this).attr('data-following', 'true');
	        $(this).text('Unfollow');
	    }else if($(this).attr('data-following') == 'true'){
	        $(this).attr('data-following', 'false');
	        $(this).text('Follow');
	    }
	});
</script>