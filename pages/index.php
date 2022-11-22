<?php 
session_start(); 
include("../conn.php");
if(empty($_SESSION['i_student_id'])){
    session_destroy();
    echo "<script type='text/javascript'>";
    echo"window.location ='login.php';";
    echo "</script>";
}
$sql_information = "SELECT * FROM `information` WHERE `i_student_id` = '".$_SESSION['i_student_id']."'";
$query_information = mysqli_query($db, $sql_information);
$row_information = mysqli_fetch_assoc($query_information);
if($row_information){
    echo "<script type='text/javascript'>";
    echo "window.location ='report.php';";
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
        <style type="text/css">
        #tel_h3 {
            float:left;

        }
        #tel_input {
            float:left;
            width:255px;
        }
        #img_h3 {
            float:left;

        }
        #img_input {
            float:left;
            width:250px;
        }

    

        </style>
    </head>
    <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="login-wrap p-0">
                    <form action="Controllers/logoutControllers.php" class="signin-form">
                        <div class="col-md-12 col-lg-3 mb-4">
                            <button type="submit" class="form-control btn btn-primary submit px-3">ออกจากระบบ</button>
                        </div>
                    </form>
                    <form action="Controllers/informationControllers.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <div class="form-group">
                                    <h4 class="mb-4 text-white"><u>ข้อมูลส่วนตัว</u></h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 text-white">รหัสนักศึกษา : <?php echo $_SESSION['i_student_id']; ?></h5>
                                            <input type="hidden" class="form-control" 
                                            name="i_student_id" value="<?php echo $_SESSION['i_student_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 text-white">ระดับการศึกษา : <?php echo $_SESSION['i_level']; ?></h5>
                                            <input  type="hidden" class="form-control" 
                                            name="i_level" value="<?php echo $_SESSION['i_level']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 mr-2 text-white" id="tel_h3">เบอร์โทรศัพท์ :</h5>
                                            <input id="tel_input" type="number" class="form-control" placeholder="เบอร์โทร" name="i_tel" pattern="[0-9]{10}"
                                            required value="<?php echo $_SESSION['i_tel']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 mr-2 text-white" id="img_h3">รูปถ่ายชุดครุย :</h5>
                                            <input id="img_input" type="file" name="i_img" class="form-control" required accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 mt-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="i_radio" id="flexRadioDefault1" value="0" required>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                มีประสงค์เข้ารับปริญญา
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="i_radio" id="flexRadioDefault2" value="1" required>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                ไม่ประสงค์เข้ารับปริญญา
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 text-white">ชื่อ-นามสกุล : <?php echo $_SESSION['i_name']; ?></h5>
                                            <input  type="hidden" class="form-control" 
                                            name="i_name" value="<?php echo $_SESSION['i_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 text-white">คณะ : <?php echo $_SESSION['i_group']; ?></h5>
                                            <input  type="hidden" class="form-control" 
                                            name="i_group" value="<?php echo $_SESSION['i_group']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <h5 class="mb-4 text-white">สาขาวิชา : <?php echo $_SESSION['i_branch']; ?></h5>
                                            <input  type="hidden" class="form-control" 
                                            name="i_branch" value="<?php echo $_SESSION['i_branch']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="insert_i" value="insert_i" class="form-control btn btn-primary submit px-3">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
