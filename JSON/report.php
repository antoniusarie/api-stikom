<?php
require_once("functions.php");
require_once("json.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->noakses($iderror, $noref, $keterangan);

        return $report;
    }
    
    function tambahMahasiswa($nim, $noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->mahasiswa($nim, $iderror, $noref, $keterangan);

        return $report;
    }
    
    function hapusMahasiswa($iderror, $noref, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->hapus_mahasiswa($iderror, $noref, $keterangan);

        return $report;
    }

    function tampilMahasiswa($nim, $noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->mahasiswa($nim, $iderror, $noref, $keterangan);

        return $report;
    }
        
    function tampilSemuaMahasiswa($iderror, $noref, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->semua_mahasiswa($iderror, $noref, $keterangan);

        return $report;
    }

}
?>