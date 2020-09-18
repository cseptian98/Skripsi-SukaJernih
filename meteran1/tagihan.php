<?php
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sukajernih";

    date_default_timezone_set("Asia/Bangkok");

    $no_tagihan = date(YmdHis);
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $volume = test_input($_POST["volume"]);
        $bulan = test_input($_POST["bulan"]);
        $tahun = test_input($_POST["tahun"]);
        $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
        if ($volume <= 10) {
          $tagihan = $volume * 2000 ; 
        } 
        if ($volume > 10 && $volume <= 20) {
          $tagihan = $volume * 2500;
        }
        if ($volume > 20){
          $tagihan = $volume * 2750;
        }
        $total_tagihan = 10000 + $tagihan;
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO tagihan (no_tagihan, no_meteran, id_petugas, volume, nominal, bulan, tahun, status_tagihan) 
        VALUES ('TAG-$no_tagihan', 1, 'PTG-20200826133041', $volume, $total_tagihan, '$bulan', $tahun, 'Belum Lunas')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    } else {
        echo "No data posted with HTTP POST.";
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>