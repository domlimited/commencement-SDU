<?php 
session_start();
if(isset($_SESSION['i_student_id']) &&  $_SESSION['i_student_id'] != ''){
    echo "<script type='text/javascript'>";
    echo"window.location ='index.php';";
    echo "</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ระบบเข้ารับปริญญาบัตร มหาวิทยาลัยสวนดุสิต</title>
        <!-- เดิม -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ใหม่ -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">ระบบเข้ารับปริญญาบัตร มหาวิทยาลัยสวนดุสิต</h3>
                            <form action="Controllers/loginControllers.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="รหัสนักศึกษา" name="i_student_id" required>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password"
                                        placeholder="รหัสผ่านวันเดือนปีเกิด" required>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="login" value="login">เข้าสู่ระบบ</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                    </div>
                                    <div class="w-100 text-md-right">
                                        <label href="#" style="color: #fff">demo รหัสนักศึกษา: 61000 รหัสผ่าน: 26122542</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <?php
        if(isset($_GET['error'])){
        ?>
        <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <script>
        swal({
            title: "<?php echo $_GET['error']; ?>",
            icon: "error",
        });
        </script>
        <?php
        }
        ?>
  
    </body>
</html>