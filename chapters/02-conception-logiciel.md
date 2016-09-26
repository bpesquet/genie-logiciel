# La conception d'un logiciel



La phase de conception intervient traditionnellement vers le début d'un projet logiciel, lorsque les besoins auquel le logiciel doit répondre sont suffisamment identifiés. 

## La phase de conception

### Définition et objectifs

### Enjeux actuels

## L'architecture logicielle

### Qu'est-ce que l'architecture logicielle ?

Le Petit Robert définit l'architecture comme étant **l'art de construire les édifices**.

Le terme d'architecture est avant tout lié au domaine de la construction de bâtiments : on pense à l'architecture d'un monument ou encore  d'un pont. L'architecture s'applique également à d'autres domaines comme la construction aéronautique, navale, l'électronique ou encore l'informatique. 

Par anaalogie, on peut définir l'architecture logicielle comme étant **l'art de construire les logiciels**.

> L'architecture logicielle est parfois appelée *architecture applicative*.

### La nécessité de l'architecture logicielle

Revenons au sens premier du mot "architecture". Même sans être un expert du domaine, on n'imagine pas se lancer dans la construction d'un bâtiment sans avoir prévu son apparence, étudié ses fondations et son équilibre, choisi les matériaux utilisés, etc. Dans le cas contraire, on va au-devant de graves désillusions...

![](../images/archi-bat.png)

Cette problématique se retrouve dans le domaine informatique. Comme un bâtiment, un logiciel est fait pour durer dans le temps. Il est fréquent que des projets informatiques aient une durée de vie de plusieurs années. Plus encore qu'un bâtiment, un logiciel va, tout au long de son cycle de vie, connaître de nombreuses modifications qui aboutiront à la livraison de nouvelles versions, majeures ou mineures. Les évolutions par rapport au produit initialement créé sont souvent nombreuses et très difficiles à prévoir au début du projet.

Par exemple, le logiciel [VLC](http://www.videolan.org/vlc/) n'était à l'origine qu'un projet étudiant destiné à diffuser des vidéos sur le campus de l'Ecole Centrale de Paris. Sa première version remonte à l'année 2001.

Tout logiciel, au-delà d'un niveau minimal de complexité, est un édifice qui mérite une phase de réflexion préalable au développement (codage). On parle de phase de **conception** ou encore d'**ingénierie**. Au cours de cette phase, on effectue les grands choix structurant le projet : langages et technologies utilisées, découpage en sous-modules, etc. On définit également l'architecture du nouveau logiciel.

> Les évolutions d'un projet logiciel peuvent nécessiter de nouvelles phases de conception tout au long de sa vie.

### Les objectifs de l'architecture logicielle

Dans le domaine de la construction, les objectifs de l'architecture sont que le bâtiment construit réponde aux besoins qu'il remplit, soit robuste dans le temps et (notion plus subjective) agréable à l'oeil. 

L'architecture logicielle poursuit les mêmes objectifs. Le logiciel créé doit répondre aux besoins et résister aux nombreuses modifications qu'il subira au cours de son cycle de vie. Contrairement à un batîment, un logiciel mal conçu ne risque pas de s'effondrer. En revanche, une mauvaise conception peut faire exploser le **temps** nécessaire pour réaliser les modifications, et donc leur **coût**.

L'architecture logicielle vise à réduire les coûts (création et surtout maintenance/évolutions) et à augmenter la **qualité** du logiciel. 

### L'importance des composants logiciels

Un bâtiment s'édifie à partir de morceaux de bases, par exemple des briques ou des moellons. De la même manière, une carte mère est conçue par assemblage de composants électroniques.

Longtemps, l'informatique a gardé un côté artisanal : chaque programmeur recréait la roue dans son coin pour les besoins de son projet. Mais nous aommes passés depuis plusieurs années à une ère industrielle. Des logiciels de plus en plus complexes doivent être réalisés dans des délais de plus en plus courts, tout en maintenant le meilleur niveau de qualité possible. Une réponse à ces exigences contradictoires passe par la réutilisation de briques logicielles de base appelées librairies, modules ou encore **composants**. 

En particulier, la mise à disposition de milliers de projets *open source* via des plates-formes comme [GitHub](https://github.com) ou des outils comme [NuGet](https://www.nuget.org/), [composer](https://getcomposer.org/) ou [npm](https://www.npmjs.com/) a permis aux équipes de développement de faire des gains de productivité remarquables. A l'heure actuelle, il n'est pas de logiciel de taille significative qui n'intègre plusieurs dizaines, voire des centaines de composants externes.

![](../images/opensource-wide.png)

Déjà testé et éprouvé, un composant fait simultanément baisser le temps et augmenter la qualité du développement. Il permet de limiter les efforts nécessaires pour traiter les problématiques *techniques* pour se concentrer sur les problématiques *métier*.

Voici parmi bien d'autres quelques exemples de problématiques techniques adressables par des composants logiciels :

* Accès à une base de données (connexion, exécution de requêtes).
* Calculs scientifiques.
* Gestion de l'affichage (moteur 3D).
* Journalisation des évènements dans des fichiers.
* ...

## Architecture d'une application informatique

### Les trois problématiques d'une application

Revenons à la définition basique de ce qu'est un logiciel : il sert à automatiser un traitement sur des données. Son résultat dépend des données qui lui sont fournies. On peut schématiser un logiciel de manière suivante : E-T-R (Entrées – Traitements - Résultats).

Toute application informatique est confrontée à trois problématiques :
Il doit gérer les interactions avec l'extérieur, en particulier l'utilisateur : saisie et contrôle de données, affichage. C'est la problématique de présentation.
Il doit effectuer sur les données des opérations (calculs) en rapport avec les règles métier ("business logic"). C'est la problématique des traitements.
Il doit pouvoir accéder et stocker les informations qu'il manipule, notamment entre deux utilisations. C'est la problématique des données.

Remarque : dans certains cas, l'une ou l'autre problématique seront très réduites (logiciel sans utilisateur, pas de stockage des données, etc).

Analysons par exemple une application console de TVA (calcul du prix TTC à partir du prix HT).
Présentation : saisie du prix HT, affichage du prix TTC.
Traitements : calcul et ajout de la TVA.
Données : stockage du taux de TVA

Autre exemple : un site Web de commerce en ligne.
Présentation : affichage des produits, saisie des choix des utilisateurs...
Traitements : calcul du prix de la commande, mise à jour des stocks...
Données : stockage des informations sur les produits

La phase de conception d'une application va consister, entre autres, à choisir comment sont gérées ces trois problématiques, autrement dit à les répartir dans l'application créée.

Possibilités de répartition des problématiques
Architecture monobloc
A l'époque de l'informatique centralisée (années 1970-80), les trois problématiques étaient intimement liées et regroupées sur un seul serveur (mainframe). Les utilisateurs se connectaient aux applications exécutées sur ce serveur à l'aide de terminaux passifs. Accès aux données, traitements et affichage étaient gérés par la même machine. Malgré ses avantages (facilité d'administration, sécurité), cette architecture souffre d'un gros défaut : elle ne permet pas d'offrir aux utilisateurs une interface graphique évoluée. L'exemple du Minitel illustre bien cette architecture.

Au cours des années 1980, la généralisation des micro-ordinateurs personnels (PC) a permis l'apparition d'applications monobloc et mono-utilisateur déployées sur chaque machine cliente. Si cette solution apporte une grande richesse fonctionnelle, elle est peu satisfaisante dans le cadre d'un travail multi-utilisateurs et sur le plan de la sécurité. Une application mono-utilisateur basée sur Microsoft Access constitue un exemple représentatif des architectures monobloc.

Architecture client/serveur
Pour concilier les avantages d'un mainframe et les possiblités d'interface d'une application mono-utilisateur, on a imaginé de scinder les logiciels en deux parties distinctes mais coopérantes : c'est le principe du client/serveur. La problématique de gestion des données est centralisée sur le serveur et la problématique de présentation relève de chaque machine cliente. La problématique des traitements peut être entièrement centralisée, entièrement décentralisée ou bien répartie entre serveur et clients. Ce type d'architecture suppose l'existence d'un réseau reliant les machines entre elles à un débit suffisant. 


Dans une solution de type client/serveur, les données centralisées peuvent potentiellement être manipulées simultanément par plusieurs clients. Pour cette raison, leur gestion est souvent assurée par un SGBD, qui offre de solides garanties en termes de fiabilité et de performances.

Une application Winforms se connectant à une base de données ORACLE ou MySQL constitue un exemple d'application client/serveur. Cette architecture sera abordée en détail plus loin.

Architecture trois-tiers
Afin de refléter naturellement la présence de trois problématiques, les applications trois-tiers ont fait leur apparition. Ici, présentation, traitements et gestion des données sont assurés par des parties bien distinctes. Le tiers "présentation" n'accède jamais directement au tiers "données", mais utilise les services du tiers "traitements".

Cette solution permet la simplification du logiciel client qui ne se consacre qu'à de la présentation (affichage, saisie). Depuis l'explosion de l'Internet dans les années 1990, le logiciel client est le plus souvent un navigateur Web. Le trio navigateur - serveur Web - SGBD constitue un exemple d'architecture trois-tiers très souvent mise en place de nos jours.



Nous étudierons cette architecture dans la seconde moitié du semestre.

Architecture n-tiers
Cette solution (également appelée architecture multi-tiers) est un raffinement de l'architecture précédente. Dans le cadre d'applications de taille importante, la couche de gestion des traitements tend à devenir complexe. Reprenons l'exemple d'une application Web accédant à une base de données. Le serveur Web doit gérer de nombreuses problématiques : sessions des clients, génération des pages Web, logique métier, accès aux données... Cette complexité nécessite une grande rigueur dans la conception du serveur. 

L'idée de l'architecture multi-tiers est de découper à nouveau le niveau des traitements en plusieurs sous-couches. Une décomposition possible est la suivante:
Une couche Services qui expose les fonctionnalités et permet la gestion des clients.
Une couche Domaine centralisant la logique et les règles métier spécifiques.
Une couche Persistance qui assure l'accès et la sauvegarde des données.


Cette architecture complexe ne sera pas détaillée cette année.
L'architecture client/serveur
Description
Cette architecture consiste à répartir les trois problématiques entre deux types d'entité : des clients associés à un (ou plusieurs) serveur(s). 

Dans ce cas de figure, l'application est constituée de deux types de logiciels qui tournent sur des machines distinctes reliées en réseau :
Le logiciel client s'occupe de la problématique de présentation.
Le logiciel serveur gère la problématique des données.
La problématique des traitements est répartie entre clients et serveur.

Par extension, le client désigne également l'ordinateur sur lequel est exécuté le logiciel client, et le serveur, l'ordinateur sur lequel est exécuté le logiciel serveur.

Le fonctionnement en mode client/serveur est très souvent utilisé en informatique. Un réseau Windows organisé en domaine, la consultation d'une page hébergée par un serveur Web ou le téléchargement d'une application mobile depuis un magasin central (App Store, Google Play) en constituent des exemples.

En général, les serveurs sont des ordinateurs dédiés au(x) logiciel(s) serveur qu'ils abritent, et dotés de capacités supérieures à celles des ordinateurs personnels. Les clients sont souvent des ordinateurs personnels ou des terminaux mobiles (téléphone, tablette). Il existe une grande variété de logiciels serveurs et de logiciels clients en fonction des besoins à servir : un serveur web publie des pages web demandées par des navigateurs web ; un serveur de messagerie électronique envoie des mails à des clients de messagerie ; un serveur de fichiers permet de stocker et consulter des fichiers sur le réseau, etc.

Le client et le serveur doivent bien sûr être reliés en réseau et utiliser le même protocole de communication (voir plus loin). On parle souvent d'un service pour désigner la fonctionnalité offerte par un processus serveur (voir cours SI5).

Contexte d'exemple
Dans ce cours et les suivants, nous allons nous intéresser à une application de gestion des comptes bancaires d'une banque, nommée NETBank. Celle-ci permet, dans une première version, de consulter les caractéristiques d'un compte (numéro, titulaire et solde).

Les données persistantes (informations sur les comptes) sont stockées dans une base de données MySQL (problématique des données). Le logiciel serveur est donc un SGBDR. Il n'effectue aucun traitement sur ces données.

L'affichage et la saisie (problématique de présentation) sont effectués par une application cliente Winforms. Par la suite, cette application hébergera la logique métier (problématique des traitements).

Avantages et inconvénients
Le principal avantage de l'architecture client/serveur tient à la centralisation des données. Stockées à un seul endroit, elles sont plus faciles à sauvegarder et à sécuriser. Le serveur qui les héberge peut être dimensionné pour pouvoir héberger le volume de données nécessaire et répondre aux sollicitations de nombreux clients.

Cette médaille a son revers : le serveur constitue le noeud central du système et représente son maillon faible. En cas de défaillance (surcharge, indisponibilité, problème réseau), les clients ne peuvent plus fonctionner.

Types de clients
L'architecture client/serveur peut fonctionner avec plusieurs types de client.

Client léger
On appelle client léger un logiciel client qui ne gère que la problématique de présentation. Tous les traitements sont à la charge du serveur. De nos jours, le client léger est presque exclusivement un navigateur Web.

L'utilisation d'un client léger offre l'immense avantage de simplifier l'installation de l'application sur les postes client (on parle de déploiement). Tous les ordinateurs et autres dispositifs mobiles disposent d'un navigateur Web. La mise à jour de l'application est également facilitée : il suffit de mettre à jour le logiciel serveur. En revanche, les possibilités de présentation sur le poste client restaient, jusqu'à une époque très récente, limitées.

Client lourd
On appelle client lourd un logiciel client conçu spécialement pour communiquer avec le serveur et afficher ses données. Le client lourd effectue au moins une partie des traitements sur les données, voire la totalité.

La richesse des possibilités de présentation offertes par les langages récents (Java, C#) est le principal avantage apporté par l'emploi d'un client lourd. En revanche, le logciel client doit être installé et mis à jour sur chaque poste utilisateur, qui doit être capable de supporter la charge de calcul et d'affichage.


Notre application Winforms NETBank est un exemple de client lourd. Une application écrite pour un terminal mobile (smartphone, tablette) est également un client lourd.

Client riche
On appelle client riche un logiciel client capable de combiner les avantages du client léger (facilité de déploiement) avec ceux du client lourd (richesse de présentation).

Le plus souvent, il s'agit d'un navigateur Web qui utilise des technologies de présentation évoluées (bibliothèques Javascript, AJAX, HTML5, etc) pour offrir une expérience utilisateur comparable à celle d'un client lourd.

Le lien entre client et serveur
Nous avons vu que la communication entre clients et serveur s'effectuait via un réseau informatique. Il peut s'agir d'un LAN ou bien d'un réseau public, le plus souvent Internet.

Le protocole utilisé doit bien entendu être commun. Dans le cas d'un serveur Web, il s'agit du protocole HTTP. Dans le cas d'un client lourd, il est lié à la technologie cliente utilisé. Plutôt que de développer un protocole spécifique, on s'appuie sur un standard, par exemple ODBC ou encore OLE DB pour s'adresser à une base de données. Ces technologies sont ce qu'on appelle des logiciels médiateur ou middleware. Ce concept sera détaillée en SLAM4.

Notre client NETBank utilise un fournisseur d'accès spécifique à MySQL.