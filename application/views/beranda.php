<?php if ($this->session->userdata('message') != null): ?>
      <div class="alert alert-info" role="alert">
        <?php echo $this->session->userdata('message'); ?>
      </div>
    <?php endif ?>

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
		<?php $i = 1; ?>
		<?php foreach ($pertanyaan as $key): ?>
			<br>
			<div class="card">
			  <div class="card-body">
			    <small>pertanyaan - <?php echo $key['nama_topik']; ?></small>
			    <a href="<?php echo site_url('pertanyaan/id/'.$key['id_pertanyaan']) ?>" style="color: black">
			    	<p class="h5"> <?php echo $key['pertanyaan']; ?></p>
			    </a>
			    	<button type="button" class="jawaban btn btn-link" id="<?php echo $key['id_pertanyaan'] ?>" data-id="<?php echo $key['id_pertanyaan'] ?>" data-toggle="modal"><i class="fa fa-pencil"></i> Jawab</button>
			    <a href="<?php echo site_url('pertanyaan/ikuti_pertanyaan/'.$key['id_pertanyaan']) ?>" class="btn"><i class="fa fa-rss"></i> Ikuti</a>
			    <a href="<?php echo site_url('pertanyaan/laporkan_pertanyaan/'.$key['id_pertanyaan']) ?>" class="btn"><i class="fa fa-flag"></i> Laporakan Spam</a>
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
	        <label>Topik</label>
	        <select name="id_topik" class="form-control">
	        	<?php foreach ($topik as $key): ?>
	        	<option value="<?php echo $key->id_topik ?>"><?php echo $key->nama_topik ?></option>	        		
	        	<?php endforeach ?>
	        </select>
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