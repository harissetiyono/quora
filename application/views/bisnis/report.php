<div class="row">
  <div class="col">
    <small class="text-muted">Account : <?php echo $this->session->userdata('nama') ?><br></small>
    <h5>Email report</h5>
  </div>
  <div class="col col-sm-2 pt-2">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Create Report
    </button>
  </div>
</div>

<hr><br>

<table id="audience" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th>Report Name</th>
      <th>Email Schedule</th>
      <th>Last Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Iklan Programing</th>
      <th>harissetiyono@gmail.com</th>
      <th>November 8, 2018</th>
    </tr>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Report</h5>
        <small>Reports will be sent to the email associated with your ad account.</small>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm text-right">Report Name<NOFRAMES></NOFRAMES></label>
          <div class="col-sm-6">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm text-right">Level<NOFRAMES></NOFRAMES></label>
          <div class="col-sm-6">
            <p>Owner</p>
          </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm text-right">Account Name<NOFRAMES></NOFRAMES></label>
          <div class="col-sm-6">
            <p><?php echo $this->session->userdata('nama') ?></p>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm text-right">Schedule<NOFRAMES></NOFRAMES></label>
          <div class="col-sm-6">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">One Time</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Recurring</label>
            </div>
          </div>
        </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm text-right">Date Range<NOFRAMES></NOFRAMES></label>
          <div class="col-sm-6">
            <select class="form-control btn btn-sm" >
              <option>7 Days</option>
              <option>30 Days</option>
            </select>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#audience').DataTable();
});
</script>