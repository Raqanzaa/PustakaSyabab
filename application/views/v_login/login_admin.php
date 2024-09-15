<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom_style.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.css'); ?>"> -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="form-container" style="padding-bottom: 70px;">
        <p class="title">Pustaka Syabab</p>
        <!-- <p><center>Login</center></p> -->

        <form class="user" method="post" action="<?= base_url('auth'); ?>">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="">
                <!-- <div class="forgot">
                    <a rel="noopener noreferrer" href="#">Forgot Password?</a>
                </div> -->
            </div><br>
            <button type="submit" class="sign">Sign in</button>

            <p class="signup">Belum mempunyai akun?
                <a rel="noopener noreferrer" href="<?= base_url('Auth/Registration'); ?>" class="">Daftar</a>
            </p>
        </form>

        <!-- <div class="social-message">
            <div class="line"></div>
            <p class="message">Login with social accounts</p>
            <div class="line"></div>
        </div>
        <div class="social-icons">
            <button aria-label="Log in with Google" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
				<path d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z"></path>
			</svg>
            </button>
        </div> -->
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
                background: '#1e1e1e', // Dark background
                color: '#ffffff', // White text
                iconColor: '#ff0000', // Red error icon
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
                background: '#1e1e1e', // Dark background
                color: '#ffffff', // White text
                iconColor: '#ffa500', // Orange warning icon
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