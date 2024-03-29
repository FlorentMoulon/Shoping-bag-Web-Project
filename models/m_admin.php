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


    // Renovoie les ids des dommande en cours
    function getIdCommandes()
    {
        $sql = 'select id from orders
            where status = 2';
        $commandes = $this->executerRequete($sql, array());
        return   $commandes;
    }

    // Récupère les produits du panier d'une commandes
    function getPanier($idCommande)
    {
        $sql = 'select P.cat_id, P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
            join orderitems OI on OI.order_id=O.id
            join products P on P.id=OI.product_id
            where O.id = ?';
        $panier = $this->executerRequete($sql, array($idCommande));

        return   $panier;
    }

    // Récupère l'adresse de livraison d'une commande
    function getAdresse($idCommande)
    {
        $sql = 'select D.firstname, D.lastname, D.add1, D.add2, D.city, D.postcode from orders O
            join delivery_addresses D on D.id=O.delivery_add_id
            where O.id = ?';
        $adresse = $this->executerRequete($sql, array($idCommande));

        if ($adresse->rowCount() == 1)   return $adresse->fetch(); // Accès à la première ligne de résultat 
        else throw new Exception("Aucune adresse de livraison l'identifiant '$adresse'");
    }

    // Clorure une commande, c'est à dire confirmer la préparation et la mettre au statut 10
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


    // Refuse une commande, c'est à dire annule la commande et restitu les sctocks
    function refuser($idCommande)
    {
        //On rajoute les quantité enlever du stock lors de la commande
        foreach ($this->getPanier($idCommande) as $p) {
            $sql = 'SELECT quantity from products
                    where id = ?';
            $stock = $this->executerRequete($sql, array($p['id']))->fetch()['quantity'];

            $this->changerQuantiteStock($p['id'], $stock + $p['quantity']);
        }

        //On supprime la comande
        $sql = 'DELETE FROM orders WHERE id = ?';
        $this->executerRequete($sql, array($idCommande));

        //On supprime les orderitems liés
        $sql = 'DELETE FROM orderitems WHERE order_id = ?';
        $this->executerRequete($sql, array($idCommande));
    }

    //Retourne tous les produits
    function getProduits()
    {
        $sql = 'SELECT id, cat_id, name, image, price, quantity  FROM products';
        return  $this->executerRequete($sql, array());
    }


    //Supprimere les commandes inachevé de plus d'un jour et leurs informations de la base de données.
    function nettoyerBDD()
    {
        //On récupère les commandes concernés
        $sql = 'SELECT id FROM orders
                WHERE status != 10 and status != 2 and date<?';
        $commandes = $this->executerRequete($sql, array(date('Y-m-d')));

        foreach ($commandes as $c) {
            //On supprime la comande
            $sql = 'DELETE FROM orders WHERE id = ?';
            $this->executerRequete($sql, array($c['id']));

            //On supprime les orderitems liés
            $sql = 'DELETE FROM orderitems WHERE order_id = ?';
            $this->executerRequete($sql, array($c['id']));
        }
    }
}
