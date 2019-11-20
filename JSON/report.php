<?php
require_once("functions.php");
require_once("json.php");

class report {

    function reportNoAkses($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->noakses($iderror, $noref, $keterangan);

        return $report;
    }

    function reportTambahSiswa($nis, $noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->siswa($nis, $iderror, $noref, $keterangan);

        return $report;
    }

    function reportViewSiswa($nis, $noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->siswa($nis, $iderror, $noref, $keterangan);

        return $report;
    }
    
    function reportViewAllSiswa($iderror, $noref, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->semua($iderror, $noref, $keterangan);

        return $report;
    }

}
?>