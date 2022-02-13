
# HotHotHot
HotHotHot est une application dont le rôle est d’être une interface d’information et 
de gestion d’un système domotique. 
Cette application reçoit des données en provenance de différents capteurs (ex, 
température, humidité, état d’un périphérique etc.) 
Elle affiche ces données, leur historique si nécessaire et propose des suggestions, 
émet des alertes à l’attention des utilisateurs. 

#### C'est dans ce sujet que s'incrit notre interprétation d'HotHotHot

### Notre groupe :
#### Les mousquetaires
- Mario Ferrali 
- Sylvain Coupard
- Titouan Reynaud
- Tom Guastapaglia
- Vincent Asta
 
 ## Les fonctionnalités
 Nous avons essayé de suivre le plus fidèlement possible le sujet mais nous avons rencontré des difficultés au cours du développement.
 De ce fait, vous trouverez ci-dessous les fonctionnalités que nous avons réussi à mener à terme. 

 - Liste des utilisateurs
 - Documentations
 - Inscription et Connexion sécurisée
 - CRUD
 - Date de création et de connexion des utilisateurs
 - Page paramètres
 - Autoloader pour les modules
 - Page de connexion responsive
 - Interface d'administration
 - Blocage de compte
 
 #### Parmi les fonctionnalités que nous avons abandonné vous retrouverez : 
 - Le PWA après de nombreuses tentatives nous avons décidé d'économiser du temps de travail pour permettre de pousser d'avantage d'autres aspects de l'application.
 - L'utilisation du Websocket, nous avons mis en place un système pour stocker en base de données les valeurs récupérées par un script exécuté avec un Cronjob. Suite à de nombreux echecs de connexion avec le websocket nous avons finalement gardé des données en dur pour éviter de grosses erreurs et pour garder un affichage fonctionnel.
 - Nous avons également développé la récupération de mot de passe pour les utilisateurs mais nous avons eu des difficultés avec la réception des e-mails à cet effet.
