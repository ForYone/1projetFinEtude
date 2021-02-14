<?php
include "Vues/AProposVues.php";

class AProposContorlleur extends AProposVues
{

    public function controlleurAPropos()
    {

        $this->pageAPropos();
    }
}

$aProposControlleur = new AProposContorlleur();
$aProposControlleur->controlleurAPropos();
