<?php

function obtenerDatosPiloto($numeroPiloto) {
    $url="https://api.openf1.org/v1/drivers?driver_number=".$numeroPiloto;

    //Iniciar la sesión cURL
    $cURL=curl_init();

    //Para configurar lo que vamos a enviar 
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);

    //Para ejecutarlo
    $ejecucion=curl_exec($cURL);

    //Por si hay errores
    if (curl_errno($cURL)){
        echo "Error en la solicitud: ".curl_error($cURL);
        curl_close($cURL);
        return null;
    }

    //Cerrar cURL
    curl_close($cURL);

    //Decodificar el json
    $data=json_decode($ejecucion, true);

    //Devolvemos el primer resultado
    return $data[0] ?? null;
}

//Llamadas a la API
$piloto16=obtenerDatosPiloto(16);
$piloto44=obtenerDatosPiloto(44);

//Mostrar los resultados
if ($piloto16 && $piloto44) {
    echo "--PILOTO 16:\n";
    echo "Nombre: ".$piloto16['full_name']."\n";
    echo "Nacionalidad: ".$piloto16['country_code']."\n";
    echo "Equipo: ".$piloto16['team_name']."\n\n";

    echo "--PILOTO 44:--\n";
    echo "Nombre: ".$piloto44['full_name']."\n";
    echo "Nacionalidad: ".$piloto44['country_code']."\n";
    echo "Equipo: ".$piloto44['team_name']."\n";
} else {
    echo "No se pudieron obtener los datos de los pilotos";
}
?>