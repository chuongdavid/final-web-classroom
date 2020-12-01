
<?php

    require_once __DIR__. "/autoload/autoload.php";

    $conn = mysqli_connect("localhost","root","","final-cnpm-voucher") // Kết nối insert-báo lỗi kết nối,này làm hoặc bỏ đều được nha.Có 2 cách làm,a cũng k rõ nữa

    // xử lý
    $name = $email = $ password = $ address = $phone = ' ';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['name'])&& $_POST['name'] != NULL)
        {
            $name = $_POST['name'];

        }
        if($name == '')
        {
            $error['name'] = " Tên không được để trống !";
        }

        if(isset($_POST['email'])&& $_POST['email'] != NULL)
        {
            $email = $_POST['email'];

        }
        if($email == '')
        {
            $error['email'] = " Email được để trống !";
        }
        if(isset($_POST['phone'])&& $_POST['phone'] != NULL)
        {
            $phone = $_POST['phone'];

        }
        if($phone == '')
        {
            $error['phone'] = " Phone được để trống !";
        }
        if(isset($_POST['password'])&& $_POST['password'] != NULL)
        {
            $password= $_POST['password'];

        }
        if($password == '')
        {
            $error['password'] = " password được để trống !";
        }
        if(isset($_POST['address'])&& $_POST['address'] != NULL)
        {
            $address = $_POST['address'];

        }
        if($address == '')
        {
            $error['address'] = " Địa chỉ không được để trống !";
        }

        //kiểm tra mảng  error

        if(empty($error))
        {
            $sql = " INSERT INTO users(name,email,password,phone,address) VALUES('".$name."','".$email."','".MD5($password)."','".$phone."','".$address."')"
            $insert = mysqli_query($conn,$sql) on die ("Thêm mới thất bại")
        }
        else
        {
            //nhập đầy đủ
        }

    }

?>
    <?php reqiore_once __DIR__. "/layouts/header.php";?>
        <div class = "col-md-9 bor">

            <section class="box-main1">
                <h3 class = "title-main"><a href=""> Đăng ký thành viên </a> </h3>
                <form action="" method="POST" class= "form-horizontal formcustome" role="form" style="margin-top: 20px">

                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Tên thành viên</label>
                        <div class= "col-md-8">
                            <input type= " text" name="name" placeholder=" Nguyễn Thiên Ân" class="form-control" value="<?php echo $name ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class= "form-group">
                        <label class="col-md-2 col-md-offset-1"> Email </label>
                        <div class="col-md-8">
                            <input type="email" name="email" placeholder="annguyen@gmail.com" class="form-control"value="<?php echo $email ?>">
                            <?php if(isset($error['email'])): ?>
                                <p class="text-danger"><?php echo $error['email'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class= "form-group">
                        <label class="col-md-2 col-md-offset-1"> Mật Khẩu </label>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="**********" class="form-control" value="<?php echo $password ?>">
                            <?php if(isset($error['password'])): ?>
                                <p class="text-danger"><?php echo $error['password'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class= "form-group">
                        <label class="col-md-2 col-md-offset-1"> Số điện thoại </label>
                        <div class="col-md-8">
                            <input type="number" name="phone" placeholder="0909123456" class="form-control"value="<?php echo $phone ?>">
                            <?php if(isset($error['phone'])): ?>
                                <p class="text-danger"><?php echo $error['phone'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class= "form-group">
                        <label class="col-md-2 col-md-offset-1"> Địa Chỉ </label>
                        <div class="col-md-8">
                            <input type="text" name="address" placeholder=" Xóm 2 Lan Quế Phường" class="form-control"value="<?php echo $address ?>">
                            <?php if(isset($error['address'])): ?>
                                <p class="text-danger"><?php echo $error['address'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <button type="submit" class= "btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">
                    Đăng ký</button>
                </form>

                <!--noi dung -->
            
            </section>
        </div> 
    <?php require_once __DIR__. "/layouts/footer.php"; ?>   