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
		
		</main>
	</body>
</html>

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

<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    	<div class="modal-body">
	      <?php echo form_open_multipart('profil/update_profil');?>
	      <?php foreach ($profil as $key): ?>
	      	<div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nama:</label>
	            <input type="text" name="nama" class="form-control" value="<?php echo $key['nama'] ?>">
	          </div>
	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Kredensial:</label>
	            <input type="text" name="kredensial" class="form-control" value="<?php echo $key['kredensial'] ?>">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Deskripsi:</label>
	            <textarea class="form-control" name="deskripsi" id="message-text"> <?php echo $key['deskripsi'] ?></textarea>
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Foto:</label>
	            <input type="file" name="foto" class="form-control"><br>
	            <input type="submit" class="btn-primary" value="submit">
	          </div>
	      <?php endforeach ?>
	          
	        </form>
	    </div>
    </div>
  </div>
</div>