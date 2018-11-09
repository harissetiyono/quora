<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Audiences</h5>
  </div>
  <div class="col col-sm-2 pt-2">
    <a class="form-control btn btn-primary btn-md" href="<?php echo site_url('bisnis/add_audience') ?>">
      <i class="fa fa-plus"></i> Create Audience
    </a>
  </div>
</div>

<hr><br>

<table id="audience" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th>Audience Name</th>
      <th>Audience Type</th>
      <th>Size</th>
      <th>Date Created</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Teknologi 20</th>
      <th>Website Traffic</th>
      <th>10000 people</th>
      <th>November 8, 2018</th>
    </tr>
  </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
  $('#audience').DataTable();
});
</script>