<br>
<div class="row align-items-center">
    <div class="col">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Laporan Spam</h4>
        <p>Halaman ini akan menampilakan laporan terkait konten yang terindikasi spam oleh pengguna</p>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-25">Pelapor</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Konten</th>
          <th scope="col">Jenis</th>
          <th scope="col">Status</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Haris Setiyono</td>
          <td>12/10/2018</td>
          <td>Sudut pandang kita semakin real dan pragmatis. Sebenarnya dari dahulu memang dunia sudah absurd, hanya saja sewaktu kecil absurditas ini biasanya ditutup-tutupi dari kita.</td>
          <td>Jawaban</td>
          <td><span class="badge badge-success">clear</span></td>
          <td>
            <span class="badge badge-danger">
              <img src="<?=base_url('assets/icon/svg/x.svg')?>">
            </span>
            <span class="badge badge-info">
              <img src="<?=base_url('assets/icon/svg/check.svg')?>">
            </span>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Ragata Anggada</td>
          <td>12/10/2018</td>
          <td>Wah.. nggak bener nih, hoax</td>
          <td>Jawaban</td>
          <td><span class="badge badge-danger">spam</span></td>
          <td>
            <span class="badge badge-danger">
              <img src="<?=base_url('assets/icon/svg/x.svg')?>">
            </span>
            <span class="badge badge-info">
              <img src="<?=base_url('assets/icon/svg/check.svg')?>">
            </span>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Tiani Khusnul</td>
          <td>12/10/2018</td>
          <td>Sudut pandang kita semakin real dan pragmatis?</td>
          <td>Pertanyaan</td>
          <td><span class="badge badge-success">clear</span></td>
          <td>
            <span class="badge badge-danger">
              <img src="<?=base_url('assets/icon/svg/x.svg')?>">
            </span>
            <span class="badge badge-info">
              <img src="<?=base_url('assets/icon/svg/check.svg')?>">
            </span>
          </td>
        </tr>
        
      </tbody>
    </table>
</div>