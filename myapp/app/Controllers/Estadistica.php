<?php

namespace App\Controllers;
use App\Models\Dht11;

class Estadistica extends BaseController{
    
    public function estadistica() {
        $data=["Estadistica"];
        $model = new Dht11();         

        $data['Media'] = $model->mediaTemperatura();
        $data['Mediana'] = $model->medianaTemperatura();
        $data['Moda'] = $model->modaTemperatura();
        $data['Maximo'] = $model->maximoTemperatura();
        $data['Minimo'] = $model->minimoTemperatura();
        $data['Rango'] = $model->rangoTemperatura();
        $data['Varianza'] = $model->varianzaTemperatura();
        $data['Desviación Estandar'] = $model->desviacionEstandarTemperatura();

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}