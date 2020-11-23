<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>012</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--css-->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <?php
            include './connect_db.php';
            $result = mysqli_query($con, "SELECT * FROM user");
            mysqli_close($con);
        ?>

        <div id="user-info">
            <h1>Danh sách tài khoản</h1>
            <a href="./create_user.php">Tạo tài khoản mới</a>
            <table id = "user-listing">
                <tr>
                    <td>MSSV</td>
                    <td>Họ Tên</td>
                    <td>Nhóm</td>
                    <td>Sửa</td>
                    <td>Xóa</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['fullname']?></td>
                        <td><?= ""?></td>
                        <td><a href="./edit_user.php?id=<?= $row['id'] ?>">Sửa</a></td>
                        <td><a href="./delete_user.php?id=<?= $row['id'] ?>">Xóa</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
