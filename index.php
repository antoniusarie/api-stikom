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
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>

	<!-- Font Awesome -->
	<script type="text/javascript" src="assets/js/all.min.js"></script>
	<script type="text/javascript" src="assets/js/fontawesome.min.js"></script>

	<script type="text/javascript" src="assets/js/jquery.json.js"></script>

    <script>
    $(document).ready(function() {

        var url = 'http://api.arie.id/services.php?fungsi=semua';
        $('#dt').DataTable( {
            "dom": '<"col-md-2">rft<"col-md-2" i>p',
            "ajax": url,
            "columns": [
                { "data": "nim" },
                { "data": "nama" },
                { "data": "alamat" }
            ],
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
        $.getJSON(url, function(data){
            $('#json').html(
                JSON.stringify(data, null, 3)
            );
        });

        $('#xml').html(url);

    });
    </script>
	
	<title>API PHP Native</title>
</head>

<body>

<div class="container" id="page" style="margin-top:3%">   

    <div class="row">
    <div class="col-md-12 text-center">
        <h2><strong>Output JSON & Datatables via API</strong></h2>  
    </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>JSON:</h3>
            <pre id="json"></pre>
        </div>
        <!-- <div class="col-md-6">
            <h3>XML:</h3>
            <pre id="xml"></pre>
        </div> -->
    <!-- </div>    -->
    <!-- <div class="row"> -->
        <div class="col-md-6">
            <h3>Datatables:</h3>
            <table id="dt" class="table table-striped table-hover table-condensed table-bordered responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>
        </div>
    </div>

</div>

</body>
</html>
