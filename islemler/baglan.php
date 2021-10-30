<?php 

try{

    $db = new PDO("mysql: host=localhost; dbname=u0262104_archive; charset=utf8","u0262104_user","ArchiveToken5934@",);
    


}catch (PDOException $mesaj) {
    echo $mesaj->getMessage();

}


try{
    $connect = mysqli_connect("localhost", "u0262104_user", "ArchiveToken5934@", "u0262104_archive");  
    
}catch (Exception $mesaji) {
    echo "Veritabanı altyapısında bağlantı hatası ile karşılaşıldı! Lütfen sistem geliştiricisi ile iletişime geçin!";
}

?>