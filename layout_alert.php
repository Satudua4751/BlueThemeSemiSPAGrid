<?php
if (isset($_GET['err'])) {
    if ($_GET['err'] == 'empty') {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Username and password must !',
                confirmButtonColor: '#f0ad4e'
            });
        });
        </script>";
    } elseif ($_GET['err'] == 'failed') {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Fail!',
                text: 'Wrong Username or password.',
                confirmButtonColor: '#d33'
            });
        });
        </script>";
    }
}

if (isset($_GET['login']) && $_GET['login'] == 'sukses') {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Login Suksess!',
            text: 'Welcome Back!',
            confirmButtonColor: '#28a745'
        });
    });
    </script>";
}
