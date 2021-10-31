<?php

?>

<!DOCTYPE html>
<html lang="en">
<style>

.bg-gradient-orange
{
    background-color: #F58230;
}




</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $dil['kayit-ol-baslik'] ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-orange">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><b><?php echo $dil['kayit-ol-baslik'] ?></b></h1>
                            </div>
                            <form class="user" action="portal/islemler/islem.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    
                                        <input type="text" class="form-control form-control-user" id="isim" name="kullanici_isim_soyisim"
                                            placeholder="<?php echo $dil['kayit-ol-isim-soyisim'] ?>." required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="parolaa" name="parola"
                                            placeholder="<?php echo $dil['parola-girin'] ?>" required>
                                    
                                    </div>
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="epp" name="eposta"
                                        placeholder="<?php echo $dil['e-posta-girin'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="refemail" class="form-control form-control-user" id="epp" name="referans"
                                        placeholder="<?php echo $dil['referans-kullanici-mail'] ?>">
                                </div>

                                
                                <input type="submit" class="btn btn-danger btn-user btn-block" name="kayit-ol" value="<?php echo $dil['kayit-ol-buton'] ?>">
                                <hr>
                                <div class="text-center">
                                <a class="small" href="parolami-unuttum"><?php echo $dil['portal-parolami-unuttum'] ?></a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="giris-yap"><?php echo $dil['zaten-bir-hesabin-mi-var'] ?></a>
                            </div>
                                </div>
                                
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

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