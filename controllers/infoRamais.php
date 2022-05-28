<?php

class InfoRamal {
    public $info_ramais;
    public $info_monitor = array(
        'chamando' => 0,
        'ocupado' => 0,
        'disponivel' => 0,
        'pausa' => 0,
        'indisponivel' => 0
    );

    public function __construct() {
        $filas = file('../lib/filas');
        $ramais = file('../lib/ramais');
        $status_ramais = array();
    
        foreach($filas as $linhas){ //DEFINE STATUS DO RAMAL
            if(strstr($linhas,'SIP/')){ 

                $linha = explode(' ', trim($linhas));
                $nome = end($linha);
                list($tech,$ramal) = explode('/',$linha[0]);

                if(strstr($linhas,'(Ring)')){  
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $status_ramais[$ramal] = array('username' => $nome, 'status' => 'chamando');  
                    $this->info_monitor['chamando'] += 1;
                }

                if(strstr($linhas,'(In use)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $status_ramais[$ramal] = array('username' => $nome, 'status' => 'ocupado');
                    $this->info_monitor['ocupado'] += 1;
                }

                if(strstr($linhas,'(Not in use)')){  
                    $linha = explode(' ', trim($linhas));       
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $status_ramais[$ramal] = array('username' => $nome, 'status' => 'disponivel'); 
                    $this->info_monitor['disponivel'] += 1;
                }

                if(strstr($linhas,'(paused)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $status_ramais[$ramal] = array('username' => $nome, 'status' => 'pausa'); 
                    $this->info_monitor['pausa'] += 1;
                }

                if(strstr($linhas,'(Unavailable)')){ 
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $status_ramais[$ramal] = array('username' => $nome, 'status' => 'indisponivel');
                    $this->info_monitor['indisponivel'] += 1;  
                }       
            }
        }

        foreach($ramais as $linhas){
            $linha = array_filter(explode(' ',$linhas));
            $arr = array_values($linha);
            $host = trim($arr[1]);

            if(trim($arr[1]) == '(Unspecified)' AND trim($arr[4]) == 'UNKNOWN'){  
                list($name,$username) = explode('/',$arr[0]);    

                $this->info_ramais[$name] = array(
                    'ramal' => $username,
                    'online' => 'offline',
                    'status' => $status_ramais[$name]['status'],
                    'username' => $status_ramais[$name]['username'],
                    'ip' => $host
                );
            }
            
            if(!empty($arr[5]) AND trim($arr[5]) == "OK"){        
                list($name,$username) = explode('/',$arr[0]);
                $this->info_ramais[$name] = array(
                    'ramal' => $username,
                    'online' => 'online',
                    'status' => $status_ramais[$name]['status'],
                    'username' => $status_ramais[$name]['username'],
                    'ip' => $host
                );
            }
        }
    }
}

?>