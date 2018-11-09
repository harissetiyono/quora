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
      <th>Delivery</th>
      <th>Impression</th>
      <th>Click</th>
      <th>CTR</th>
      <th>CPC</th>
      <th>Spend</th>
      <th>Remaining Budget</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>active</td>
      <td>Private Course</td>
      <td>$30</td>
      <td>1000</td>
      <td>150</td>
      <td>15%</td>
      <td>$0.2</td>
      <td>$100</td>
      <td>$70</td>
    </tr>
  </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
  $('#campaign').DataTable();
});
</script>