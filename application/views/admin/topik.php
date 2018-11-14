<?php if (!empty($this->session->userdata('message'))) {
  echo $this->session->userdata('message');
} ?>
<br>
<div class="card card-body">
  <label>Tambah Data</label>
  <form action="<?php echo site_url('admin/store_topik') ?>" method="POST">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="id_topik" name="id_topik" hidden>
        <input type="text" class="form-control" id="topik" name="topik" autocomplete="off" placeholder="Topik" required>
      </div>
      <div class="col">
        <select class="form-control" name="status" id="status">
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
      </div>
      <div class="col">
        <input type="submit" class="btn btn-primary" value="Simpan">
        <input type="button" class="btn btn-primary" onclick="this.form.reset();" value="Reset">
      </div>
    </div>
  </form>
</div>  
<br>  
<div class="row align-items-center">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Topik</th>
          <th scope="col">Status</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        <?php foreach ($topik as $key): ?>
          <tr>
          <th scope="row"><?=$no?></th>
          <td><?=$key->nama_topik ?></td>
          <td>
            <?php if ($key->status == 1) {
                echo '<span class="badge badge-primary">active</span>';
              }else{
                echo '<span class="badge badge-danger">deactive</span>';
            } ?>
          </td>
          <td>
            <a class="mb-2 btn btn-sm btn-danger mr-1" href="<?=site_url('admin/delete_topik?id_topik='.$key->id_topik);?>">Hapus</a>
            <button id="edit" class="mb-2 btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Edit Data" value="<?=$key->id_topik ?>">edit</button>
          </td>
        </tr>
        <?php $no++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $("[id^=edit]" ).click(function(){
      var id = $(this).attr('value');
      $.ajax({
           url: 'get_topik/'+id,
           success:function(data)
            {
                var datas = jQuery.parseJSON(data);
                var status;
                if (datas[0]['status'] == "1") { status = "1";}else { status = "0";};

                $('#id_topik').val(datas[0]['id_topik']);
                $('#topik').val(datas[0]['nama_topik']);
                $('#status').val(status).prop('selected', true);
            }
        })
      });
</script>

