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
		
		</main>
	</body>
</html>