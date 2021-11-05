<?php
session_start();
ob_start();
include 'portal/islemler/baglan.php';



if(isset($_SESSION['dil'])){
    $dil = $_SESSION['dil'];
    if($dil == 1){
        include 'portal/diller/turkish.php';
    }
    else if($dil == 2){
        include 'portal/diller/turkish.php';
    }
    else{
        include 'portal/diller/turkish.php';
    }
}

 




if (isset($_SESSION['kayıt-basarili'])){
    echo <<<EOF
    <div class="alert alert-success" role="alert">
    Kayıt İşlemi Başarıyla Tamamlandı! Şimdi girmiş olduğunuz bilgilere göre giriş yapabilirsiniz.
    </div>
    EOF;
    unset($_SESSION['kayıt-basarili']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $dil['giris-yap-baslik'] ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    #forgot {
        color: orangered;
    }




</style>
<body class="bg-gradient-primary">

    <div class="container">
        <form action="portal/islemler/islem.php" class="user" method="POST">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b><?php echo $dil['giris-yap-baslik'] ?></b></h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="elektronikPosta" aria-describedby="emailHelp"
                                                placeholder="<?php echo $dil['e-posta-girin'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="parola" placeholder="<?php $dil['parola-girin'] ?>" required>
                                        </div>
                                       
                                        
                                        <input type="submit" class="btn btn-danger btn-user btn-block" name="normal-giris" value="<?php echo $dil['giris-yap-buton'] ?>">
                                           
                                        
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center"  >
                                        <a class="small" id="forgot" href="parolami-unuttum"><?php echo $dil['portal-parolami-unuttum'] ?></a>
                                    </div>
                                    <div class="text-center" >
                                        <a class="small" id="forgot" href="kayit-ol"><?php echo $dil['kayit-ol'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>