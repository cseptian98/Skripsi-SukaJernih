<?php
  require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="refresh" content="2">
  </head>
    <body>
      <style>
        #wntable {
          border-collapse: collapse;
          width: 50%;
        }
 
        #wntable td, #wntable th {
          border: 1px solid #ddd;
          padding: 8px;
        }
 
        #wntable tr:nth-child(even){background-color: #f2f2f2;}
 
        #wntable tr:hover {background-color: #ddd;}
 
        #wntable th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #00A8A9;
          color: white;
        }
      </style>
 
      <div id="cards" class="cards" align="center">
          <h1> Data Penggunaan Air</h1>
          <img src="Logo.png" height="240px">
          <table id="wntable">
          <tr>
            <th>No</th>
            <th>Volume</th>
            <th>Tagihan</th>
          </tr>
          <?php
 
          $sql = mysqli_query($koneksi, "SELECT * FROM meteran where no_meteran = 1");
 
          if(mysqli_num_rows($sql) == 0){ 
            echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
          }else{ // jika terdapat entri maka tampilkan datanya
            $no = 1; // mewakili data dari nomor 1
            while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
              echo '
              <tr>
                <td>'.$no.'</td>
                <td>'.$row['volume'].'</td>
                <td>'.$row['nominal'].'</td>
              </tr>
              ';
              $no++; // mewakili data kedua dan seterusnya
            }
          }
          ?>
        </table>
      </div>
  </body>
</html>