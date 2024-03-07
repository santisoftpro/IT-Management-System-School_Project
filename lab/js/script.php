<?php

if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        swal({
            title: "<?php echo $_SESSION["msg"]; ?>",
            text: "thank you",
            icon: "<?php echo $_SESSION["status"]; ?>",
            button: "OK!",
        });
    </script>

    <?php

    unset($_SESSION["status"]);
}


?>