<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Adset for <?php echo $this->session->userdata('nama') ?></h5>
  </div>
  <div class="col col-sm-1 pt-2">
    <select class="form-control btn btn-sm" >
      <option>7 Days</option>
      <option>30 Days</option>
    </select>
  </div>
</div>

<hr><br>

<?php echo $this->session->userdata('messages') ?>

<div class="row">
  <div class="col-2">
    <small class="text-muted">Performance for All Campaigns<br></small> 
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Impression</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Click</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Generic Clickthrough Conversions</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Spend</a>
    </div>   
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <img src="<?php echo base_url('/assets/images/1.png') ?>">
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <img src="<?php echo base_url('/assets/images/2.png') ?>">
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
        <img src="<?php echo base_url('/assets/images/3.png') ?>">
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <img src="<?php echo base_url('/assets/images/4.png') ?>">
      </div>
    </div>
  </div>
</div>

<a href="<?php echo site_url('bisnis/add_adset/'.$this->uri->segment(3)); ?>" class="btn btn-primary btn-sm">
<i class="fa fa-plus"></i> Create Adset</a>

<table id="campaign" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th>Status</th>
      <th>Ads set</th>
      <th>Impression</th>
      <th>Click</th>
      <th>CTR</th>
      <th>CPC</th>
      <th>Delivery</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($adset as $key): ?>
      <tr>
      <td><?php echo $key['status']; ?></td>
      <td><?php echo $key['nama_adset']; ?></td>
      <td><?php echo $key['impressions']; ?></td>
      <td><?php echo $key['click']; ?></td>
      <td><?php echo @($key['click']/$key['impressions'])*100; ?>%</td>
      <td>Rp. <?php echo $key['cpc']; ?></td>
      <td>Rp. <?php echo $key['click']*$key['cpc']; ?></td>
      <td>
        <a href="<?php echo site_url('bisnis/edit_adset/'.$key['id_adset']); ?>">edit</a>
        <a href="<?php echo site_url('bisnis/delete_adset/'.$key['id_adset']); ?>" onclick="return confirm('yakin iklan akan dihapus?')">hapus</a>
        <?php if ($key['status'] == "aktif"): ?>
          <?php $status = "deaktif"; ?>
        <?php else: ?>
         <?php $status = "aktif"; ?>
        <?php endif ?>
        <a href="<?php echo site_url('bisnis/status_adset/'.$key['id_adset'].'/'.$key['status']); ?>"><?php echo $status ?></a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
  $('#campaign').DataTable();
});
</script>