<?php
require_once("functions.php");
require_once("json.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->noakses($noref, $iderror, $keterangan);

        return $report;
    }

    function addtrx($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->reports($noref, $iderror, $keterangan);

        return $report;
    }
    
    function mintrx($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        $report = $JSON->reports($noref, $iderror, $keterangan);

        return $report;
    }
}
?>