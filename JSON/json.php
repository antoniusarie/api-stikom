<?php
require_once("functions.php");

class JSON {
    
    public function semua_mahasiswa($iderror, $noref, $keterangan) {

        $function = new functions();

        if($iderror == '000') {
            $data = $function->get_semua_mahasiswa();
            $infoData = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref,
                'data' => $data
            );
        } else {
            $infoData = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref
            );
        }
        header('Content-Type: application/json');
        $output = json_encode($infoData);
        return $output;
    } 

    public function mahasiswa($nim, $iderror, $noref, $keterangan) {

        $function = new functions();

        if($iderror == '000') {
            $data = $function->get_data_mahasiswa($nim);
            $infoData = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref,
                'data' => $data
            );
        } else {
            $infoData = array(
                'keterangan' => $keterangan,
                'kodeid' => $iderror,
                'nomorref' => $noref
            );
        }
        header('Content-Type: application/json');
        $output = json_encode($infoData);
        return $output;
    }
    
    public function noakses($iderror, $noref, $keterangan) {
        
        $items = array($noref, $iderror, $keterangan);
        $infoData = array(
            'keterangan' => $keterangan,
            'data' => $items
        );
        header('Content-Type: application/json');
        $output = json_encode($infoData);
        return $output;
    }
    
}

?>