<?php
    require "infoRamais.php";
    include "../models/ramal.php";
    include "../models/conexao.php";
    include "ramalService.php";

    $info = (array) new InfoRamal;

        foreach($info['info_ramais'] as $arr) {

            $conexao = new Conexao;
            $ramal = new Ramal;
    
            $ramal->__set('ramal', $arr['ramal']);
            $ramal->__set('nome', $arr['username']);
            $ramal->__set('ip', $arr['ip']);
            $ramal->__set('status', $arr['status']);
    
            $ramal_service = new RamalService($conexao, $ramal);
    
            $ramal_service->atualizar();
        }
    
    echo json_encode($info);
    
?>