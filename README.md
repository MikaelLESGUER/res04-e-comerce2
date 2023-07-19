# res04-e-comerce2
deux projet e-commerce
res04-php-e-commerce
Nos classes

    User
    Product
    Product_Category
    Order
    Address

Controllers & Managers

    On utilise des classes abstraites. Pour modifier l'accès à la base de données il faut se rendre dans le fichier AbstractManager.php
    La logique pour les products se trouvent dans le controller Product_CategoryController.php. ProductController.php ne sert pas.

Fonctionnalités
Ce qui fonctionne :

    Créer un utilisateur
    Se connecter

Ce qu'on n'a pas encore vérifié :

    Se déconnecter

Ce qui n'est pas encore fait :

    Les controller & manager pour Address.php -> on souhaite utiliser AddressManager dans OrderController pour afficher les adresses de livraisons pour chaque commandes passées.

Autres informations :

Notre router n'est pas en POO (en gros c'est pas comme dans la correction du projet distorsion).