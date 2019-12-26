<?php
include("koneksi.php");
/* OPTION */

/* Method POST atau GET - Uncomment sesuai kebutuhan */
// $method = "POST";
$method = "GET";

/* Report JSON atau XML - Uncomment sesuai kebutuhan */
$report = "JSON";
// $report = "XML";

/**************************************** API ***********************************************/

/* HTTP Method */
if($method == "POST") {

    /* Method POST */
    $data = trim(file_get_contents("php://input"));
    // $cdata = preg_replace("/&#?[a-z0-9]+;/i", "", json_decode ($data, TRUE), true);
    // $ipaddress = $_SERVER['REMOTE_ADDR'];
    // $iplist = array("localhost", "127.0.0.1", "addIP", "Linux");
    $cdata = json_decode($data, true);
    
    foreach ($cdata as $key => $item) {
        if(strtolower($key) == "fungsi") {
            $fungsi = $item;
        } 
        if(strtolower($key) == "nominal") {
            $nominal = $item;
        } 
        if(strtolower($key) == "deskripsi") {
            $deskripsi = $item;
        } 
    }

} else { 

    /* Method  GET */
    $nominal = isset($_GET["nominal"]) ? $_GET["nominal"] : null;
    $deskripsi = isset($_GET["deskripsi"]) ? $_GET["deskripsi"] : null;
    $fungsi = isset($_GET["fungsi"]) ? $_GET["fungsi"] : null;
}

/* View Reports */
if($report == "JSON"){
    require_once("JSON/report.php");   
    require_once('JSON/functions.php');
} else {
    require_once("XML/report.php");    
    require_once("XML/functions.php");
}

/* Log Script */
include("log.php");


if(strtolower($fungsi) == "addtrx")
{
    addtrx($method, $nominal, $deskripsi);
} 
elseif (strtolower($fungsi) == 'mintrx') {
    mintrx($method, $nominal, $deskripsi);
}
elseif (strtolower($fungsi) == 'alltrx') {
    alltrx($method);
}
elseif (strtolower($fungsi) == 'sumtrx') {
    sumtrx($method);
} else {
    noAkses($method);
}

function noAkses($report) {
    $function = new functions();
    $reports = new result();
    $iderror = "301";
    $keterangan = "Fungsi Gagal atau Fungsi Tidak Ditemukan";
    $noref = $function->getNoRef();
    echo $reports->noAkses($noref, $iderror, $keterangan);
}

function addtrx($report, $nominal, $deskripsi) {
    $function = new functions();
    $reports = new result();
    $last_saldo = $function->get_saldo();
    $iderror = "200";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();

    $saldo = $last_saldo + $nominal;
    $function->addtrx($nominal, $deskripsi, $saldo);

    echo $reports->addtrx($noref, $iderror, $keterangan);
}

function mintrx($report, $nominal, $deskripsi) {
    $function = new functions();
    $reports = new result();
    $last_saldo = $function->get_saldo();
    $iderror = "200";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();

    $saldo = $last_saldo - $nominal;
    $function->mintrx($nominal, $deskripsi, $saldo);

    echo $reports->mintrx($noref, $iderror, $keterangan);
}

function alltrx($report) {
    $function = new functions();
    $reports = new result();
    $iderror = "200";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();

    echo $reports->alltrx($noref, $iderror, $keterangan);
}

function sumtrx($report) {
    $function = new functions();
    $reports = new result();
    $iderror = "200";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();

    echo $reports->sumtrx($noref, $iderror, $keterangan);
}
?>