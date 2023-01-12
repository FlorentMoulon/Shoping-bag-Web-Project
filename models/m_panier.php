<?php
require_once PATH_MODELS . 'Model.php';



class Panier extends Model
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

    // Renvoie le prix total de la commande
    function getTotal($idPanier)
    {
        $sql = 'select O.total from orders O
            where O.id = ?';
        $panier = $this->executerRequete($sql, array($idPanier));

        if ($panier->rowCount() == 1)   return $panier->fetch()['total']; // Accès à la première ligne de résultat 
        else throw new Exception("Aucune commande ne correspond à l'identifiant '$idPanier'");
    }

    function changerTotal($idPanier)
    {
        //on récupère les produits (quantité et prix)
        $sql = 'SELECT OI.quantity, P.price from orders O 
            join orderitems OI on OI.order_id=O.id 
            join products P on P.id=OI.product_id 
            WHERE O.id = ? ';
        $panier = $this->executerRequete($sql, array($idPanier));

        //on calcule le total
        $total = 0;
        foreach ($panier as $d) {
            $total += $d['quantity'] * $d['price'];
        }

        //on l'update dans la BDD
        $sql = 'UPDATE orders
            SET total = ?
            WHERE id = ?';
        $this->executerRequete($sql, array($total, $idPanier));
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


    function creerPanier()
    {
        //on récupère l'id existant le plus élévé
        $sql = 'SELECT max(id) FROM orders';
        $id_max = $this->executerRequete($sql, array());
        if ($id_max->rowCount() == 1)   $id_max = $id_max->fetch()['max(id)'];
        else throw new Exception("Pas de max '$id_max'");
        //on ajoute 1 pour avoir avoir un id libre
        $id_max++;

        //on regarde si l'utilisateur est connecté
        if (empty($_SESSION['id'])) {
            $registered = 0;
            $id_customer = -1;
        } else {
            $registered = 1;
            $id_customer = $_SESSION['id'];
        }

        $sql = "insert INTO orders 
                VALUES(?, ?, ?, -1, 'none', ?, 0, '----------', 0)";
        $this->executerRequete($sql, array($id_max, $id_customer, $registered, date('Y-m-d')));

        return $id_max;
    }

    function ajouterProduit($idPanier, $idProduit, $quantite)
    {
        //on regarde s'il y a déjà un produit avec cette id dans le panier
        $sql = 'SELECT quantity FROM orderitems 
                WHERE product_id = ? and order_id = ?';
        $quantiteDansLePanier = $this->executerRequete($sql, array($idProduit, $idPanier));
        if ($quantiteDansLePanier->rowCount() == 1) {
            // si le produit est déjà dans le panier on change juste la quantité
            $quantiteDansLePanier = $quantiteDansLePanier->fetch()['quantity'];
            $this->changerQuantite($idPanier, $idProduit, $quantiteDansLePanier + $quantite);
        } else {
            // sinon un créer un nouveau orderitem

            //on récupère l'id existant le plus élévé
            $sql = 'SELECT max(id) FROM orderitems';
            $id_max = $this->executerRequete($sql, array());
            if ($id_max->rowCount() == 1)   $id_max = $id_max->fetch()['max(id)'];
            else throw new Exception("Pas de max '$id_max'");
            //on ajoute 1 pour avoir avoir un id libre
            $id_max++;


            $sql = 'insert into orderitems
                values(?,?,?,?)';
            $this->executerRequete($sql, array($id_max, $idPanier, $idProduit, $quantite));
        }

        $this->changerTotal($idPanier);
    }

    function supprimerProduit($idPanier, $idProduit)
    {
        $sql = 'DELETE from orderitems
            WHERE product_id = ? and order_id=?';
        $this->executerRequete($sql, array($idProduit, $idPanier));

        $this->changerTotal($idPanier);
    }

    function changerQuantite($idPanier, $idProduit, $nvQuantite)
    {
        $sql = 'UPDATE orderitems
            SET quantity = ?
            WHERE product_id = ? and order_id=?';
        $this->executerRequete($sql, array($nvQuantite, $idProduit, $idPanier));

        $this->changerTotal($idPanier);
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
}
