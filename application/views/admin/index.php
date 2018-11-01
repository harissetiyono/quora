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
    <th scope="col">Jumlah Laporan</th>
    <th scope="col">Status</th>
    <th scope="col">#</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($spam_pertanyaan as $key): ?>
    <tr>
      <td><?=$no?></td>
      <td><?=$key->pertanyaan?> <a href="<?=$key->link?>">link</a></td>
      <td><?=rand(10,100);?></td>
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
          <button type="button" class="btn btn-primary" disabled="disabled">Confirm</button>
          <button type="button" class="btn btn-danger">Hidden</button>
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
      <td><?=rand(10,100);?></td>
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
          <button type="button" class="btn btn-primary">Confirm</button>
          <button type="button" class="btn btn-danger">Spam</button>
        </div>
      </td>
    </tr>
  <?php $no++; endforeach ?>
</tbody>
</table>