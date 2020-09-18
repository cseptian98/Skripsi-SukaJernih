<?php
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_sukajernih";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $volume = test_input($_POST["volume"]);
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
        echo $volume;
        echo '<br>';
        echo $total_tagihan;
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE meteran SET volume = $volume, nominal = $total_tagihan WHERE no_meteran = 1 ";
        
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