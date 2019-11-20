<?php
require_once("functions.php");

class JSON {
    
    public function semua($iderror, $noref, $keterangan) {

        $func = new functions();

        if($iderror == '000') {
            $data = $func->getsemuasiswa();
            $json = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref,
                'data' => $data
            );
        } else {
            $json = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref
            );
        }
        $reportJSON = json_encode($json);
        return $reportJSON;
    } 

    public function siswa($nis, $iderror, $noref, $keterangan) {

        $func = new functions();

        if($iderror == '000') {
            $data = $func->getdatasiswa($nis);
            $json = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref,
                'data' => $data
            );
        } else {
            $json = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref
            );
        }
        $reportJSON = json_encode($json);
        return $reportJSON;
    }

    public function noakses($iderror, $noref, $keterangan) {
        
        $items = array($noref, $iderror, $keterangan);
        $json = array(
            'keterangan' => $keterangan,
            'data' => $items
        );
        $reportJSON = json_encode($json);
        return $reportJSON;
    }
    
}

?>