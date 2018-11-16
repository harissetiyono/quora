<br>
<div class="row align-items-center">
    <div class="col">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Laporan Spam</h4>
        <p>Halaman ini akan menampilakan laporan terkait konten yang terindikasi spam oleh pengguna</p>
      </div>
    </div>
</div>

<?php $no=1; ?>
<h3>Spam Pertanyaan</h3>
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Pertanyaan</th>
    <!-- <th scope="col">Jumlah Laporan</th> -->
    <th scope="col">Status</th>
    <th scope="col">#</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($spam_pertanyaan as $key): ?>
    <tr>
      <td><?=$no?></td>
      <td><?=$key->pertanyaan?></td>
      <!-- <td><?=rand(10,100);?></td> -->
      <td>
        <?php if ($key->s_status == null) {
            echo '<span class="badge badge-info">belum diproses</span>';
          }elseif ($key->s_status == 1) {
            echo '<span class="badge badge-primary">bukan spam</span>';
          }else{
            echo '<span class="badge badge-danger">spam</span>';
        } ?>
      </td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-info" href="<?php echo site_url('admin/spam_pertanyaan_update/'.$key->id_pertanyaan).'/1' ?>">Konfirmasi</a>
          <a class="btn btn-danger" href="<?php echo site_url('admin/spam_pertanyaan_update/'.$key->id_pertanyaan).'/0' ?>">Spam</a>
        </div>
      </td>
    </tr>
  <?php $no++; endforeach ?>
</tbody>
</table>

<?php $no=1; ?>
<h3>Spam Jawaban</h3>
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Pertanyaan</th>
    <th scope="col">Jumlah laporan</th>
    <th scope="col">Status</th>
    <th scope="col">#</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($spam_jawaban as $key): ?>
    <tr>
      <td><?=$no?></td>
      <td><?=$key->jawaban?></td>
      <!-- <td><?=rand(10,100);?></td> -->
      <td>
        <?php if ($key->s_status == null) {
          echo '<span class="badge badge-info">belum diproses</span>';
        }elseif ($key->s_status == 1) {
          echo '<span class="badge badge-primary">bukan spam</span>';
        }else{
          echo '<span class="badge badge-danger">spam</span>';
        } ?>
          
      </td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-info" href="<?php echo site_url('admin/spam_jawaban_update/'.$key->id_jawaban).'/1' ?>">Konfirmasi</a>
          <a class="btn btn-danger" href="<?php echo site_url('admin/spam_jawaban_update/'.$key->id_jawaban).'/0' ?>">Spam</a>
        </div>
      </td>
    </tr>
  <?php $no++; endforeach ?>
</tbody>
</table>