<?php
require_once 'info_model.php';

class InfoReservation extends InfoModel
{

    protected $table_name = 'reservation';

    protected $primary_key = "pk_reservation";

    protected $pk_reservation = 0;

    protected $date_debut = '';

    protected $date_fin = '';

    protected $date_emise = '';

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

function getDate_emise() {
    return $this->date_emise;
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

function setDate_emise($date_emise) {
    $this->date_emise = $date_emise;
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

    $results = $conn->query('SELECT vehicule.pk_vehicule, couleur.nom_couleur, reservation.statut, reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele LEFT JOIN couleur ON vehicule.fk_couleur = couleur.pk_couleur');

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'pk_vehicule' => $row['pk_vehicule'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'nom_couleur' => $row['nom_couleur'],
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
            echo $allreservation[$i]['nom_modele'] . " ".$allreservation[$i]['nom_couleur']." #".$allreservation[$i]['pk_vehicule']." </td>";
            echo "<td>";
            echo $allreservation[$i]['prenom'] . " ".$allreservation[$i]['nom']."</td>";
            echo "<td>";
            echo $allreservation[$i]['date_debut'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['date_fin'] . "</td>";
            if($allreservation[$i]['statut'] == 1){
                echo "<td>";
                echo "Actif</td>";
            }else{
                echo "<td>";
                echo "Inactif</td>";
            }

            echo "</tr>";
        }
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

//List for a specific user, doesnt have to be active.
function getListReservationsUser($id){
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT reservation.pk_reservation, reservation.statut,reservation.date_emise, reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM reservation LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE reservation.fk_utilisateur=" . $id . " ORDER BY reservation.date_emise");

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'date_emise' => $row['date_emise'],
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
            echo $allreservation[$i]['date_emise'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['nom_marque'] . " ".$allreservation[$i]['nom_modele']."</td>";
            echo "<td>";
            echo $allreservation[$i]['date_debut'] . "</td>";
            echo "<td>";
            echo $allreservation[$i]['date_fin'] . "</td>";
            if($allreservation[$i]['statut'] == 1){
                echo "<td>";
                echo "Actif</td>";
            }else{
                echo "<td>";
                echo "Inactif</td>";
            }
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

    $results = $conn->query("SELECT vehicule.pk_vehicule, reservation.date_debut, reservation.date_fin, reservation.pk_reservation, marque.nom_marque, modele.nom_modele FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE reservation.fk_utilisateur='" . $id_user . "' AND reservation.statut='1' ORDER BY reservation.date_fin ASC");

    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'pk_vehicule' => $row['pk_vehicule'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'date_debut' => $row['date_debut'],
            'date_fin' => $row['date_fin']
        );
    }
    echo "<select class='form-control' id='selectReservation' name='selectReservation'>";
    $size= sizeof($allreservation);
    if($size != null){
        for($i=0;$i<$size;$i++){
            $dateTo = date('d-m-Y', strtotime( $allreservation[$i]['date_debut'] ));
            $dateFrom = date('d-m-Y', strtotime( $allreservation[$i]['date_fin'] ));

            echo "<option value='".$allreservation[$i]['pk_reservation']."'>".$allreservation[$i]['nom_modele']. " #". $allreservation[$i]['pk_vehicule'] . " " . $dateTo . " à " . $dateFrom ."</option>";
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

function getWeekReservations($plusmoinsWeek)
{
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
    $plusmoinsWeek = (int)$plusmoinsWeek;

    $results = $conn->query('SELECT reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE  YEARWEEK(reservation.date_debut) <= YEARWEEK(CURDATE())+ '. $plusmoinsWeek .' AND  YEARWEEK(reservation.date_fin) >= YEARWEEK(CURDATE())+ '. $plusmoinsWeek .'  AND reservation.statut !=0');



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

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
    return json_encode($allreservation);
}

function getWeekReservationsForUser($iduser, $week)
{
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

    $results = $conn->query("SELECT reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE  YEARWEEK(reservation.date_debut) <= YEARWEEK(CURDATE())+ " . $week . " AND  YEARWEEK(reservation.date_fin) >= YEARWEEK(CURDATE())+ " . $week . "  AND utilisateur.pk_utilisateur='". $iduser ."' AND reservation.statut !=0");



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

    return json_encode($allreservation);
}

    function getWeekReservationsForEntretiens($iduser)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';

        $results = $conn->query("SELECT vehicule.pk_vehicule, reservation.pk_reservation, marque.nom_marque, modele.nom_modele, utilisateur.nom, utilisateur.prenom, reservation.date_debut, reservation.date_fin, reservation.statut FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele WHERE  YEARWEEK(reservation.date_debut) <= YEARWEEK(CURDATE()) AND  YEARWEEK(reservation.date_fin) >= YEARWEEK(CURDATE()) AND utilisateur.pk_utilisateur='". $iduser ."' AND reservation.statut !=0");

        echo "<option value=''>Sélectionnez un véhicule...</option>";
        while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['pk_vehicule'] . "'>" . $row['nom_marque'] . " ". $row['nom_modele'] . "</option>";

        }
    }

function getWeekEntretiensForUser($iduser, $type)
{
    include $_SERVER["DOCUMENT_ROOT"] . '/app/app/database_connect.php';
    //SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')); pour config (section SQL) GROUP BY dans phpMyAdmin
    $results = $conn->query("SELECT reservation.pk_reservation, vehicule.pk_vehicule, marque.nom_marque, modele.nom_modele, vehicule.odometre, entretien.odometre_entretien, entretien.fk_type_entretien, vehicule.odometre-entretien.odometre_entretien as difference FROM `reservation` LEFT JOIN vehicule ON reservation.fk_vehicule = vehicule.pk_vehicule LEFT JOIN utilisateur ON reservation.fk_utilisateur = utilisateur.pk_utilisateur LEFT JOIN marque ON vehicule.fk_marque = marque.pk_marque LEFT JOIN modele ON vehicule.fk_modele = modele.pk_modele LEFT JOIN entretien ON reservation.fk_vehicule = entretien.fk_vehicule WHERE  YEARWEEK(reservation.date_debut) <= YEARWEEK(CURDATE()) AND  YEARWEEK(reservation.date_fin) >= YEARWEEK(CURDATE())  AND utilisateur.pk_utilisateur='". $iduser . "' AND reservation.statut !=0 AND entretien.fk_type_entretien = '". $type ."' GROUP BY vehicule.pk_vehicule  ORDER BY ( DATEDIFF( NOW(),entretien.date_entretien ) ) LIMIT 5");


    $allreservation = array();
    while ($row = $results->fetch_assoc()) {
        $allreservation[] = array(
            'pk_reservation' => $row['pk_reservation'],
            'pk_vehicule' => $row['pk_vehicule'],
            'nom_marque' => $row['nom_marque'],
            'nom_modele' => $row['nom_modele'],
            'odometre' => $row['odometre'],
            'odometre_entretien' => $row['odometre_entretien'],
            'difference' => $row['difference']
        );
    }

    return json_encode($allreservation);
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
        echo "['".date_format($debut,"Y-m-d H:i:s")."', '".date_format($fin,"Y-m-d H:i:s")."'],";
    }

    // Frees the memory associated with a result
    $results->free();

    // close connection
    $conn->close();
}

    function getStatutReservation($id_reservation){
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
