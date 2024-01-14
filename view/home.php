<?php include $_SERVER['DOCUMENT_ROOT'].'/manage-library/session.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include './common/styles/common.php'?>
    <title>Home</title>
</head>
<body>
<?php include './common/main_header.php' ?>
<div class="container">

    <header>
        <h2>Tên login: <?php echo $login_name ?></h2>
        <p>Thời gian login: <?php echo $login_time ?></p>
    </header>
</div>

</body>
</html>
