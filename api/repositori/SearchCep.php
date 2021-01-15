<?php
require_once ("../repositori/AuxClass.php");

class SearchCep {

    public function InfoAddress($cep){

        $class = new AuxClass();

        try {

            $strlen = $class->AuxSearchCep($cep);

            if($strlen['status'] == 400){
                http_response_code(400);
                return json_encode($strlen);
            }

            $regex = $class->AuxSearchCepValide($cep);

            if($regex['status'] == 400){
                http_response_code(400);
                return json_encode($regex);
            }
            
            $json = file_get_contents("https://viacep.com.br/ws/$cep/json/");
            $get_response = json_decode($json);

            if(isset($get_response->erro)){

                $response = [
                    'status' => 400,
                    'response' => 'CEP Inválido.',
                ];

                http_response_code(400);
                return json_encode($response);

            } else {

                $jsonToArray = json_decode($json);
                http_response_code(200);
                return $class->AuxResponseCheck($jsonToArray);
                
            }
         

        } catch (Exception $e) {

            $response = [
                'status' => 400,
                'response' => 'CEP Inválido.',
            ];

            http_response_code(400);
            return json_encode($response);

        }
        

    }

}


?>