<?php

if(isset($_POST['id'])){
    $anggota = $this->db->findOne([
        "where" => [
            "=",
            "nrp",
            $_POST['id'],
        ],
    ], "anggota");
    $response = $this->db->delete("anggota", [
        "=",
        "nrp",
        $anggota->nrp,
    ]);
    
    if(isset($response)){
    
        if($response){
            header("location: ?module=anggota&routes=index&delete-success=true");
        }else{
            header("location: ?module=anggota&routes=index&delete-success=false");
        }
    }
}else{
    echo "400 bad request";
}


?>
