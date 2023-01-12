<?php
require_once PATH_MODELS . 'Model.php';



class Admin extends Model
{

    // Renvoie la liste des commandes en cours
    function getCommandes()
    {
        $sql = 'select o.id, D.firstname, D.lastname, D.add1, D.add2, D.city, D.postcode, O.date, O.payment_type, O.total from orders O
                join delivery_addresses D on D.id = O.delivery_add_id
                where status = 2';
        $commandes = $this->executerRequete($sql, array());
        return   $commandes;
    }



    function getIdCommandes()
    {
        $sql = 'select id from orders
            where status = 2';
        $commandes = $this->executerRequete($sql, array());
        return   $commandes;
    }

    function getPanier($idCommande)
    {
        $sql = 'select P.cat_id, P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
            join orderitems OI on OI.order_id=O.id
            join products P on P.id=OI.product_id
            where O.id = ?';
        $panier = $this->executerRequete($sql, array($idCommande));

        return   $panier;
    }

    function getAdresse($idCommande)
    {
        $sql = 'select D.firstname, D.lastname, D.add1, D.add2, D.city, D.postcode from orders O
            join delivery_addresses D on D.id=O.delivery_add_id
            where O.id = ?';
        $adresse = $this->executerRequete($sql, array($idCommande));

        if ($adresse->rowCount() == 1)   return $adresse->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune adresse de livraison l'identifiant '$adresse'");
    }

    function cloturer($idCommande)
    {
        //ON met à jour le statut de la commande
        $sql = 'UPDATE orders O
                SET O.status = 10
                WHERE id=?';
        $this->executerRequete($sql, array($idCommande));
    }

    function changerQuantiteStock($idProduit, $nvQuantite)
    {
        $sql = 'UPDATE products
                SET quantity = ?
                WHERE id = ?';
        $this->executerRequete($sql, array($nvQuantite, $idProduit));
    }

    function changerPrixStock($idProduit, $nvQuantite)
    {
        $sql = 'UPDATE products
                SET price = ?
                WHERE id = ?';
        $this->executerRequete($sql, array($nvQuantite, $idProduit));
    }



    function refusser($idCommande)
    {
        //On supprime la comande
        $sql = 'UPDATE products
                SET quantity = ?
                WHERE id = ?';
        $this->executerRequete($sql, array($idCommande));

        //On rajoute les quantité enlever du stock lors de la commande
        foreach ($this->getPanier($idCommande) as $p) {
            $sql = 'SELECT quantity from products
                    where id = ?';
            $stock = $this->executerRequete($sql, array($p['id']));

            $this->changerQuantiteStock($p['id'], $stock + $p['quantity']);
        }

        //On supprime les orderitems liés
        $sql = 'DELETE FROM orderitems WHERE order_id = ?';
        $this->executerRequete($sql, array($idCommande));
    }

    function getProduits()
    {
        $sql = 'SELECT id, cat_id, name, image, price, quantity  FROM products';
        return  $this->executerRequete($sql, array());
    }
}
