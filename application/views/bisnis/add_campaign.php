<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Create a Campaign</h5>
  </div>
</div>

<hr><br>

<small class="text-muted">Name Your Campaign & Choose an Objective</small>
<hr><br>

<form action="<?php echo site_url('bisnis/store_campaign') ?>" method="POST">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Campaign <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
      <input type="text" name="nama_kampanye" class="form-control form-control-sm" placeholder="Untitled Campaign">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Objective <NOFRAMES></NOFRAMES></label>
    <div class="col-sm-4">
    	<div class="list-group" id="list-tab" role="tablist">
	      <a class="btn btn-outline-secondary btn-sm list-group-item list-group-item-action active" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fa fa-filter"></i> Conversions</a>
	      <a class="btn btn-outline-secondary btn-sm list-group-item list-group-item-action" data-toggle="list" href="#list-profile" role="tab" aria-controls="home"><i class="fa fa-arrow-circle-o-down"></i> App Installs</a>
	      <a class="btn btn-outline-secondary btn-sm list-group-item list-group-item-action" data-toggle="list" href="#list-messages" role="tab" aria-controls="home"><i class="fa fa-bar-chart"></i> Traffic</a>
	    </div>
    </div>
  </div>
	<div class="tab-content" id="nav-tabContent">
	  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
	  	<div class="form-group row">
		    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Objective Description <NOFRAMES></NOFRAMES></label>
		    <div class="col-sm-8">
		      <p>Send users to your website or to a landing page where you would like them to complete an action.</p>
		    </div>
		  </div>
		  <h6>Configure Your Quora Pixel</h6><hr>
		  <div class="form-group row">
			  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Pixel Configuration<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-8">
			      <p>In order to view performance and conversion data associated with your ads, please install and configure your Quora Pixel.</p>
			    </div>
			</div>
		  <h6>Select A Conversion Type</h6><hr>
		  <div class="form-group row">
			  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Conversion Type<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			    	<select name="tipe" class="form-control btn btn-sm">
			    		<option value="1" selected="selected">Generic</option>
			    		<option value="4">Purchase</option>
			    		<option value="5">Generate Lead</option>
			    		<option value="6">Complete Registration</option>
			    		<option value="7">Add Payment Info</option>
			    		<option value="8">Add to Cart</option>
			    		<option value="9">Add to Wishlist</option><option value="10">Initiate Checkout</option>
			    		<option value="11">Search</option>
			    	</select>
			    </div>
			 </div>
		  <div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Quora Pixel Status<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-8">
			      <p>Please configure a Quora Pixel with the selected conversion type.</p>
			    </div>
			</div>
			<h6>Set Your Budget & Schedule</h6><hr><br>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Daily Maximum Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" name="anggaran_perhari" class="form-control" placeholder="100000">
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Lifetime Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" name="anggaran_selamanya" class="form-control" placeholder="100000"> (Optional)
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Schedule<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-10">
			      <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioConv1" value="selamanya" checked>
						  <label class="form-check-label" for="inlineRadio1">Begin advertising immediately</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioConv2" value="rentang">
						  <label class="form-check-label" for="inlineRadio2">Set a start and (optional) end date</label>
						</div>
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right"><NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <div class="Box" style="display: none">
					  	<div class="input-group input-daterange">
						    <input type="date" name="tanggal_mulai" class="form-control">
						    <div class="input-group-addon">to</div>
						    <input type="date" name="tanggal_selesai"  class="form-control">
							</div>
					  </div>
			    </div>
			</div>
			<hr><br>
	  </div>
	  <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
	  	<div class="form-group row">
		    <label class="col-sm-2 col-form-label col-form-label-sm text-right">Objective Description <NOFRAMES></NOFRAMES></label>
		    <div class="col-sm-8">
		      <p>Send users to the download page for your mobile application.</p>
		    </div>
		  </div>
		  <h6>Configure Your Quora Pixel</h6><hr>
		  <div class="form-group row">
			  <label class="col-sm-2 col-form-label col-form-label-sm text-right">Pixel Configuration<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-8">
			      <p>Quora has integrated with Kochava, TUNE, AppsFlyer, Adjust, Branch, and Singular for mobile app installation performance measurement.
						</p>
			    </div>
			</div>
			<h6>Set Your Budget & Schedule</h6><hr><br>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Daily Maximum Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" name="anggaran_perhari" class="form-control"  placeholder="100000">
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Lifetime Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" name="anggaran_selamanya" class="form-control" placeholder="100000"> (Optional)
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Schedule<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-10">
			      <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioApp1" value="selamanya" checked>
						  <label class="form-check-label" for="inlineRadio1">Begin advertising immediately</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioApp2" value="rentang">
						  <label class="form-check-label" for="inlineRadio2">Set a start and (optional) end date</label>
						</div>
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right"><NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <div class="Box" style="display: none">
					  	<div class="input-group input-daterange">
						    <input type="date" name="tanggal_mulai" class="form-control">
						    <div class="input-group-addon">to</div>
						    <input type="date" name="tanggal_selesai" class="form-control">
							</div>
					  </div>
			    </div>
			</div>
			<hr><br>
	  </div>
	  <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
			<h6>Set Your Budget & Schedule</h6><hr><br>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Daily Maximum Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="anggaran_perhari" placeholder="100000">
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Lifetime Budget<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="anggaran_selamanya" placeholder="100000"> (Optional)
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right">Schedule<NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-10">
			      <div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioTra1" value="selamanya">
					  <label class="form-check-label" for="inlineRadio1">Begin advertising immediately</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="tipe_jadwal" id="RadioTra2" value="rentang">
					  <label class="form-check-label" for="inlineRadio2">Set a start and (optional) end date</label>
					</div>
			    </div>
			</div>
			<div class="form-group row">
			 	<label class="col-sm-2 col-form-label col-form-label-sm text-right"><NOFRAMES></NOFRAMES></label>
			    <div class="col-sm-4">
			      <div class="Box" style="display: none">
					  	<div class="input-group input-daterange">
						    <input type="date" name="tanggal_mulai" class="form-control">
						    <div class="input-group-addon"><pre> to </pre></div>
						    <input type="date" name="tanggal_selesai" class="form-control">
							</div>
					  </div>
			    </div>
			</div>
			<hr><br>
	  </div>
	  <div class="form-group row">
		 	<label class="col-sm-2 col-form-label col-form-label-sm text-right"><NOFRAMES></NOFRAMES></label>
		    <div class="col-sm-4">
		      <input type="submit" class="btn btn-primary" value="Continue"></input>
		      <button type="button" class="btn btn-secondary">Cancel</button>
		    </div>
		</div>
	</div>
</form>

<script type="text/javascript">
	
$(document).ready(function(){

	$("#RadioConv1").prop('checked', true);

	if($('#RadioConv1').attr("value")=="selamanya"){
	  $(".Box").hide('slow');
	}
	if($('#RadioConv1').attr("value")=="rentang"){
	  $(".Box").show('slow');
	}

	$('input[type="radio"]').click(function(){
	    if($(this).attr("value")=="selamanya"){
	        $(".Box").hide('slow');
	    }
	    if($(this).attr("value")=="rentang"){
	        $(".Box").show('slow');

	    }        
	});
});

</script>