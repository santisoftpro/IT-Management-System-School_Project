<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function func() {
            // swal("Request Sent!", "you'll receive convermation email", "success")
            swal("Good job!", "You clicked the button!", "success", {
                button: "Aww yiss!",

            }

            );

            window.location = "aler.php";

        }
    </script>

</head>


<body>

    <button onclick="func()">
        Show Something
    </button>
</body>

</html>