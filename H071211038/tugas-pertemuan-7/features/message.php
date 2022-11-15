<?php
echo '<script src="assets/js/sweetalert2.min.js"></script>';
if (isset($_SESSION['msg'])) {
    echo '<script>swal.fire({
        title: "'.$_SESSION['msg'].'",
        icon: "'.$_SESSION['icon'].'",
      });</script>';
    unset($_SESSION['msg']);
}
?>