<?php
/****************************************************************
		File : cReservation.php
		Authour : Jérémy Besserer-Lemay
		Functionality : Controller for reservations
			Date: 2017-10-03
			
			Last modification:
			2017-10-03     Jérémy Besserer-Lemay   1 Creation
 ******************************************************************/
?>
<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_reservation.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/app/app/models/info_vehicule.php';
	
	class cReservation{
		private $infoReservation;
		private $gReservation;
		function __construct() {
			$this->gReservation = new InfoReservation();
			$this->infoReservation[0] = isset($_POST['fk_vehicule']) ? $_POST['fk_vehicule'] : null;
			$this->infoReservation[1] = isset($_POST['fk_user']) ? $_POST['fk_user'] : null;
			$this->infoReservation[2] = isset($_POST['date_start']) ? $_POST['date_start'] : null;
			$this->infoReservation[3] = isset($_POST['date_end']) ? $_POST['date_end'] : null;
			$this->infoReservation[4] = isset($_POST['status']) ? $_POST['status'] : null;
		}
		//Sends info for reservation in the BD
		function updateReservation(){
                        //Reservation info
                        $this->gReservation->setFk_vehicule($infoReservation[0]);
                        $this->gReservation->setFk_utilisateur($infoReservation[1]);
                        $this->gReservation->setDate_debut($infoReservation[2]);
                        $this->gReservation->setDate_fin($infoReservation[3]);
                        $this->gReservation->setStatut($infoReservation[4]);
                        
                        //If you didn't return the vehicule
                        if($this->gReservation->getStatut()== null){
                            $this->gReservation->setStatut(1);
                        }
                        
                        //If you want to add a reservation
                        if(isset($_GET['mod'])==false){
                            $this->gReservation->addDBObject();
                        }elseif($_GET['mod']==1){
                            //If you wan to modify a reservation or set it to inactive
                            $this->gReservation->updateDBObject();
                        }
		}
	}
        
isset($_POST['selectReservation']) ? $_POST['selectReservation'] : null;
isset($_POST['selectReservation']) ? $_POST['selectReservation'] : null;

if(isset($_GET['mod'])==true){
	if($_GET['mod']==3){
		$reservation = new InfoReservation();
		$vehicule = new InfoVehicule();

		$result = $reservation->getObjectFromDB($_POST['selectReservation']);
		$resultVehicule = $vehicule->getObjectFromDB($result['fk_vehicule']);

		if($_POST['odometer'] >= $resultVehicule['odometre']){
            $vehicule->updateObjectDynamically('odometre',$_POST['odometer'],$result['fk_vehicule']);

            $reservation->updateObjectDynamically('statut','0',$_POST['selectReservation']);

		}else{
			//Error, the vehicule can't have a lower odometer than it did before.
		}

	}
}
?>

