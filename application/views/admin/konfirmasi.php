<br>
<div class="row align-items-center">
    <div class="col">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Konfirmasi Pembayaran</h4>
        <p>Halaman ini akan menampilkan data top up yang dilakukan oleh member bisnis terkait konfirmasi pembayaran</p>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-25">Akun</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Bank</th>
          <th scope="col">Bukti</th>
          <th scope="col">Nominal</th>
          <th scope="col">Status</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($topup as $key): ?>
          <tr>
            <th scope="row">1</th>
            <td><?=$key->email ?></td>
            <td><?=$key->tanggal ?></td>
            <td><?=$key->nama_bank ?></td>
            <td><img src="<?=base_url('assets/images/'.$key->bukti)?>" width="150px"></td>
            <td><?=$key->nominal ?></td>
            <td>
              <?php if ($key->status == '0'): ?>
                <span class="badge badge-danger">Batal</span>
              <?php elseif ($key->status == null): ?>
                <span class="badge badge-info">Belum diproses</span>
              <?php else: ?>
                <span class="badge badge-success">Sukses</span>
              <?php endif ?>
            </td>
            <td>
              <form action="update_konfirmasi" method="POST">
                <input type="text" name="id_transaksi" value="<?=$key->id_transaksi ?>" hidden="hidden">
                <input type="text" name="id_member" value="<?=$key->id ?>" hidden="hidden">
                <input type="text" name="saldo" value="<?=$key->saldo ?>" hidden="hidden">
                <input type="text" name="nominal" value="<?=$key->nominal ?>" hidden="hidden">
                <?php if ($key->status == 1 ) {
                  echo '<input type="submit" name="submit" class="btn btn-sm btn-primary" value="konfirmasi" disabled></input>';
                }else{
                  echo '<input type="submit" name="submit" class="btn btn-sm btn-primary" value="konfirmasi"></input>';
                } ?>
                
                <input type="submit" name="submit" class="btn btn-sm btn-danger" value="batal"></input>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>