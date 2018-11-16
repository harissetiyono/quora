<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Campaign for <?php echo $this->session->userdata('nama') ?></h5>
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

<table id="campaign" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th>Status</th>
      <th>Campaign Name</th>
      <!-- <th>Delivery</th> -->
      <th>Impression</th>
      <th>Click</th>
      <th>CTR</th>
      <th>Remaining Budget</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kampanye as $key): ?>
      <tr>
      <td><?php echo $key['status']; ?></td>
      <td><a href="<?php echo site_url('bisnis/manage_adset/'.$key['id_kampanye']) ?>"><?php echo $key['nama_kampanye']; ?></td>
      <!-- <td><?php echo $key['click'] * 500; ?></td> -->
      <td><?php echo $key['impression']; ?></td>
      <td><?php echo $key['click']; ?></td>
      <td><?php echo @(round(($key['click']/$key['impression']*100),2)); ?>%</td>
      <td><?php echo 'Rp '.number_format(round($member_bisnis[0]['saldo'])); ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
  $('#campaign').DataTable();
});
</script>