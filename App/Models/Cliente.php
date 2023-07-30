<?php

    namespace App\Models;

    class Cliente
    {
        private static $table = 'CLIENTE';

        public static function select(int $id){
            $connPdo = new \PDO(DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.'', DBUSER, DBPASS);

            $sql = 'SELECT * FROM '.self::$table.' WHERE ID=:id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception('Nenhum Cliente encontrado !');
            }

        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.'', DBUSER, DBPASS);

            $sql = 'SELECT * FROM '.self::$table.'';
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception('Nenhum Cliente encontrado !');
            }

        }

        public static function insert($data){
            $connPdo = new \PDO(DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.'', DBUSER, DBPASS);

            $dataCad = date('Y-m-d H:i:s');
            $sql = 'INSERT INTO '.self::$table.' (NOME,EMAIL,SENHA,DATA) VALUES(:nome, :email, :senha, :data)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindParam(':nome',$data['nome']);
            $stmt->bindParam(':email',$data['email']);
            $stmt->bindParam(':senha',password_hash($data['senha'],PASSWORD_DEFAULT));
            $stmt->bindParam(':data',$dataCad);

            if($stmt->execute()){
                return 'Cliente cadastrado com sucesso !';
            }else{
                throw new \Exception('Falha ao cadastrar o Cliente !');
            }

        }
    }