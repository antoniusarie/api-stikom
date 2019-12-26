<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.dataTables.min.css"/>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.responsive.min.js"></script>

    <!-- Font Awesome -->
    <script type="text/javascript" src="assets/js/all.min.js"></script>
    <script type="text/javascript" src="assets/js/fontawesome.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.json.js"></script>

    <script>
    $(document).ready(function() {

        var alltrx = 'http://api.andynar.me/services.php?fungsi=alltrx';
        $('#dt').DataTable( {
            "dom": '<"col-md-2">rt<"col-md-2" i>p',
            "ajax": alltrx,
            "responsive":true,
            "columns": [
                { "data": "NO" },
                { "data": "DESKRIPSI" },
                { "data": "KREDIT" },
                { "data": "DEBET" },
                { "data": "SALDO" }
            ],
            "columnDefs": [
            { 
              "className": "saldo",
              "targets": [4], 
            },
            { 
              "className": "debet",
              "targets": [3], 
            },
            { 
              "className": "kredit",
              "targets": [2], 
            },
            {
              "targets": [2,3,4],
              "render": function(data, type, row) {
                return Number(data).toLocaleString('id-ID', 
                    {
                      maximumFractionDigits: 2,
                      style: 'currency',
                      currency: 'IDR'
                    });
                }
            }
            ],
            "createdRow": function(row, data, index)
            {      
                $('td.saldo', row).eq(0).css(
                {
                  'color': 'navy',
                  'font-weight': 'bold'
                });
                $('td.debet', row).eq(0).css(
                {
                  'color': 'crimson',
                  'font-weight': 'bold'
                });
                $('td.kredit', row).eq(0).css(
                {
                  'color': 'green',
                  'font-weight': 'bold'
                });
            },
            "pageLength": 15, 
            "language":{
                "search": "",
                "lengthMenu": "Tampil _MENU_ baris",
                "searchPlaceholder": "Cari...",
                "loadingRecords": "&nbsp;",
                "zeroRecords": "Tidak ada data",
                "processing": "Memproses...",
                "infoEmpty": "Tidak ada data ",
                "info": "<strong>_TOTAL_</strong> Data | baris <strong>_START_</strong> s/d <strong>_END_</strong>",
                "infoFiltered": "| disaring dari total <strong id='red'>_MAX_</strong> baris",
                "paginate":
                    {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
            }
        });
        
        /* Print JSON di tag HTML DIV */
        $.getJSON(alltrx, function(data){
            $('#json').html(
                JSON.stringify(data, null, 3)
            );
        });

        var contoh ='{"fungsi":"addtrx","deskripsi": "bonus","nominal":"10000000"}';
        $.getJSON(contoh, function(data){
            $('#contoh').html(
                JSON.stringify(data, null, 3)
            );
        });

    });
    </script>
    
    <title>API PHP Native</title>
</head>

<body>

<div class="container-fluid" id="page" style="margin-top:3%">   

    <div class="row">
    <div class="col-md-12 text-center">
        <h2><strong>API (JSON & Datatables)</strong></h2>  
    </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        <h3>Parameter API</h3>
        <div class="well">
            <ol>
                <li>php file : <strong>services.php</strong></li>
                <li>url : <strong>http://localhost/api/services.php</strong></li>
                <li>Parameter key :</li>
                    <ul>
                        <li><strong>fungsi</strong></li>
                        <ul>
                            <li>Tambah/Kredit Transaksi : <strong>addtrx</strong></li>
                            <li>Kurang/Debet Transaksi : <strong>mintrx</strong></li>
                            <li>Semua Transaksi : <strong>alltrx</strong></li>
                            <li>Total (Kredit/Debet) Transaksi : <strong>sumtrx</strong></li>
                        </ul>
                        <li><strong>deskripsi</strong> : Keterangan transaksi</li>
                        <li><strong>nominal</strong> : Nilai (angka) transaksi</li>
                    </ul>
            </ol>
        </div>
        
        <h3>Method POST (Postman)<br></h3>
        <small><strong>Body > Raw > JSON</strong></small>
        
        <div class="row">
        <div class="col-md-6">
        <div class="well">
            <h5>
                {
                <br>
                &emsp;"fungsi" : "addtrx",<br>
                &emsp;"deskripsi" : "bonus",<br>
                &emsp;"nominal" : "10000000"<br>
                }
            </h5>
        </div>
        </div>
        <div class="col-md-6">
        <div class="well">
            <h5>
                {
                <br>
                &emsp;"fungsi" : "mintrx",<br>
                &emsp;"deskripsi" : "belanja",<br>
                &emsp;"nominal" : "7500000"<br>
                }
            </h5>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
        <div class="well">
            <h5>
                {
                <br>
                &emsp;"fungsi" : "alltrx"<br>
                }
            </h5>
        </div>
        </div>
        <div class="col-md-6">
        <div class="well">
            <h5>
                {
                <br>
                &emsp;"fungsi" : "sumtrx"<br>
                }
            </h5>
        </div>
        </div>
        </div>

        </div>

        <div class="col-md-4">
            <h3>JSON<br></h3>
            <small><strong>(alltrx)</strong></small>
            <pre id="json" style="max-height:620px"></pre>
        </div>

        <div class="col-md-5">
        <?php
        include("koneksi.php");
        require("JSON/functions.php");
        
        $function = new functions();
        $data = $function->get_sum_trx();
        $saldo = $function->get_saldo();
        // var_dump($data);
        ?>

        
        <h3>Datatables<br></h3>
        <small><strong>(sumtrx)</strong></small>

        <table class="table table-striped table-hover table-condensed table-bordered responsive nowrap">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: green;color: white">Total Kredit</th>
                    <th class="text-center" style="background-color: crimson;color: white">Total Debet</th>
                    <th class="text-center" style="background-color: navy;color: white">Saldo Akhir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><strong><?php echo "Rp. ".number_format($data[0]["TOTAL KREDIT"],2); ?></strong></td>
                    <td class="text-center"><strong><?php echo "Rp. ".number_format($data[0]["TOTAL DEBET"],2); ?></strong></td>
                    <td class="text-center"><strong><?php echo "Rp. ".number_format($saldo,2); ?></strong></td>
                </tr>
            </tbody>
        </table>
        
        <small><strong>(addtrx / mintrx)</strong></small>
        <table id="dt" class="table table-striped table-hover table-condensed table-bordered responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Kredit</th>
                    <th class="text-center">Debet</th>
                    <th class="text-center">Saldo</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>

    </div>

</div> <!-- container -->

</body>
</html>