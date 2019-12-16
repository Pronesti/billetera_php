<?php
/*
agregarPlata($billete, $cantidad)
sacarPlata($billete, $cantidad)
mostrarPlata()
*/


class Billetera{
    private $lista = array(2=>0,5=>0,10=>0,20=>0,50=>0,100=>0,500=>0,1000=>0);
    private $billetesExistentes=[2,5,10,20,50,100,500,1000];
    
function agregarPlata($billete, $cantidad){
    if(!in_array($billete, $this->billetesExistentes)){
        print("No existen billetes de $" . $billete . ". \n");
    }else if ($cantidad < 0){
        print("Debes agregar una cantidad mayor a 0. \n");
    }else{
        $this->lista[$billete] += $cantidad;
    }
}

function sacarPlata($billete, $cantidad){
    if(!in_array($billete, $this->billetesExistentes)){
        print("No existen billetes de $" . $billete . " \n");
    }else if ($cantidad < 0){
        print("Debes agregar una cantidad mayor a 0. \n");
    }else if ($this->lista[$billete] < $cantidad){
        print("No tenes suficientes billetes de $" . $billete . ". \n");
    }else{
        $this->lista[$billete] -= $cantidad;
    }
}

function mostrarPlata(){
    $nuevaLista=array();
    foreach($this->lista as $k => $v){
        if ($v != 0){
        $nuevaLista[$k] = $v;
    }
    }
   return $nuevaLista;
}

function calcularTotal(){
    $total=0;
    foreach($this->lista as $k => $v){    
        $total = $total + $k * $v;
    }
    return $total;
}

function agregarBilletesAleatorios(){
    $nuevaLista = array();
    foreach($this->billetesExistentes as $k => $v){
        $this->lista[$v]= $this->lista[$v] + random_int(0,100); 
    }
}

}

function crearMuchasBilleterasConBilletesAleatorios($n){
    $i=0;
    while($i<$n){
        $billeteras[$i] = new Billetera();
        $billeteras[$i]->agregarBilletesAleatorios();
        $i +=1;
    }
    return $billeteras;
}

//$miBilletera = new Billetera();
//$miBilletera->agregarPlata(5,2);
//$miBilletera->agregarPlata(10,5);
//$miBilletera->agregarPlata(20,3);
//$miBilletera->agregarPlata(50,2);
//$miBilletera->agregarPlata(100,2);
//print_r($miBilletera->mostrarPlata());
//print_r($miBilletera->calcularTotal());
//$miBilletera->sacarPlata(10,0);
//print_r($miBilletera->mostrarPlata());
//$miBilletera->agregarBilletesAleatorios();
//print_r($miBilletera->mostrarPlata());

print_r(crearMuchasBilleterasConBilletesAleatorios(16));
