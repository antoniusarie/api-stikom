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
        $output = json_encode($infoData);
        return $output;
    }

    public function reports($noref, $iderror, $keterangan) {

        $function = new functions();

        if($iderror == '000') {
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
        $output = json_encode($infoData);
        return $output;
    }
}
?>