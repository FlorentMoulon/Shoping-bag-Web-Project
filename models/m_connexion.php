<?php
require_once PATH_MODELS . 'Model.php';


//FAIRE UNE GROSSE FUSION ??
class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = "SELECT customer_id
        FROM Logins 
        WHERE username = ? and password = ?";

        $sql_admin = "SELECT id 
        FROM admin
        WHERE username = ? and password = ?";

        $id_user = $this->executerRequete($sql, array($_POST['Username'], $_POST['Password']))->fetch();
        try{
            if($id_user!=''){
                $_SESSION['id'] = $id_user['customer_id'];
                return "<div class = \"alert alert-success\" role = \" alert\"> Connection effectuée </div>";
            }
            else{
                $id_user = $this->executerRequete($sql_admin, array($_POST['Username'], $_POST['Password']))->fetch();
                if($id_user!=''){
                    $_SESSION['id'] = $id_user['id'];
                    $_SESSION['admin'] = 1;
                    return "<div class = \"alert alert-success\" role = \" alert\"> Connection admin effectuée </div>";
                }
                return "<div class = \"alert alert-warning\" role = \" alert\"> Mot de passe ou login incorrect </div>";
            }
        }
        catch (Exception $e){
            return "<div class = \"alert alert-warning\" role = \" alert\"> Erreur : Mot de passe ou login incorrect </div>";
        }
    }
}


class Enregistrement extends Model{
    function enregistrer($array_customer, $array_delivery, $array_logins)
    {
        $id_customer =  $this->executerRequete("Select max(id) from customers")->fetch()['max(id)']+1;
        //$this->getIdMax("customers");

        $insert_customer = "INSERT INTO customers 
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $tab_customer =  array_merge(array($id_customer), $array_customer, array(1));
        $this->executerRequete($insert_customer, $tab_customer);


        $id_log =  $this->executerRequete("Select max(id) from logins")->fetch()['max(id)']+1;

        $insert_logins = "INSERT INTO LOGINS 
        VALUES  (?, ?, ?, ?);";

        $tab_logins = array_merge(array($id_log, $id_customer), $array_logins);

        $this->executerRequete($insert_logins, $tab_logins);
        $_SESSION['id_customer'] = $id_customer;
        return "<p class = \" success-warning\"> Compte correctement créé</p>";
    }

    function verifieMail($mail){
        $sql = "SELECT email
        FROM customers 
        WHERE email=?";
        $mel = $this->executerRequete($sql, array($mail));
        return ($mel->rowCount()==0);
    }

}

class Compte extends Model{
    function majLogins($logins){
        $sql = "UPDATE logins 
                SET username = ?, password = ?
                WHERE id = ?";
        $this->executerRequete($sql, $logins);
    }

    function majCustomer($customer){
        $sql_delivery = "UPDATE delivery_addresses
                        SET firstname = ?, lastname = ?, add1 =? , add2 = ?, city = ?, postcode = ?, phone = ?, email = ?
                        WHERE id =?";
        $sql_customers = "UPDATE customers
                        SET forname = ?, surname = ?, add1 =? , add2 = ?, add3 = ?, postcode = ?, phone = ?, email = ?
                        WHERE id =?";

        $this->executerRequete($sql_customers, $customer);
        $this->executerRequete($sql_delivery, $customer);
    }

    public function getInfos(){
        $pseudo = $this->getPseudo($_SESSION['id']);
        if(isset($_SESSION['admin'])){
            $prenom = $nom = $rue = $c_rue = $ville = $code_p = $tel = $mail = "";
            $donnees = array(
                /*'msg' => $msg,*/
                'nom' => $nom,
                'prenom' => $prenom,
                'rue' => $rue,
                'c_rue' => $c_rue,
                'ville' => $ville,
                'code_p' => $code_p,
                'tel' => $tel,
                'mail' => $mail,
                'pseudo' => $pseudo
            );
        }
        else{
            $tab_infos = $this->getAdresse($_SESSION['id']);
            $donnees = array(
                /*'msg' => $msg,*/
                'nom' => $tab_infos['surname'],
                'prenom' => $tab_infos['forname'],
                'rue' => $tab_infos['add1'],
                'c_rue' => $tab_infos['add2'],
                'ville' => $tab_infos['add3'],
                'code_p' => $tab_infos['postcode'],
                'tel' => $tab_infos['phone'],
                'mail' => $tab_infos['email'],
                'pseudo' => $pseudo
            );
            return $donnees;
            //$msg =""; 
        }   
    }

    

    function getAdresse($idUser){
        $sql = 'select forname, surname, phone, email, add1, add2, add3, postcode from customers
            where id = ?';
        $adresse = $this->executerRequete($sql, array($idUser));

        if ($adresse->rowCount() == 1) return $adresse->fetch(); // Accès à la première ligne de résultat
        else return;
    }

    function getPseudo(){
        if (isset($_SESSION['admin'])){
            $sql = "SELECT username
            FROM admin
            WHERE id = ?";
        }
        else{
            $sql = "SELECT username
            FROM logins
            WHERE customer_id = ?";
        }

        $pseudo = $this->executerRequete($sql, array($_SESSION['id']));
        
        if ($pseudo->rowCount() == 1)   return $pseudo->fetch()['username']; // Accès à la première ligne de résultat 
        else throw new Exception("Erreur dans l'accès au compte");
    }

}

