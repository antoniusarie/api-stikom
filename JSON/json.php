<?php
require_once("functions.php");

class JSON {

    public function noakses($iderror, $noref, $keterangan) {
        
        $infoData = array(
            'kodeid' => $iderror,
            'nomorref' => $noref,
            'keterangan' => $keterangan,
        );
        
        header('Content-Type: application/json');
        return json_encode($infoData);
    }

    public function reports($noref, $iderror, $keterangan) {

        $function = new functions();

        if($iderror == '200') {
            $data = $function->get_data();
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
        return json_encode($infoData);
    }
}
?>