<?php if ($this->session->userdata('message') != null): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $this->session->userdata('message'); ?>
  </div>
<?php endif ?>