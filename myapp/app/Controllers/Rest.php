<?php

namespace App\Controllers;
use App\Models\Dht11;

class Rest extends BaseController
{
    public function index(){
        return view('templates/header').
        "<h1>API REST</h1><h2>Interactuar con EndPoints</h2>";
        view('templates/footer');
    }

    public function listar(){
        $model = new Dht11();
        $array = $model->findAll();
        echo '<pre>'; 
        print_r($array); 
        echo '</pre>';
    }

    public function espPost(){
     if ($this->request->getPost()){ 
            $model = new Dht11();
            $data=[ 
                'temperatura'=>$this->request->getVar('temperatura'),
                'humedad'=>$this->request->getVar('humedad'),
                'indice'=>$this->request->getVar('indice'),
            ];
            $model->insert($data);
            return "201";
        }
            return "401"; 
    }

    public function getGoogleGauge(){
        $model = new Dht11();
        $data= $model->getGoogleGauge();
        echo json_encode($data);
    }
    public function googleGauge(){
        return  view('templates/header').
                view('charts/google_Gauge').
                view('templates/footer');
    }
    public function getGoogleLine(){
        $model = new Dht11();
        $data= $model->getGoogleLine();
        echo json_encode($data);
    }
    public function googleLine(){
        return  view('templates/header').
                view('charts/google_line').
                view('templates/footer');
    }
    public function dataEchartsBar(){
        $model = new Dht11();
        $data= $model->getEcharBar();
        echo json_encode($data);
    }
    public function echartsBar(){
        return  view('templates/header').
                view('charts/echarts_bar').
                view('templates/footer');
    }

    public function dataEchartsLine(){
        $model = new Dht11();
        $data= $model->getEcharLine();
        echo json_encode($data);
    }

    public function echartsLine(){
        return view ('templates/header').
        view ('charts/echarts_line').
        view('templates/footer');
    }

    public function table(){
        $data =[];
        $model = new Dht11();
        $data['medidas'] = $model->findAll();
        return  view('templates/header').
                view('tables',$data).
                view('templates/footer');
    }

    public function echartsGauge(){
        return  view('templates/header').
                view('charts/echarts_gauge').
                view('templates/footer');
    }

    public function dashboard(){
        return  view('templates/header').
                view('charts/dashboard').
                view('templates/footer');
    }


    public function querys(){
        $data=["Querys"];
        $model = new Dht11();         
        $data['ind'] = $model->getIndice();
        $data['ind_count'] = $model->getCountIndice();
        $data['ind_sum'] = $model->getSumIndice();
        $data['ind_avg'] = $model->getAvgIndice();
        $data['ind_max'] = $model->getMaxIndice();
        $data['ind_min'] = $model->getMinIndice();
        $data['ind_fechas'] = $model->getDatesIndice('2023-05-11 00:00:00','2023-05-11 05:33:54');

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function actualizarDatos(){
        $model = new Dht11();
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $data = [
            'temperatura' => $request->getPost('temperatura'),
            'humedad' => $request->getPost('humedad'),
            'indice' => $request->getPost('indice'),
            'fecha' => $request->getPost('fecha')
        ];
        $res = $model->update($id,$data);

        echo json_encode(["msg"=>$res]);
    }

    public function eliminarDatos(){
        $model = new Dht11();
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $res = $model->delete($id);

        echo json_encode(["msg"=>$res]);
    }
}