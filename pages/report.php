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
if(!$row_information){
    echo "<script type='text/javascript'>";
    echo "window.location ='index.php';";
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
        #tel_button {
            float:left;
            width:70px;
            height: 40px;
        }

        @media print {
            #hid {
                display: none;
            }
            #tel_button {
                display: none;
            }
            #input_img {
                width: 300px;
            }
            @page {
                margin: -2cm;
                size: A4 landscape;
            }
        }

        </style>
    </head>
    <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="login-wrap p-0">
                    <div class="row">
                        <div class="col-md-12 col-lg-3">
                            <form action="Controllers/logoutControllers.php" class="signin-form">
                                <button type="submit" class="form-control btn btn-primary submit px-3" id="hid">ออกจากระบบ</button>
                            </form>
                        </div>
                        <div class="col-md-12 col-lg-6">
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <button type="submit" class="form-control btn btn-primary submit" id="hid" onClick="window.print()">ปริ้น</button>
                        </div>
                    </div>
                    <div id="div_print">
                        <div class="col-md-12 col-lg-3">
                            <h3 class="mb-4 text-white">ข้อมูลนักศึกษา</h3>
                        </div>
                        <div class="row justify-content-center">
                            <center>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <img class="card-img-top" id="input_img" width="auto" height="200" src="images/<?php echo $row_information['i_img']; ?>" alt=".">
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white"><?php echo $row_information['i_name']; ?></h4>
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white"><button id="tel_button" data-toggle="modal" data-target="#edit_tel" type="button" class="form-control btn btn-primary submit px-3 mr-3" >แก้ไข</button> เบอร์โทรศัพท์ : <?php echo $row_information['i_tel']; ?></h4>
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white">รหัสนักศึกษา :<?php echo $row_information['i_student_id']; ?></h4>
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white">ระดับการศึกษา :<?php echo $row_information['i_level']; ?></h4>
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white">คณะ :<?php echo $row_information['i_group']; ?></h4>
                                </div>
                                <div class="form-group">
                                    <h4 class="mb-4 text-white">สาขาวิชา :<?php echo $row_information['i_branch']; ?></h4>
                                </div>
                            </div>
                            </center>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <h4 class="mb-4 text-white">หมายเหตุ :<?php if($row_information['i_radio'] == '0'){echo"มีประสงค์เข้ารับปริญญา";}else if($row_information['i_radio'] == '1'){echo"ไม่ประสงค์เข้ารับปริญญา";} ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="edit_tel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-secondary">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="exampleModalLabel">เบอร์โทรศัพท์</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="Controllers/informationControllers.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <input id="tel_input" type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="i_tel" pattern="[0-9]{10}"
                                            required value="<?php echo $row_information['i_tel']; ?>">
                                <input id="tel_input" type="hidden" class="form-control"  name="i_id" 
                                             value="<?php echo $row_information['i_id']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" value="edit_tel" name="edit_tel">ยืนยัน</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end Modal -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        </script>
        <?php
        if(isset($_GET['msg'])){
        ?>
        <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <script>
        swal({
            title: "<?php echo $_GET['msg']; ?>",
            icon: "success",
        });
        </script>
        <?php
        }
        ?>
    </body>
</html>