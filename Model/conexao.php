<?php

class Conexao {


    public function conectar(){
        $user = 'root';
        // $pass = 'root';
        try {
            // $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $pdo = new PDO('mysql:host=localhost;dbname=dev_teste', $user);
        } catch (Exception $e) {
            $pdo = $e->getMessage();
        }
        return $pdo;
    }

    public function rodar_script($comando){
 
        $pdo = $this->conectar();
        $pegar_dados =$pdo->prepare($comando);
        $pegar_dados->execute();

        $result = $pegar_dados->fetchAll();

        if (count($result)) {
            return $result;
        } else {
            return "vazio";
        }

    }

}


?>
