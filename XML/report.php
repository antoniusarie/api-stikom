<?php
require_once("functions.php");
require_once("xml.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->noakses($iderror, $noref, $keterangan);

        return $report;
    }

    function addtrx($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->reports($noref, $iderror, $keterangan);

        return $report;
    }
    
    function mintrx($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->reports($noref, $iderror, $keterangan);

        return $report;
    }    
}
?>