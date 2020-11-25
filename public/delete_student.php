<!DOCtype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--title-->
        <title>Classroom</title>

        <!--css file-->
        <link href="css/style.css?v=<?= time();?>" rel="stylesheet" type="text/css" />

        <!--js file-->
        <script src="main.js"></script>

        <!--Bootstrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <!--font-awnsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
    <?php
        $error = false;
        if (isset($_GET['student']) && !empty($_GET['student'])) {
            include './connect_db.php';
            $result = mysqli_query($con, "DELETE FROM `student_class` WHERE `id_student` = " . $_GET['student']);
            if (!$result) {
                $error = "Không thể xóa sinh viên.";
            }
            mysqli_close($con);
            if ($error !== false) {
                ?>
            <!--....-->
                <div id="error-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./index.php">Danh sách sinh viên</a>
                </div>

            <?php } else { ?>
            <!--....-->
                <div id="success-notify" class="box-content">
                    <h1>Xóa tài khoản thành công</h1>
                    <a href="./people.php?id=<?php echo $_GET['id'] ?>">Danh sách sinh viên</a>
                </div>

            <?php } ?>
        <?php } ?>
    </body>
</html>
