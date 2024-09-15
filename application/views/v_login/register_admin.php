<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom_style.css'); ?>">
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>
    <div class="form-container" style="padding-bottom: 70px;">
        <p class="title">Pustaka Syabab - Admin Registration</p>

        <!-- Display flash messages if any -->
        <!-- <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?> -->

        <!-- Registration Form -->
        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
            
            <!-- Input Full Name -->
            <div class="input-group">
                <label for="nama_admin">Full Name</label>
                <input type="text" name="nama_admin" id="nama_admin" placeholder="Enter your full name" value="<?= set_value('nama_admin'); ?>" required>
                <!-- Display error message -->
                <?= form_error('nama_admin', '<small class="text-danger">', '</small>'); ?>
            </div>
            
            <!-- Input Username -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Choose a username" value="<?= set_value('username'); ?>" required>
                <!-- Display error message -->
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>

            <!-- Input Phone Number -->
            <div class="input-group">
                <label for="no_hp_admin">Phone Number</label>
                <input type="text" name="no_hp_admin" id="no_hp_admin" placeholder="Enter your phone number" value="<?= set_value('no_hp_admin'); ?>" required>
                <!-- Display error message -->
                <?= form_error('no_hp_admin', '<small class="text-danger">', '</small>'); ?>
            </div>

            <!-- Input Password -->
            <div class="input-group">
                <label for="password1">Password</label>
                <input type="password" name="password1" id="password1" placeholder="Enter a password" required>
                <!-- Display error message -->
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2" placeholder="Confirm your password" required>
                <!-- Display error message -->
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
            </div><br>

            <!-- Submit Button -->
            <button type="submit" class="sign">Register</button>
        </form>

    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Success alert in dark mode
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo $this->session->flashdata('success'); ?>',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-start',
                toast: true,
                background: '#1e1e1e',
                color: '#ffffff',
                iconColor: '#00ff00',
                customClass: {
                    popup: 'swal2-verdana',
                    title: 'swal2-verdana',
                    content: 'swal2-verdana'
                }
            });
        <?php endif; ?>

        // Error alert in dark mode
        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $this->session->flashdata('error'); ?>',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-start',
                toast: true,
                background: '#1e1e1e',  // Dark background
                color: '#ffffff',  // White text
                iconColor: '#ff0000',  // Red error icon
                customClass: {
                    popup: 'swal2-verdana',
                    title: 'swal2-verdana',
                    content: 'swal2-verdana'
                }
            });
        <?php endif; ?>

        // Validation errors in dark mode
        <?php if ($this->session->flashdata('validation_errors')): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Validation Errors',
                html: '<?php echo $this->session->flashdata('validation_errors'); ?>',
                timer: 5000,
                showConfirmButton: true,
                position: 'top-start',
                toast: true,
                background: '#1e1e1e',  // Dark background
                color: '#ffffff',  // White text
                iconColor: '#ffa500',  // Orange warning icon
                customClass: {
                    popup: 'swal2-dark-popup',
                    title: 'swal2-dark-title',
                    content: 'swal2-dark-content'
                }
            });
        <?php endif; ?>
    });
</script>


</html>
