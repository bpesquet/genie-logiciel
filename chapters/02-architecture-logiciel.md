# Architecture logicielle

L'objectif de ce chapitre est de présenter ce qu'est (et n'est pas) l'architecture logicielle.

## Introduction

### Définition

Le Petit Robert définit l'architecture comme étant **"l'art de construire les édifices"**. Ce mot est avant tout lié au domaine du génie civil : on pense à l'architecture d'un monument ou encore  d'un pont. 

Par analogie, l'architecture logicielle peut être définie comme étant **"l'art de construire les logiciels"**. 

Selon le contexte, l'architecture logicielle peut désigner :

* **L'activité d'architecture**, c'est-à-dire une phase au cours de laquelle on effectue les grands choix qui vont structurer une application : langages et technologies utilisés, découpage en sous-parties, méthodologies mises en oeuvre...
* **Le résultat de cette activité**, c'est-à-dire la structure d'une l'application, son squelette.

### Importance

Dans le domaine du génie civil, on n'imagine pas se lancer dans la construction d'un bâtiment sans avoir prévu son apparence, étudié ses fondations et son équilibre, choisi les matériaux utilisés, etc. Dans le cas contraire, on va au-devant de graves désillusions...

![](../images/archi-bat.png)

Cette problématique se retrouve dans le domaine informatique. Comme un bâtiment, un logiciel est fait pour durer dans le temps. Il est presque systématique que des projets informatiques aient une durée de vie de plusieurs années. Plus encore qu'un bâtiment, un logiciel va, tout au long de son cycle de vie, connaître de nombreuses modifications qui aboutiront à la livraison de nouvelles versions, majeures ou mineures. Les évolutions par rapport au produit initialement créé sont souvent nombreuses et très difficiles à prévoir au début du projet.

> Exemple : le logiciel [VLC](http://www.videolan.org/vlc/) n'était à l'origine qu'un projet étudiant destiné à diffuser des vidéos sur le campus de l'Ecole Centrale de Paris. Sa première version remonte à l'année 2001.

### Objectifs

Dans le domaine du génie civil, les objectifs de l'architecture sont que le bâtiment construit réponde aux besoins qu'il remplit, soit robuste dans le temps et (notion plus subjective) agréable à l'oeil. 

L'architecture logicielle poursuit les mêmes objectifs. Le logiciel créé doit répondre aux besoins et résister aux nombreuses modifications qu'il subira au cours de son cycle de vie. Contrairement à un bâtiment, un logiciel mal pensé ne risque pas de s'effondrer. En revanche, une mauvaise architecture peut faire exploser le temps nécessaire pour réaliser les modifications, et donc leur coût.

Les deux objectifs principaux de toute architecture logicielle sont la réduction des coûts (création et maintenance) et l'augmentation de la **qualité** du logiciel.

### Distinction entre architecture et conception

Il n'existe pas de vrai consensus concernant le sens des mots "architecture" et "conception" dans le domaine du développement logiciel. Ces deux termes sont souvent employés de manière interchangeable. Il arrive aussi que l'architecture soit appelée "conception préliminaire" et la conception proprement dite "conception détaillée". Certaines méthodologies de développement incluent la définition de l'architecture dans une phase plus globale appelée "conception".

Par souci de précision, on peut cependant faire la distinction suivante entre architecture et conception : 

* **L'architecture logicielle (*software architecture*)** considère le logiciel de manière globale. Il s'agit d'une vue de haut niveau qui définit le logiciel dans ses grandes lignes : que fait-il ? Quelles sont les sous-parties qui le composent ? Interagissent-elles ? Sous quelle forme sont stockées ses données ? etc.

* **La conception logicielle (*software design*)** intervient à un niveau de granularité plus fin et permet de préciser comment fonctionne chaque sous-partie de l'application. Quel logiciel est utilisé pour stocker les données ? Comment est organisé le code ? Comment une sous-partie expose-t-elle ses fonctionnalités au reste du système ? etc.

La perspective change selon la taille du logiciel et le niveau auquel on s'intéresse à lui :

* Sur un projet de taille modeste, architecture et conception peuvent se confondre. 
* A l'inverse, certaines sous-parties d'un projet de taille conséquente peuvent nécessiter en elles-mêmes un travail d'architecture qui, du point de vue de l'application globale, relève plutôt de la conception... 

## L'activité d'architecture

### Définition

Tout logiciel, au-delà d'un niveau minimal de complexité, est un édifice qui mérite une phase de réflexion initiale pour l'imaginer dans ses grandes lignes. Cette ohase correspond à l'activité d'architecture. Au cours de cette phase, on effectue les grands choix structurant le futur logiciel : langages, technologies, outils... Elle consiste notamment à identifier les différents éléments qui vont composer le logiciel et à organiser les interactions entre ces éléments.

Selon le niveau de complexité du logiciel, l'activité d'architecture peut être une simple formalité ou bien un travail de longue haleine. 

L'activité d'architecture peut donner lieu à la production de  **diagrammes** représentant les éléments et leurs interactions selon différents formalismes, par exemple UML.

### Place dans le processus de création

L'activité d'architecture intervient traditionnellement vers le début d'un projet logiciel, dès le moment où les besoins auxquels le logiciel doit répondre sont suffisamment identifiés. Elle est presque toujours suivie par une phase de conception.

Les évolutions d'un projet logiciel peuvent nécessiter de nouvelles phases d'architecture tout au long de sa vie. C'est notamment le cas avec certaines méthodologies de développement itératif ou agile, où des phases d'architecture souvent brèves alternent avec des phases de production, de test et de livraison.

### Répartition des problématiques

De manière très générale, un logiciel sert à automatiser des traitements sur des données. Toute application informatique est donc confrontée à trois problématiques :

* Gérer les interactions avec l'extérieur, en particulier l'utilisateur : saisie et contrôle de données, affichage. C'est la problématique de **présentation**.

* Effectuer sur les données des opérations (calculs) en rapport avec les règles métier ("business logic"). C'est la problématique des **traitements**.
 
* Accéder et stocker les informations qu'il manipule, notamment entre deux utilisations. C'est la problématique des **données**.

> Dans certains cas de figure, l'une ou l'autre problématique seront très réduites (logiciel sans utilisateur, pas de stockage des données, etc).

La phase d'architecture d'une application consiste aussi à choisir comment sont gérées ces trois problématiques, autrement dit à les répartir dans l'application créée.

## L'architecture d'un logiciel

Résultat de l'activité du même nom, l'architecture d'un logiciel décrit sa structure globale, son squelette. Elle décrit les principaux éléments qui composent le logiciel, ainsi que les flux d'échanges entre ces éléments. Elle permet à l'équipe de développement d'avoir une vue d'ensemble de l'organisation du logiciel, et constitue donc en elle-même une forme de documentation.

On peut décrire l'architecture d'un logiciel selon différents points de vue. Entre autres, une vue **logique** mettre l'accent sur le rôle et les responsabilités de chaque partie du logiciel. Une vue **physique** présentera les processus, les machines et les liens réseau nécessaires.

## Patrons d'architecture

Il n'existe pas une architecture logicielle parfaite qui s'adapterait à toutes les exigences.

Au fil du temps et des projets, plusieurs architectures-types se sont dégagées. Elles constituent des patrons d'architecture (*architecture patterns*) qui ont fait leurs preuves et peuvent servir d'inspiration pour un nouveau projet.

> Vous trouverez une description détaillée des principaux styles architecturaux à [cette adresse](https://msdn.microsoft.com/en-us/library/ee658117.aspx).

#### Architecture client/serveur

L'architecture client/serveur caractérise un système basé sur des échanges réeeau entre des clients et un serveur centralisé, lieu de stockage des données de l'application.

![](../images/client-serveur.png)

Le principal avantage de l'architecture client/serveur tient à la centralisation des données. Stockées à un seul endroit, elles sont plus faciles à sauvegarder et à sécuriser. Le serveur qui les héberge peut être dimensionné pour pouvoir héberger le volume de données nécessaire et répondre aux sollicitations de nombreux clients. Cette médaille a son revers : le serveur constitue le noeud central du système et représente son maillon faible. En cas de défaillance (surcharge, indisponibilité, problème réseau), les clients ne peuvent plus fonctionner.

On peut classer les clients d'une architecture client/serveur en plusieurs types :

* **Client léger**, destiné uniquement à l'affichage (exemple : navigateur web).
* **Client lourd**, application native spécialement conçue pour communiquer avec le serveur (exemple : application mobile).
* **Client riche** combinant les avantages des clients légers et lourds (exemple : navigateur web utilisant des technologies évoluées pour offrir une expérience utilisateur proche de celle d'une application native).

Le fonctionnement en mode client/serveur est très souvent utilisé en informatique. Un réseau Windows organisé en domaine, la consultation d'une page hébergée par un serveur Web ou le téléchargement d'une application mobile depuis un magasin central (App Store, Google Play) en constituent des exemples.

#### Architecture en couches

Une architecture en couches organise un logiciel sous forme de couches (*layers*). Chaque couche ne peut communiquer qu'avec les couches adjacentes.

![](../images/layered-architecture.png)

Cette architecture facilite la compréhension des échanges au sein de l'application.

Lorsque chaque couche correspond à un processus distinct sur une machine, on parle d'architecture **n-tiers**, `n` désignant le nombre de couches.

Un navigateur web accédant à des pages dynamiques intégrant des informations stockées dans une base de données constitue un exemple classique d'architecture 3-tiers.

![](../images/n-tier-architecture.png)

#### Architecture orientée services

Une architecture orientée services (SOA, *Service-Oriented Architecture*) décompose un logiciel sous la forme d'un ensemble de services métier utilisant un format d'échange commun, généralement XML ou JSON. 

Une variante récente, l'architecture microservices, diminue la granularité des services pour leur assurer souplesse et capacité à évoluer, au prix d'une plus grande distribution du système. L'image ci-dessous ([source](http://blog.octo.com/larchitecture-microservices-sans-la-hype-quest-ce-que-cest-a-quoi-ca-sert-est-ce-quil-men-faut/)) illustre la défférence entre ces deux approches.

![](../images/microservices.png)

### Architecture Modèle-Vue-Contrôleur

La patron Modèle-Vue-Contrôleur, ou **MVC**, décompose une application en trois sous-parties :

* La partie **Modèle** qui regroupe la logique métier ("business logic") ainsi que l'accès aux données. Il peut s'agir d'un ensemble de fonctions (Modèle procédural) ou de classes (Modèle orienté objet). ;
* La partie **Vue** qui s'occupe des interactions avec l'utilisateur : présentation, saisie et validation des données ;
* La partie **Contrôleur** qui gère la dynamique de l'application. Elle fait le lien entre les deux autres parties.

Ce patron a été imaginé à la fin des années 1970 pour le langage Smalltalk afin de bien séparer le code de l'interface graphique de la logique applicative. On le retrouve dans de très nombreux langages : bibliothèques Swing et Model 2 (JSP) de Java, frameworks PHP, ASP.NET MVC, etc.

Le diagramme ci-dessous (extrait de la documentation du framework PHP [Symfony](https://symfony.com/)) résume les relations entre les composants d'une architecture web MVC.

![](../images/mvc_symfony2.png)

> Attention à ne pas employer le terme de "couche" à propos d'une architecture MVC. Dans une architecture en couches, chaque couche ne peut communiquer qu'avec les couches adjacentes. Les parties Modèle, Vue et Contrôleur ne sont donc pas des couches au vrai sens du mot.

### Architecture Modèle-Vue-Présentation

La patron Modèle-Vue-Présentation, ou **MVP**, est un proche cousin du patron MVC surtout utilisé pour construire des interfaces utilisateurs (UI). 

Dans une architecture MVP, la partie **Vue** reçoit les évènements provenant de l'utilisateur et délègue leur gestion à la partie **Présentation**. Celle-ci utilise les services de la partie **Modèle** puis met à jour la **Vue**.

![](../images/mvp-pattern.png)

Dans la variante dite *Passive View* de cette architecture, la Vue est passive et dépend totalement du contrôleur pour ses mises à jour. Dans la variante dite *Supervising Controller*, Vuet et Modèle sont couplées et les modifications du Modèle déclenchent la mise à jour de la Vue.