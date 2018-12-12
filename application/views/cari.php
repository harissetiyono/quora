<?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-info" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>
<?php $i=0; ?>
<div class="row pt-2">
	<div class="col">
		<ul>
			<?php foreach ($topik as $key): ?>
	    		<li>
	    			<a href="<?php echo site_url('beranda/feed/'.$key->id_topik) ?>"><?php echo $key->nama_topik ?></a>
	    		</li>
	    	<?php endforeach ?>
		</ul>
	</div>
	<div class="col-8">

		<div class="card">
		  <div class="card-body">
		    <small><?php echo $this->session->userdata('nama') ?></small>
		    <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">Apakah pertanyaan anda?</button>
		  </div>
		</div>
		<br><br>
		<div class='row'>
	 		<?php foreach ($member as $key): ?>
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
		
		<?php $i = 1; ?>
		<?php foreach ($pertanyaan as $key_pertanyaan): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small>pertanyaan</small>
			    <a href="<?php echo site_url('pertanyaan/id/'.$key_pertanyaan['id_pertanyaan']) ?>" style="color: black">
			    	<p class="h5"> <?php echo $key_pertanyaan['pertanyaan']; ?></p>
			    </a>
			    	<button type="button" class="jawaban btn btn-link" id="<?php echo $key_pertanyaan['id_pertanyaan'] ?>" data-id="<?php echo $key_pertanyaan['id_pertanyaan'] ?>" data-toggle="modal"><i class="fa fa-pencil"></i> Jawab</button>
			    <a href="<?php echo site_url('pertanyaan/ikuti_pertanyaan/'.$key_pertanyaan['id_pertanyaan']) ?>" class="btn"><i class="fa fa-rss"></i> Ikuti</a>
			    <a href="<?php echo site_url('pertanyaan/laporkan_pertanyaan/'.$key_pertanyaan['id_pertanyaan']) ?>" class="btn"><i class="fa fa-flag"></i> Laporakan Spam</a>
			  </div>
			</div>

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
	</div>
	<div class="col">
		Kembangkan Lini Masa Anda
	</div>
</div>