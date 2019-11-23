<?php
require_once("functions.php");

class JSON {
    
    public function semua_mahasiswa($iderror, $noref, $keterangan) {

        $function = new functions();

        if($iderror == '000') {
            $data = $function->get_semua_mahasiswa();
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
        header('Content-Type: application/json');
        $reportJSON = json_encode($json);
        return $reportJSON;
    } 

    public function mahasiswa($nim, $iderror, $noref, $keterangan) {

        $function = new functions();

        if($iderror == '000') {
            $data = $function->get_data_mahasiswa($nim);
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
        header('Content-Type: application/json');
        $reportJSON = json_encode($json);
        return $reportJSON;
    }
    
    public function noakses($iderror, $noref, $keterangan) {
        
        $items = array($noref, $iderror, $keterangan);
        $json = array(
            'keterangan' => $keterangan,
            'data' => $items
        );
        header('Content-Type: application/json');
        $reportJSON = json_encode($json);
        return $reportJSON;
    }
    
}

?>