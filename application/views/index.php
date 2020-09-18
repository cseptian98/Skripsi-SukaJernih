<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <!doctype html>
    <html lang="en">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/Logo.png">
        <link href="<?php echo base_url() ?>assets/css/index_bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/index.css" rel="stylesheet">

        <title>KSM SUKA JERNIH</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">KSM SUKA JERNIH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#">Tagihan Air</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">

            <div class="row mt-3 justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">Masukan ID Pelanggan</h1>
                    <div class="input-group mb-3">
                        <input type="text" autofocus="on" class="form-control" placeholder="ID Pelanggan..." id="search-input">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="search-button">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div id="printThis">
            <div id="list-pelanggan" class="col" style="margin: auto; width: 90%">
            </div>
            </div>
            <div class="float-right">
            <button type="button" class="btn btn-primary" id="btnPrint">Cetak Tagihan</button>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="<?php echo base_url(); ?>assets/js/ind_jquery.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/ind_popper.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/ind_bootstrap.js"></script>
            <script>
            function cariTagihan() {
                $('#list-pelanggan').html('')
                $.ajax({
                    url: '<?php echo base_url('c_index/get_tagihan')?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        'id_pelanggan': $('#search-input').val()
                    },
                    success: function(response){
                    var len = response.length;
                    console.log(len);
                    if(len>0){
                        // Read values
                        var nama_petugas = response[0].nama_petugas;
                        var id_pelanggan = response[0].id_pelanggan;
                        var no_meteran = response[0].no_meteran;
                        var nama = response[0].nama;
                        var volume = response[0].volume;
                        var nominal = response[0].nominal;
                        var alamat = response[0].alamat;
                        var bulan = response[0].bulan;
                        var tahun = response[0].tahun;
                        
                                $('#list-pelanggan').append(`
                                <div class="col text-center bg-dark" style="color: white; padding: 3px;">
                                <h3>KELOMPOK SWADAYA MASYARAKAT (KSM)</h3>
                                <h3>SUKA JERNIH RW 02</h3>
                                <br>
                                <h6>Jalan. Kopo Gg.Melati III RT 04 RW 02 Kel. Margasuka. Telp. 085220256733</h6>                                
                                </div>
                                <br>
                                <h5 class="text-center">NOTA TAGIHAN PELANGGAN</h5>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table>
                                            <tr>
                                                <th width="70%">Nama Petugas</th>
                                                <td>`+ nama_petugas +`</td>
                                            </tr>
                                            <tr>
                                                <th width="70%">Nomor Meteran</th>
                                                <td>`+ no_meteran +`</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pelanggan</th>
                                                <td>`+ nama +`</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Pemakaian Air</th>
                                                <td>`+ volume +`</td>
                                            </tr>
                                            <tr>
                                                <th>Nominal Tagihan</th>
                                                <td>Rp. `+ nominal +`</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Keterangan :</h5>
                                        Pembayaran Paling lambat tanggal 10 setiap bulannya.<br>
                                        Keterlambatan sampai tanggal 20 dikenakan denda
                                        2% dari Nominal Tagihan.
                                        <br>
                                        <br>
                                        Bandung, `+ bulan +` `+ tahun +`
                                        <br>
                                        <img src="<?php echo base_url(); ?>assets/img/Logo.png" width="33%"></img>
                                    </div>
                                </div>
                                `)

                            $('#search-input').val('')
                        } else {
                            $('#search-input').val('')
                            $('#list-pelanggan').html(`
                            <div class="col">
                                <h1 class="text-center"> Data Tagihan Tidak Ada </h1>
                            </div>`)
                        }
                    }
                })
            }
            </script>
            <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    </body>
</html>