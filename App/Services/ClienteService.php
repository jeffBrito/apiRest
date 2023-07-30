<?php

    namespace App\Services;

    use App\Models\Cliente;

    class ClienteService
    {
        public function get($id = null){
          if($id){
            return Cliente::select($id);
          }else{
            return Cliente::selectAll();
          }
        }

        public function post(){
            $data = $_POST;
            return Cliente::insert($data);
        }

    }