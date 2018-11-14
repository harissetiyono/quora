<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Create a Adset</h5>
  </div>
</div>

<hr><br>

<small class="text-muted">Adset Detail</small>
<hr><br>

<form action="<?php echo site_url('bisnis/store_adset') ?>" method="POST">
	<?php foreach ($kampanye as $key): ?>
	
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Campaign <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <p><?php echo $key['nama_kampanye'] ?></p>
      <input type="text" class="form-control" value="<?php echo $key['id_kampanye'] ?>" name="id_kampanye" hidden>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Bussines Name <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <input type="text" name="nama_bisnis" id="nama_bisnis" class="form-control form-control-sm" placeholder="Nama Bisnis" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Adset Name<NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <input type="text" name="nama_adset" class="form-control form-control-sm" placeholder="Nama Adset" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Headline <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <input type="text" name="judul" id="judul" class="form-control form-control-sm" placeholder="Headline..." required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Description <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="..." required></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">URL target <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <input type="text" name="url" id="url" class="form-control form-control-sm" placeholder="contoh: http://www.google.com" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Preview <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-6">
      <div class="card w-125">
        <div class="card-body">
          <small id="nama_bisnis_preview">Sponsored by </small>
          <h5 class="card-title" id="headline_preview">Headline</h5>
          <p class="card-text" id="description_preview">Description</p>
          <a href="#" class="btn"><i class="fa fa-external-link" aria-hidden="true"></i> Visit at <strong id="url_preview"></strong></a>
        </div>
      </div>
    </div>
  </div>
  <h6>Target Topik</h6><hr><br>
  <div class="form-group row">
	  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Targeting Types<NOFRAMES></NOFRAMES></label>
	    <div class="col-sm-4">
	      <p>Topic Target</p>
	    </div>
	</div>
	<div class="form-group row">
	  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Targeting Description<NOFRAMES></NOFRAMES></label>
	    <div class="col-sm-4">
	      <p>Your ads will appear next to content associated with specific topics across Quora</p>
	    </div>
	</div>
	<div class="form-group row">
	  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Targeting Topic<NOFRAMES></NOFRAMES></label>
	    <div class="col-sm-4">
	      <select name="topik" class="form-control">
	      	<?php foreach ($topik as $key2): ?>
	      		<option value="<?php echo $key2->id_topik ?>"><?php echo $key2->nama_topik; ?></option>
	      	<?php endforeach ?>
	      </select>
	    </div>
	</div>
	<h6>Set a bid</h6><hr><br>
  <div class="form-group row">
	  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Cost per Click (CPC)<NOFRAMES></NOFRAMES></label>
	    <div class="col-sm-4">
	      <input type="number" name="cpc" class="form-control form-control-sm" placeholder="Rp. 500" min="500" required>
	    </div>
	</div>
  <?php endforeach ?>
  <div class="form-group row">
		 	<label class="col-sm-2 col-form-label col-form-label-sm text-right"><NOFRAMES></NOFRAMES></label>
		    <div class="col-sm-4">
		      <input type="submit" class="btn btn-primary" value="Save"></input>
		      <button type="button" class="btn btn-secondary">Cancel</button>
		    </div>
		</div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

      $("#judul").change(function(){
          var judul = $("#judul").val();
          $("#headline_preview").html(judul);
      });

      $("#deskripsi").change(function(){
          var deskripsi = $("#deskripsi").val();
          $("#description_preview").html(deskripsi);
      });

      $("#nama_bisnis").change(function(){
          var nama_bisnis = $("#nama_bisnis").val();
          $("#nama_bisnis_preview").html("Sponsored by "+nama_bisnis);
      });

      $("#url").change(function(){
          var url = $("#url").val();
          $("#url_preview").html(url);
      });
  });
</script>