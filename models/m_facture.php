<?php
require_once PATH_MODELS . 'Model.php';
require_once 'assets/fpdf/fpdf.php';

class Facture extends fpdf
{
    private $nom_facture;
    private $id_panier;
    private $commande;

    function __construct()
    {
        parent::__construct();
        $this->id_panier = $_SESSION['idPanier'];
        $this->commande = new Panier();
        $this->nom_facture = "Facture";
    }
//reste a faire 
//nom générer correquement
//adresse
//
    public function generer_facture(){
        $date = date('Y-m-d');
        $nom_facture = "$date-Commande-Facture.pdf";
        $header = array("Nom du produit", "Quantité", "Prix unitaire", "Sous total");
        $taille = array(80, 30, 40, 40);
        $requete_commande = $this->commande->getPanier($this->id_panier)->fetchAll();
        $tab_commande = array();
        
        foreach ($requete_commande as $ligne){
            $tab = array($ligne['name'], $ligne['quantity'], $ligne['price'], $ligne['quantity']*$ligne['price']);
            array_push($tab_commande, $tab);
        }
        /*select P.cat_id, P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
            join orderitems OI on OI.order_id=O.id
            join products P on P.id=OI.product_id*/
        ob_start();
        $this->SetTitle("Facture");
        $this->AddPage();
        $this->SetFont('Helvetica','',16);
        $this->Cell(40 ,10 ,'Hello World !');
        $this->Ln();
        $this->ImprovedTable($header, $taille, $tab_commande);
        $this->Output('D', $nom_facture, true);
        ob_end_flush();
    }

    function Header(){
        // Logo
        $this->Image('assets/productimages/Web4ShopHeader.png',10,6,45);
        // Police Arial gras 15
        $this->SetFont('Helvetica','',24);
        $this->SetTextColor(120, 194, 193);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30,10,$this->nom_facture, 0);
        // Saut de ligne
        $this->Ln(20);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,$this->PageNo(),0,0,'C');
    }

    // Tableau amélioré
    //Contrainte, size doit faire la même taille qu'header
    function ImprovedTable($header, $size, $data){
        // En-tête
        $this->SetFont('Helvetica','B',14);
        $this->SetFillColor(243, 150, 179);
        for($i=0;$i<count($header);$i++){
            $this->Cell($size[$i],7,$header[$i],0,0,'',1);
        }
        $this->Ln();

        // Données
        $i=0;
        $fill = true;
        $this->SetFont('Helvetica','',14);
        foreach($data as $row)
        {
            if($i%2==0){
                $this->SetFillColor(252, 193, 56);
            }
            else{
                $this->SetFillColor(120, 194, 193);
            }
            //$this->Cell("size", "hauteur", "contenu", "border", "ln", "align", "fill")
            $this->Cell($size[0],6,$row[0], 0, 0, '', 1);
            $this->Cell($size[1],6,$row[1], 0, 0, '', 1);
            $this->Cell($size[2],6,$row[2], 0, 0, '', 1);
            $this->Cell($size[3],6,$row[3], 0, 0, '', 1);
            $this->Ln();
        }
        //$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        // Trait de terminaison
        //$this->Cell(array_sum($size),0,'','T');
    }
    
    
    
    
}
