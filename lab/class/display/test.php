<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../../branch/session_branch.php';
    echo $branch_name;
    ?>
    <button><?php echo $branch_name; ?></button>
</body>
</html>