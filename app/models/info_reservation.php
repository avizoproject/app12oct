<?php
require_once 'info_model.php';

class InfoReservation extends InfoModel
{

    protected $table_name = 'reservation';

    protected $primary_key = "pk_reservation";

    protected $pk_reservation = 0;

    protected $date_debut = '';

    protected $date_fin = '';

    protected $fk_vehicule = 0;

    protected $fk_utilisateur = 0;

    protected $statut = 0;

    function __construct()
    {}


function getPk_reservation() {
    return $this->pk_reservation;
}

function getDate_debut() {
    return $this->date_debut;
}

function getDate_fin() {
    return $this->date_fin;
}

function getFk_vehicule() {
    return $this->fk_vehicule;
}

function getFk_utilisateur() {
    return $this->fk_utilisateur;
}

function getFk_statut_reservation() {
    return $this->fk_statut_reservation;
}

function setPk_reservation($pk_reservation) {
    $this->pk_reservation = $pk_reservation;
}

function setDate_debut($date_debut) {
    $this->date_debut = $date_debut;
}

function setDate_fin($date_fin) {
    $this->date_fin = $date_fin;
}

function setFk_vehicule($fk_vehicule) {
    $this->fk_vehicule = $fk_vehicule;
}

function setFk_utilisateur($fk_utilisateur) {
    $this->fk_utilisateur = $fk_utilisateur;
}

function setStatut($statut) {
    $this->statut = $statut;
}

function getListReservations(){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query('SELECT reservation.statut, reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele');

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin'],
            'statut' => $row['statut']
        );
    }
    $size= sizeof($allreservation);
    if($size != null){
        for($i=0;$i<$size;$i++){
            echo "<tr class=''>";
            echo "<td class='hidden'>";
            echo $allreservation[$i]['pk_reservation'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['nom_marque'] . " ".$allreservation[$i]['nom_modele']."</td>";
            echo "<td>";
            echo $allreservation[$i]['prenom'] . " ".$allreservation[$i]['nom']."</td>";
            echo "<td>";
            echo $allreservation[$i]['date_debut'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['date_fin'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['statut'] . "</td>";
            echo "</tr>";
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

function getSelectReservations($id_user){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT reservation.pk_reservation, marque.nom_marque, modele.nom_modele FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE reservation.fk_utilisateur='" . $id_user . "' AND reservation.statut = '1'");

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele']
        );
    }
    echo "<select class='form-control' id='selectReservation' name='selectReservation'>";
    $size= sizeof($allreservation);
    if($size != null){
        for($i=0;$i<$size;$i++){
            echo "<option value='".$allreservation[$i]['pk_reservation']."'>".$allreservation[$i]['nom_marque'] . " ".$allreservation[$i]['nom_modele']."</option>";
        }
    }
    echo "</select>";

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

function getReservationsNamesCalendar(){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query('SELECT reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE (WEEKOFYEAR(reservation.date_debut)=WEEKOFYEAR(NOW()) OR WEEKOFYEAR(reservation.date_fin)=WEEKOFYEAR(NOW())) AND reservation.statut = 1');

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin']
        );
    }
    $size= sizeof($allreservation);
    if($size != null){
        for($i=0;$i<$size;$i++){
          echo "<li><span>" . $allreservation[$i]['nom_marque'] . " ".$allreservation[$i]['nom_modele'] . "</span></li>";
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

function getReservationsCalendar(){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query('SELECT reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele');

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin']
        );
    }
    $size= sizeof($allreservation);
    $semaine = array();
    $semaine[0]= date('Y-m-d',strtotime('last sunday'));
    $semaine[1]= date('Y-m-d',strtotime('monday this week'));
    $semaine[2]= date('Y-m-d',strtotime('tuesday this week'));
    $semaine[3]= date('Y-m-d',strtotime('wednesday this week'));
    $semaine[4]= date('Y-m-d',strtotime('thursday this week'));
    $semaine[5]= date('Y-m-d',strtotime('friday this week'));
    $semaine[6]= date('Y-m-d',strtotime('saturday this week'));

    if($size != null){
        for($i=0;$i<$size;$i++){
            $numberofDays = ceil(abs(strtotime($allreservation[$i]['date_fin']) - strtotime($allreservation[$i]['date_debut']))/ 86400);
            $numberofDays = $numberofDays/2;
            $counter = 0;
            for($j=0;$j<7;$j++) {
                if ($allreservation[$i]['date_debut']>= $semaine[$j] || $allreservation[$i]['date_fin']>= $semaine[$j]) {
                    if($numberofDays == $counter){
                        echo '<li class="events-group">';
                        if ($i == 0) echo '<div class="top-info"><span>' . $semaine[$j] . '</span></div>';
                        echo '<ul>';
                        echo '<li class="single-event" data-start="" data-end="" data-content="event-yoga-1" data-event="event-3">';
                        echo '<a href="#0">';
                        echo '<em class="event-name">'.$allreservation[$i]["prenom"].' '.$allreservation[$i]["nom"].'</em>';
                        echo '</a>';
                        echo '</li>';
                        echo '</ul>';
                        echo '</li>';
                    }
                    else{
                        echo '<li class="events-group">';
                        if ($i == 0) echo '<div class="top-info"><span>' . $semaine[$j] . '</span></div>';
                        echo '<ul>';
                        echo '<li class="single-event" data-start=" " data-end=" " data-content="event-yoga-1" data-event="event-3">';
                        echo '<a href="#0" disabled="disabled">';
                        echo '<em class="event-name"> </em>';
                        echo '</a>';
                        echo '</li>';
                        echo '</ul>';
                        echo '</li>';
                    }
                    $counter++;

                } else {
                    echo '<li class="events-group">';
                    if ($i == 0) echo '<div class="top-info"><span>' . $semaine[$j] . '</span></div>';
                    echo '<ul>';
                    echo '</ul>';
                    echo '</li>';
                }
            }
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

function getDatesReservation($id_reservation){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT * FROM reservation WHERE pk_reservation =" . $id_reservation . "");

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin']
        );
    }
    $size= sizeof($allreservation);
    if($size != null){
      $debut = date_create($allreservation[0]['date_debut']);
      $fin = date_create($allreservation[0]['date_fin']);
      echo "['".date_format($debut,"Y/m/d")."', '".date_format($fin,"Y/m/d")."'],";
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

}
?>
