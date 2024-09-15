<section class="content-header">
<!-- Success Alert with Close Button -->
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Error Alert with Close Button -->
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Validation Errors Alert with Close Button -->
<?php if ($this->session->flashdata('validation_errors')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('validation_errors'); ?>
        <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
