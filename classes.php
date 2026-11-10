<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "cafeteria_poo";

    private $conexao;

    public function conectar (){
        $this->conexao = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if($this->conexao->connect_error){
            die("Erro causado: ".$this->conexao->connect_error);
        }
        return $this->conexao;
    }
}
    class usuario{
        private $db;
        public function __construct($conexao_banco)
        {
            $this->db = $conexao;
        }

        public function autenticar($usuario, $senha){
            $sql = "SELECT id, nome FROM usuarios WHERE usuario = ? AND senha = ?";
            $stmt = $this->db->prepare($sql);
            $stmt = bind_param("ss",$usuario, $senha);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if($linha = $resultado->fetch_assoc()){
                return $linha; //receber os dados do array
            }
            return false;
        }
    }
    class Produto{
        private = $db;
        
        public function __construct($conexao_banco )
        {
            $this->db = $conexao_banco;
        }
        public function cadastrar($nome, $categoria, $discricao, $preco){
            $sql = "INSERT INTO produtos (nome,categoria,descricao,preco) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($sql);
            $stmt = bind_param("sssd", $nome, $categoria, $descricao, $preco);
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
    

?>