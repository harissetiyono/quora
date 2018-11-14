<div class="container">
  <div class="container">
  <div class="row pt-4">
    <div class="col">
      
    </div>
    <div class="col-6 border">
      <?php foreach ($transaction as $key): ?>
      	<h1>Pembayaran Transaksi <?php echo $key['id_transaksi']; ?></h1><hr>
      	<p>Yth <?php echo $this->session->userdata('nama'); ?></p>
      	<p>Berikut ini merupakan informasi transaksi yang telah anda lakukan</p>
      	<p>silahkan melakukan pembayaran :</p>
      	<p>Tanggal : <?php echo $key['tanggal'] ?></p>
      	<p>Nominal : <?php echo $key['nominal'] ?></p>
      	<p>Bank : <?php echo $key['nama_bank'] ?></p>
      	<p>Rekening : <?php echo $key['no_rek'] ?></p>
      	<p>Jika telah melakukan pembayaran, segera upload bukti pembayaran pada menu billing.</p>
      <?php endforeach ?>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>