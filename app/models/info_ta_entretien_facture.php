<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 2017-11-10
 * Time: 10:13 AM
 */

class InfoTAEntretienFacture extends InfoModel
{
    protected $table_name = 'ta_entretien_facture';

    protected $primary_key = "pk_ta_entretien_facture";

    protected $pk_ta_entretien_facture = 0;

    protected $fk_facture = 0;

    protected $fk_entretien = 0;

    protected $lien_photo_entretien_facture = '';

    function __construct()
    {}

    /**
     * @return int
     */
    public function getPkTaEntretienFacture()
    {
        return $this->pk_ta_entretien_facture;
    }

    /**
     * @param int $pk_ta_entretien_facture
     */
    public function setPkTaEntretienFacture($pk_ta_entretien_facture)
    {
        $this->pk_ta_entretien_facture = $pk_ta_entretien_facture;
    }

    /**
     * @return int
     */
    public function getFkFacture()
    {
        return $this->fk_facture;
    }

    /**
     * @param int $fk_facture
     */
    public function setFkFacture($fk_facture)
    {
        $this->fk_facture = $fk_facture;
    }

    /**
     * @return int
     */
    public function getFkEntretien()
    {
        return $this->fk_entretien;
    }

    /**
     * @param int $fk_entretien
     */
    public function setFkEntretien($fk_entretien)
    {
        $this->fk_entretien = $fk_entretien;
    }

    /**
     * @return string
     */
    public function getLienPhotoEntretienFacture()
    {
        return $this->lien_photo_entretien_facture;
    }

    /**
     * @param string $lien_photo_entretien_facture
     */
    public function setLienPhotoEntretienFacture($lien_photo_entretien_facture)
    {
        $this->lien_photo_entretien_facture = $lien_photo_entretien_facture;
    }
}