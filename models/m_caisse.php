<?php
require_once PATH_MODELS . 'Model.php';



class Caisse extends Model
{
    // Renvoie la liste des objets dans le panier
    function getPanier($idPanier)
    {
        $sql = 'select P.cat_id, P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
                join orderitems OI on OI.order_id=O.id
                join products P on P.id=OI.product_id
                where O.id = ?';
        $panier = $this->executerRequete($sql, array($idPanier));
        return   $panier;
    }

    // Renvoie l'adresse d'un utilisateur, s'il en a une
    function getAdresse($idUser)
    {
        $sql = 'select forname, surname, phone, email, add1, add2, add3, postcode from customers
            where id = ?';
        $adresse = $this->executerRequete($sql, array($idUser));

        if ($adresse->rowCount() == 1) return $adresse->fetch(); // Accès à la première ligne de résultat
        else return;
    }

    function nouvelleAdresse($first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email)
    {
        //on récupère l'id existant le plus élévé
        $sql = 'SELECT max(id) FROM delivery_addresses';
        $id_max = $this->executerRequete($sql, array());
        if ($id_max->rowCount() == 1)   $id_max = $id_max->fetch()['max(id)'];
        else throw new Exception("Pas de max '$id_max'");
        //on ajoute 1 pour avoir avoir un id libre
        $id_max++;

        //on crée la nouvelle adresse dans la BDD
        $sql = "insert INTO delivery_addresses 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->executerRequete($sql, array($id_max, $first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email));

        return $id_max;
    }


    function changerAdresse($idPanier, $first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email)
    {

        $idAdresse = $this->nouvelleAdresse($first_name, $last_name, $add1, $add2, $city, $postcode, $phone, $email);

        $sql = 'UPDATE orders
            SET delivery_add_id = ?
            WHERE id = ?';
        $this->executerRequete($sql, array($idAdresse, $idPanier));

        $this->changerStatut($idPanier, 1);
    }

    function changerStatut($idPanier, $statut)
    {
        $sql = 'UPDATE orders O
            SET O.status = ?
            WHERE id=?';
        $this->executerRequete($sql, array($statut, $idPanier));
    }

    function changerModeDePaiement($idPanier, $mode)
    {
        $sql = 'UPDATE orders O
            SET O.payment_type = ?
            WHERE id=?';
        $this->executerRequete($sql, array($mode, $idPanier));
    }

    function changerQuantiteStock($idProduit, $nvQuantite)
    {
        $sql = 'UPDATE products
                SET quantity = ?
                WHERE id = ?';
        $this->executerRequete($sql, array($nvQuantite, $idProduit));
    }

    function updateStock($idCommande)
    {
        //On enlève les quantités de produits commandées du stock
        foreach ($this->getPanier($idCommande) as $p) {
            $sql = 'SELECT quantity from products
                    where id = ?';
            $stock = $this->executerRequete($sql, array($p['id']))->fetch()['quantity'];

            $this->changerQuantiteStock($p['id'], $stock - $p['quantity']);
        }
    }

    function finirCommande($idCommande)
    {
        $this->changerStatut($idCommande, 2);
        $this->updateStock($idCommande);

        unset($_SESSION['idPanier']);
    }
}
