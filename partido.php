<?php 

/**
* [5] agregá una funcion que dados dos equipos haga que jueguen, esto es:
* _ que sume los puntos por cada partido, teniendo en cuenta que si es empate ambos suman un punto, de lo contrario solo el ganador sumará 3 puntos
* _ que se encargue de actualizar la cantidad de derrotas/victorias/empates de cada equipo
*/

/* Agrego atributos */
class Equipo{
	private $suerte;
	private $cabala;
	private $nombre;
	private $puntos = 0;
	private $victorias = 0;
	private $derrotas = 0;
	private $empates = 0;

	public function __construct(int $suerte, $cabala, string $nombre){
		$this->suerte = $suerte;
		$this->cabala = $cabala;
		$this->nombre = $nombre;
	}

	public function getSuerte(){
		return $this->suerte;
	}

	public function getCabala(){
		return $this->cabala;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getVictorias(){
		return $this->victorias;
	}

	public function getEmpates(){
		return $this->empates;
	}

	public function getDerrotas(){
		return $this->derrotas;
	}

	public function getPuntos(){
		return $this->puntos;
	}

	public function setSuerte($suerte){
		$this->suerte = $suerte;
	}

	public function setCabala($cabala){
		$this->cabala = $cabala;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setVictorias($victorias){
		$this->victorias = $victorias;
	}

	public function setEmpates($empates){
		$this->empates = $empates;
	}

	public function setDerrotas($derrotas){
		$this->derrotas = $derrotas;
	}

	public function setPuntos($puntos){
		$this->puntos = $puntos;
	}
}

/* Agrego que defina el conteo de derrotas */
function definirGanador($local, $visitante)
{
    $ganador = $local;

    if($visitante->getSuerte() > 99 || !($local->getCabala()))
    {
        $ganador = $visitante;
    }
    /*return $ganador->getNombre();*/
    return $ganador;
}

function esEmpate($equipo1, $equipo2){
	$resultado = false;
	/*$resultado = "No hay empate"; */

	if(
		($equipo1->getCabala() == false && $equipo2->getCabala() == false) 
		&& 
		(abs(($equipo1->getSuerte() - $equipo2->getSuerte()) <= 2 )) 
	){
		$resultado = true;
		/*$resultado = "Hay empate entre: " . $equipo1->getNombre() . " y " . $equipo2->getNombre(); */

	}
	return $resultado;
}

function jugarPartido($local, $visitante){

	if(esEmpate($local, $visitante)){

		$local->setPuntos($local->getPuntos() + 1);
		$visitante->setPuntos($visitante->getPuntos() + 1);

		$local->setEmpates($local->getPuntos() + 1);
		$visitante->setEmpates($visitante->getPuntos() + 1);

		echo "El partido se definió en empate, " . $local->getNombre() . " tiene " . $local->getPuntos() . " puntos y el equipo " . $visitante->getNombre() . " tiene " . $visitante->getPuntos() . " puntos.";
	}else{
		$ganador = definirGanador($local, $visitante);
		$ganador->setPuntos($ganador->getPuntos() + 3);
		$ganador->setVictorias($ganador->getVictorias() + 1);

		if($ganador->getNombre() == $local->getNombre()){
			$perdedor = $visitante;
		}else{
			$perdedor = $local;
		}

        $perdedor->setDerrotas($perdedor->getDerrotas() + 1);

		echo "El partido se definió con la victoria de " . $ganador->getNombre() . " quien lleva " . $ganador->getPuntos() . " puntos. El perdedor, " . $perdedor->getNombre() . " tiene " . $perdedor->getDerrotas() . " derrotas.";
	}

}

$sacachispas = new Equipo(14, false, "Sacachispas");
$deportivo_moron = new Equipo(1, true, "Deportivo Moron");
$carmen_sandiego = new Equipo(100, false, "Carmen Sandiego");
$san_justo_fc = new Equipo(12, true, "San Justo FC");

/* Test */

jugarPartido($deportivo_moron, $san_justo_fc); echo "<br>";

jugarPartido($carmen_sandiego, $sacachispas); echo "<br>";

jugarPartido($sacachispas, $san_justo_fc); echo "<br>";


jugarPartido($deportivo_moron, $san_justo_fc); echo "<br>";

jugarPartido($carmen_sandiego, $sacachispas); echo "<br>";

jugarPartido($sacachispas, $san_justo_fc); echo "<br>";


jugarPartido($deportivo_moron, $carmen_sandiego); echo "<br>";

jugarPartido($sacachispas, $deportivo_moron); echo "<br>";

jugarPartido($san_justo_fc, $carmen_sandiego); echo "<br>";