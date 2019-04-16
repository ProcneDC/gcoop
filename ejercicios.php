/** usá el lenguaje que vos quieras, no es necesario que "compile".
/** por favor escribí el código de las soluciones debajo de cada consigna :)
/** la entrega debe incluir la creación de un repo git, puede ser en github u otra plataforma.

[0] crea un repo git local y realiza un commit inicial con este archivo.

[1] qué hace esta funcion? describila y cambia su nombre por uno que te parezca bien

*/

/**
 * Descripción: 
 	Recibe dos objetos por parámetros (local y visitante) y retorna la variable ganador, a la cual en caso de que el visitante tenga más de 99 de suerte o el local no tenga cábala, se le asignará el visitante. De lo contrario, el ganador será el local.
 */

function definirGanador(local, visitante)
{
    let ganador = local;

    if(visitante.suerte > 99 || !local.cabala)
    {
        ganador = visitante;
    }
    return ganador;
}

/**
* [2] modelá a los equipos
* Sacachispas que tiene 14 de suerte y no tiene cábala
* Deportivo Morón que tiene 1 de suerte y tiene cábala
* Carmen Sandiego que tiene 100 de suerte y no tiene cábala
* San Justo FC que tiene 12 de suerte y no tiene cábala
*/

class Equipo{
	private $suerte;
	private $cabala;
	private $nombre;

	public function __construct(int $suerte, boolean $cabala, string $nombre){
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

	public function setSuerte($suerte){
		$this->suerte = $suerte;
	}

	public function setCabala($cabala){
		$this->cabala = $cabala;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
}

$sacachispas = new Equipo(14, false);
$deportivo_moron = new Equipo(1, true);
$carmen_sandiego = new Equipo(100, false);
$san_justo_fc = new Equipo(12, false);


/**
* [3] escribi la funcion esEmpate que dados dos equipos indica si empatan,
* estos lo hacen cuando su suerte es parecida (+/- 2) y ninguno tiene cábala.
*/


function esEmpate($equipo1, $equipo2){
	$resultado = "No hay empate"; 

	if(
		($equipo1->getCabala() == false && $equipo2->getCabala() == false) 
		&& 
		(abs(($equipo1->getSuerte() - $equipo2->getSuerte()) <= 2 )) 
	){
		$resultado = "Hay empate entre: " . $equipo1->getNombre() . " y " . $equipo2->getNombre(); 
	}

	return $resultado;
}


/**
* [4] indicá quien sería el ganador en cada caso:
*
* Local               Visitante
* Deportivo Moron     San Justo FC
* Carmen Sandiego     Sacachispas
* Sacachispas         San Justo FC
* */

Ganadores:
1) Deportivo Morón
2) Sacachispas
3) San Justo FC


/* Ejercicio 5 en el archivo partido.php */