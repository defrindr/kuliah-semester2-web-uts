<?php
if(isset($_POST['id'])){
    $buku = $db->findOne([
        "where" => [
            "=",
            "kode_buku",
            $_POST['id'],
        ],
    ], "buku");
    $response = $db->delete("buku", [
        "=",
        "kode_buku",
        $buku->kode_buku,
    ]);
    
    if(isset($response)){
    
        if($response){
            header("location: ?module=buku&routes=index&delete-success=true");
        }else{
            header("location: ?module=buku&routes=index&delete-success=false");
        }
    }
}else{
    echo "400 bad request";
}


?>
