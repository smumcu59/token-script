<?php 

include 'islemler/baglan.php';
ob_start();
session_start();

if(isset($_GET['dogrulama'] ) && isset($_GET['id'])){
    $dogrulama_kodu = $_GET['dogrulama'];
    $uye_id = $_GET['id'];

    $veriyi_alsinsssp = $db->prepare("SELECT * FROM uyeler WHERE id=:id_kimlik AND guvenlik_kodu=:guvenlik_kodu");
    $veriyi_alsinsssp->execute(array(':id_kimlik' =>$uye_id,':guvenlik_kodu' => $dogrulama_kodu));
    $veriyi_ceksinsssp = $veriyi_alsinsssp->fetch(PDO::FETCH_ASSOC);
    $isim_soyisim = $veriyi_ceksinsssp['isim_soyisim'];
    $eposta = $veriyi_ceksinsssp['elektronik_posta_adresi'];
    $_SESSION['basarili-parola-sifirlama-eposta'] = $eposta;

    ?>
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archive Token - Parola Sıfırla</title>

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
                                        <h1 class="h4 text-gray-900 mb-4"><b>Archive Token Parola Sıfırla (<?php echo $isim_soyisim; ?>)</b></h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="yeni-parola" aria-describedby="emailHelp" 
                                                placeholder="Yeni parolanızı giriniz.." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" 
                                                name="yeni-parola-tekrar" placeholder="Yeni parolanızı tekrar giriniz.." required>
                                        </div>
                                       
                                        
                                        <input type="submit" class="btn btn-danger btn-user btn-block" name="parolayi-sifirla-isle" value="Devam Et">
                                           
                                        
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center" >
                                        <a class="small" id="forgot" href="kayit-ol">Kayıt Ol</a>
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




<?php
} else{
    header("location:../giris-yap");
    exit;
}


?>