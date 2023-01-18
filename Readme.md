# Technologie

Ce site marchand est codé en HTML et PHP avec une architecture MVC. Le CCS est basé sur Bootstrap 5 et la base de donnée sur MySQL. Pour la génération de facture nous utilisons la librairie fpdf.

# Plan du site

- **Accueil :**
- **Boissons :** Page avec la liste de toute les boissons.
  - **Boisson :** Page spécifique à la boisson sélectionnée, avec les commentaires et les infos.
- **Biscuits :** Page avec la liste de toute les biscuits.
  - **Biscuit :** Page spécifique au biscuit sélectionné, avec les commentaires et les infos.
- **Fruits Secs :** Page avec la liste de toute les fruits secs.
  - **Fruit Sec :** Page spécifique au fruit sec sélectionné, avec les commentaires et les infos.
- **Connexion :**
  - **Mon compte :** Déconnexion et modification des infos personnelles
  - **Page admin :** Déconnexion
    - **Commandes à préparer :** Liste de commande de statut = 2 (celle qu'il faut préparer et envoyer).
      - **Confirmer commande :** Détail de la commande sélectionnée et bouton de refus et de confirmation.
    - **Gérer les stocks :** Liste des produits et formulaire pour gérer les prix et les quantités.
- **Panier :** Panier de l'utilisateur, avec la liste de tous les produits commandés, leur prix, la quantité et le prix total de la commande.
  - **Choix de l'adresse :** Permet au client de sélectionner l'adresse de son compte ou d'en rentrer une nouvelle.
    - **Choix du mode paiement :** Permet au client de choisir entre payer par Paypal ou par chèque.
      - **Paypal :** Confirmation du paiement et bouton pour aller sur Paypal.
      - **Chèque :** Confirmation du paiement et création de la facture.

# Auteur

Projet réalisé par Laqueuvre Damien et Florent Moulon.
