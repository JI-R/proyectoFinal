<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dht11 extends Model{
    protected $table      = 'dht11';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['temperatura','humedad','indice'];

    public function getGoogleGauge(){
        return $this->select('temperatura,humedad,indice,fecha')->orderBy('id', 'desc')->first();
    }

    public function getGoogleLine(){
        $aux = $this->select('id,temperatura,humedad,indice')->orderBy('id', 'asc')->findAll();
        if (empty($aux)) 
            return [];

        foreach ($aux as $value)
            $arr[] = [intval($value['id']),intval($value['temperatura']),intval($value['humedad']),intval($value['indice'])];

        return $arr;
    }

    public function getEcharBar(){
        $aux= $this->select('temperatura,humedad,indice')->orderBy('id', 'desc')->first();
        return [
            'categories'=>['temperatura','humedad','indice'],
            'data'=>[intval($aux['temperatura']),intval($aux['humedad']),intval($aux['indice'])]
        ];
    }

    public function getEcharLine(){
        $aux= $this->select('id,temperatura,humedad,indice')->orderBy('id', 'asc')->findAll();

        if (empty($aux)) 
            return [];

        foreach ($aux as $value) {
           $col[]=intval($value['id']);
           $tem[]=intval($value['temperatura']);
           $hum[]=intval($value['humedad']);
           $ind[]=intval($value['indice']);
        }
        return [
            'columnas'=>$col,
            'temperatura'=>$tem,
            'humedad'=>$hum,
            'indice'=>$ind
        ];
    }

    public function getTemperatura(){
        return $this->findColumn('temperatura');
    }

    public function getCountTemperatura(){
        $aux = $this->selectCount('temperatura')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['temperatura'];
    }

    public function getSumTemperatura(){
        $aux = $this->selectSum('temperatura')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['temperatura'];
    }

    public function getAvgTemperatura(){
        $aux = $this->selectAvg('temperatura')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['temperatura'];
    }

    public function getMaxTemperatura(){
        $aux = $this->selectMax('temperatura')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['temperatura'];
    }

    public function getMinTemperatura(){
        $aux = $this->selectMin('temperatura')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['temperatura'];
    }

    public function getDatesTemperatura($date1,$date2){
        return $this->select('temperatura,fecha')
        ->where(['fecha >=' => $date1, 'fecha <=' => $date2])
        ->get()->getResultArray();
    }

    public function getHumedad(){
        return $this->findColumn('humedad');
    }

    public function getCountHumedad(){
        $aux = $this->selectCount('humedad')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['humedad'];
    }

    public function getSumHumedad(){
        $aux = $this->selectSum('humedad')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['humedad'];
    }

    public function getAvgHumedad(){
        $aux = $this->selectAvg('humedad')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['humedad'];
    }

    public function getMaxHumedad(){
        $aux = $this->selectMax('humedad')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['humedad'];
    }

    public function getMinHumedad(){
        $aux = $this->selectMin('humedad')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['humedad'];
    }

    public function getDatesHumedad($date1,$date2){
        return $this->select('humedad,fecha')
        ->where(['fecha >=' => $date1, 'fecha <=' => $date2])
        ->get()->getResultArray();
    }

    public function getIndice(){
        return $this->findColumn('indice');
    }

    public function getCountIndice(){
        $aux = $this->selectCount('indice')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['indice'];
    }

    public function getSumIndice(){
        $aux = $this->selectSum('indice')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['indice'];
    }

    public function getAvgIndice(){
        $aux = $this->selectAvg('indice')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['indice'];
    }

    public function getMaxIndice(){
        $aux = $this->selectMax('indice')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['indice'];
    }

    public function getMinIndice(){
        $aux = $this->selectMin('indice')->get()->getRowArray();
        if (isset($aux)) 
            return $aux['indice'];
    }

    public function getDatesIndice($date1,$date2){
        return $this->select('indice,fecha')
        ->where(['fecha >=' => $date1, 'fecha <=' => $date2])
        ->get()->getResultArray();
    }

    public function mediaTemperatura() {
        $aux = $this->findColumn('temperatura');
        $media = array_sum($aux) / count($aux);
        return $media;
    }

    public function medianaTemperatura() {
        if($aux = $this->select('temperatura')->orderBy('id', 'asc')->findAll()){
            $length = count($aux);
            $half_length = $length / 2;
            $mediana_index = (int) $half_length;
            $mediana = $aux[$mediana_index];
            return $mediana;
        } 
    }    
    
    public function modaTemperatura() {
        $aux = $this->findColumn('temperatura');
        $valorAnterior = 0;
        foreach ($aux as $key => $valor){
            if($valor < $valorAnterior){
                break;
            }else{
                echo "$key;";
                $valorAnterior = $valor;
            }
        }
        return $valor;
    }

    public function maximoTemperatura() {
        $aux = $this->findColumn('temperatura');
        $maxValue = max($aux);;
        return $maxValue;
    }

    public function minimoTemperatura() {
        $aux = $this->findColumn('temperatura');
        $minValue = min($aux);
        return $minValue;
    }

    public function rangoTemperatura(){
        $aux = $this->findColumn('temperatura');
        $minValue = min($aux);
        $maxValue = max($aux);
        $range = $maxValue - $minValue;
        return $range;
    }

    public function varianzaTemperatura(){
        $aux = $this->findColumn('temperatura');
        $media = array_sum($aux) / count($aux);
        $sumaDiferenciasCuadrado = 0;
        foreach ($aux as $valor) {
            $diferencia = $valor - $media;
            $sumaDiferenciasCuadrado += $diferencia ** 2;
        }
        $varianza = $sumaDiferenciasCuadrado / count($aux);
        return $varianza;
    }

    public function desviacionEstandarTemperatura(){
        $aux = $this->findColumn('temperatura');
        $media = array_sum($aux) / count($aux);
        $sumaDiferenciasCuadrado = 0;
        foreach ($aux as $valor) {
            $diferencia = $valor - $media;
            $sumaDiferenciasCuadrado += $diferencia ** 2;
        }
        $varianza = $sumaDiferenciasCuadrado / count($aux);
        $desviacionEstandar = sqrt($varianza);
        return $desviacionEstandar;
    }

}

