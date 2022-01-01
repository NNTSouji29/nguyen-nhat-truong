<?php
if (isset($_POST['submit'])){
    sendMail();
}
function sendMail(){
    require "model/PHPMailer-master/src/PHPMailer.php";
    require "model/PHPMailer-master/src/SMTP.php";
    require 'model/PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'truongnntcs20026@fpt.edu.vn'; // SMTP username
        $mail->Password = 'anjopigwdzsedtdx';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL
        $mail->Port = 465;  // port to connect to
        $mail->FromName = $_POST['name'];
        $mail->setFrom('truongnntcs20026@fpt.edu.vn', $_POST['name'] );
        $mail->addAddress('truongnntcs20026@fpt.edu.vn', 'Nguyen Nhat Truong'); //mail và tên người nhận
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $content = "Email: {$_POST['email']}<br/>
                    Message: {$_POST['message']}";
        $mail->Body = $content;



        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo '<h2>Thank you, we will get back to you soon!</h2>';
    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include 'blooks/head.php'?>
<body>
<div id = "fb-root" ></div> <script async defer crossorigin = "anonymous" src = "https://connect.facebook.net/en_VN/sdk.js#xfbml=1&version=v12.0" nonce = "x5ekWeXw" ></script>

<?php include_once 'blooks/header.php'?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2013096.4630001653!2d104.63741023354363!3d9.780530046316407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3a9d97282b%3A0x45e74ca0fc0300dc!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgdGjhu5FuZyDEkcOgbyB04bqhbyBM4bqtcCB0csOsbmggdmnDqm4gcXXhu5FjIHThur8gQXB0ZWNo!5e0!3m2!1svi!2s!4v1640227825856!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <?php if (!empty($errors)){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i>Error</h5>
                            <ul>
                                <?php foreach ($errors as $error){ ?>
                                    <li><?php echo $error ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>ShopTruong.</p>
                        <p>phuoc vinh chau thanh tay ninh</p>
                        <p>Viet Nam</p>
                        <p>Mobile: +84 355 130 171</p>
                        <p>Fax: </p>
                        <p>Email: truongnntcs20026@fpt.edu.vn</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "fb-comments" data-href = "http://localhost/eproject/index.php?p=contact" data-width = "500" data-numposts = "5" ></div>



    <script src="../public/js/jquery.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="../public/js/gmaps.js"></script>
<script src="../public/js/contact.js"></script>
<script src="../public/js/price-range.js"></script>
<script src="../public/js/jquery.scrollUp.min.js"></script>
<script src="../public/js/jquery.prettyPhoto.js"></script>
<script src="../public/js/main.js"></script>
</body>
</html>