<?php
// esta cargando la libreria
require __DIR__ . '/vendor/autoload.php';
 

// invoca la clase que ocupamos
$client = new Google_Client();
// establece las credenciales
$client->setAuthConfig('keys.json');
// el permiso que se va a usar(lectura, editor etc.)
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
// le decimos que vamos a usar los servios de la sheets
$service = new Google_Service_Sheets($client);
// declaramos variables que usaremos mas adelante
$spreadsheetId = '1fWfGuot5MMmRkrSR35ESgS0JQ-tMRi7G7q6EEzT3xaA'; // Id de nuestra hoja de calculo en drive
// establecemos los rangos
$range = 'A1:B2';
 
// Obtener los datos de las sheets
// $response = $service->spreadsheets_values->get($spreadsheetId, $range);
// $values = $response->getValues();
 
// foreach ($values as $row) {
//   printf("%s, %s\n", $row[0], $row[1]);
// }

$json = array("nombre"=>"juan", "edad"=>23,"descrpcion"=>"lol");


// añadir datos a la sheets
$body = new Google_Service_Sheets_ValueRange([
  'values' => [array_values($json)]
]);
$params = ['valueInputOption' => "RAW"];

$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

if($result){
  echo "Datos agregados exitosamente";
  //print_r($result);
}else{
  echo "salio mal";
};


?>