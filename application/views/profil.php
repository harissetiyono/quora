	<div class="col">
		<label><b>Pertanyaan</b></label><hr>
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
	</div>
</div>