<?php

class AuxClass {

    public function AuxSearchCep($cep){

        if(strlen($cep) > 8){

            $response = [
                'status' => 400,
                'response' => 'CEP Inválido.',
            ];
            
            return $response;

        }

        if(strlen($cep) < 8){

            $response = [
                'status' => 400,
                'response' => 'CEP Inválido.',
            ];
            
            return $response;

        }

        if(empty($cep)){

            $response = [
                'status' => 400,
                'response' => 'Favor informe o CEP.',
            ];

            http_response_code(400);
            return json_encode($response);
        }
    
    }

    public function AuxSearchCepValide($cep){

        if(preg_match('/^\+?\d+$/', $cep) == FALSE){

            $response = [
                'status' => 400,
                'response' => 'CEP Inválido.',
            ];
            
            return $response;
        }

    }


    public function AuxResponseCheck($jsonToArray){

        $info[] = [
            'logradouro'=>$jsonToArray->logradouro,
            'bairro'=>$jsonToArray->bairro,
            'localidade'=>$jsonToArray->localidade,
            'uf'=>$jsonToArray->uf,
            'cep'=>$jsonToArray->cep,
         ];

         $response = [
             'status' => 200,
             'response' => 'Informação localizada com sucesso.',
             'data'=> $info,
         ];

         
         return json_encode($response);
    }

}


?>