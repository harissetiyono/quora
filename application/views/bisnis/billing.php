<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Billing & Payment Methods</h5>
  </div>
  <div class="col col-sm-1 pt-4">
  </div>
</div>

<hr><br>

<?php if (!empty($data)) {
  echo $data;
} ?>

<div class="container">
  <?php foreach ($member_bisnis as $key2): ?>
  <div class="row">
    <div class="col border">
      <h5>Saldo saat ini</h5>
      <?php echo 'Rp '.number_format(round($key2['saldo'])); ?>
    </div>
    <div class="col border">
      <h5>Saldo digunakan</h5>
      tes
    </div>
  </div>
  <?php endforeach ?>
</div>

<div class="row">
  <div class="col col-sm-1 pt-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Top up Saldo
    </button>
  </div>
</div>

<table id="transaksi" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Metode Pembayaran</th>
      <th>Tanggal</th>
      <th>Nominal</th>
      <th>Bukti</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transaction as $key): ?>
    <tr>
      <td><?php echo $key['id_transaksi']; ?></td>
      <td><?php echo $key['nama_bank']; ?></td>
      <td><?php echo $key['tanggal']; ?></td>
      <td><?php echo $key['nominal']; ?></td>
      <td>
        <?php if ($key['bukti'] == null): ?>
          <form action="<?php echo site_url('bisnis/upload_bukti') ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $key['id_transaksi'] ?>" hidden>
            <input type="file" name="bukti" class="form-control">
            <input type="submit" class="form-control">
          </form>
        <?php elseif($key['status'] == 1): ?>
          <a href="<?php echo base_url('assets/bukti/'.$key['bukti']) ?>" target="_blank">
            lihat bukti transaksi
          </a>
        <?php else: ?>
          <a href="<?php echo base_url('assets/bukti/'.$key['bukti']) ?>" target="_blank">
            lihat bukti transaksi
          </a>
          <form action="<?php echo site_url('bisnis/upload_bukti') ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $key['id_transaksi'] ?>" hidden>
            <input type="file" name="bukti" class="form-control">
            <input type="submit" class="form-control">
          </form>
        <?php endif ?>
      </td>
      <td>
        <?php if ($key['status'] == "1"): ?>
          <?php echo "Terbayar" ?>
        <?php elseif($key['status'] == "0"): ?>
          <?php echo "Sedang diproses" ?>
        <?php else: ?>
          <a href="<?php echo site_url('bisnis/cara_pembayaran/'.$key['id_transaksi']) ?>">
            cara pembayaran
          </a>
        <?php endif ?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('bisnis/store_topup') ?>" method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Pilih Bank Transfer</label>
              <select name="id_metode_pembayaran" class="form-control">
                <?php foreach ($bank as $key): ?>
                  <option value="<?php echo $key['id_metode_pembayaran'] ?>"><?php echo $key['nama_bank']; ?></option>
                <?php endforeach ?>
              </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary"></input>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#transaksi').DataTable();
});
</script>