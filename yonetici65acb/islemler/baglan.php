<?php 

try{

    $db = new PDO("mysql: host=localhost; dbname=tikokul_archive; charset=utf8","tikokul","19216801",);
    


}catch (PDOException $mesaj) {
    echo $mesaj->getMessage();

}


try{
    $connect = mysqli_connect("localhost", "tikokul", "19216801", "tikokul_archive");  
    
}catch (Exception $mesaji) {
    echo "Veritabanı altyapısında bağlantı hatası ile karşılaşıldı! Lütfen sistem geliştiricisi ile iletişime geçin!";
}

?>