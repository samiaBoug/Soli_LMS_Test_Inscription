---
layout: default
title: "Mon Rapport"
---
# Rapport du projet : Gestion des Inscriptions et Test - Solicode LMS
<div style="page-break-after: always;"></div>

## Introduction

Dans le cadre du projet Solicode LMS, mon rôle porte sur la gestion des inscriptions pour l'année scolaire ainsi que sur les tests d'inscription. Le but est de simplifier et d’automatiser le processus d'inscription des apprenants, tout en fournissant un moyen efficace pour évaluer leurs compétences et gérer les résultats. Ce rapport décrit les différentes étapes de développement de cette fonctionnalité, en s’appuyant sur diverses méthodologies telles que Scrum, Design UX, et la méthode Y(2Tup).
<div style="page-break-after: always;"></div>

## Contexte du projet

Le projet Solicode LMS vise à moderniser le processus d'inscription et d'évaluation des apprenants, en remplaçant les anciennes méthodes manuelles par un système en ligne fluide et interactif. Cela inclut la gestion des inscriptions, la création de tests d'évaluation, et la distribution rapide des résultats.
<div style="page-break-after: always;"></div>

## Processus de développement

### 1- SCRUM

Le développement du projet suit la méthodologie agile SCRUM, qui est une approche itérative et incrémentale pour la gestion de projet. Elle est particulièrement adaptée aux environnements complexes et en constante évolution.

**Définition :** SCRUM est basé sur des cycles de travail courts et répétitifs appelés sprints, qui permettent de livrer rapidement des incréments de produit potentiellement utilisables.

**Étapes du processus SCRUM :**

1. **Rôles et responsabilités :**

   - **Product Owner** : Responsable de définir les besoins et priorités.
   - **Scrum Master** : Garant de l'application des principes SCRUM et facilitateur.
   - **Équipe de développement** : Chargée de réaliser les tâches techniques.

2. **Sprint Planning :**

   - Planification des tâches à accomplir pour le sprint en cours.
   - Définition des objectifs du sprint.

3. **Daily Scrum :**

   - Réunion quotidienne (15 minutes maximum) pour suivre l'avancement et identifier les obstacles.

4. **Sprint Review :**

   - Démonstration de l'incrément réalisé à la fin du sprint.
   - Récolte des retours des parties prenantes.

5. **Sprint Retrospective :**

   - Analyse des points forts et des axes d'amélioration pour les prochains sprints.

**Intérêt :**

- Flexibilité pour s'adapter aux besoins changeants des utilisateurs.
- Amélioration continue du produit et des processus.
- Renforcement de la collaboration et de la transparence au sein de l'équipe.

---

### 2- Méthode 2TUP

La méthode 2TUP (Two-Tiered Unified Process) est une approche structurée qui divise le projet en deux grandes phases. Elle se concentre sur la compréhension précise des besoins avant de passer à l'implémentation technique.

**Définition :** 2TUP est une variante simplifiée du Rational Unified Process (RUP) et se démarque par son focus sur une planification claire et une exécution progressive.

**Étapes du processus 2TUP :**

1. **Phase d'analyse :**

   - Identification des besoins des utilisateurs et des contraintes techniques.
   - Modélisation des processus à l'aide de diagrammes UML (cas d'utilisation, diagrammes de classes, etc.).

2. **Phase de développement :**

   - Conception et codage des fonctionnalités définies.
   - Tests unitaires et intégration pour vérifier la conformité.

**Intérêt :**

- Réduction des risques grâce à une analyse approfondie avant le développement.
- Meilleure anticipation des problèmes techniques et organisationnels.
- Amélioration de la qualité globale grâce à une approche systématique.

---

### 3- Design UX

Le Design UX (expérience utilisateur) est une discipline qui vise à concevoir des interfaces centrées sur les besoins et attentes des utilisateurs. Dans ce projet, il a joué un rôle essentiel pour garantir une expérience intuitive et agréable.

**Définition :** Le Design UX est le processus de création de produits qui offrent des expériences significatives et pertinentes aux utilisateurs, en prenant en compte l'ergonomie, l'accessibilité et l'esthétique.

**Étapes du Design UX :**

1. **Recherche utilisateur :**

   - Interviews, enquêtes et observation pour comprendre les besoins et comportements.

2. **Idéation :**

   - Brainstorming et conception de prototypes basse fidélité pour tester les idées.

3. **Prototypage :**

   - Création de maquettes interactives pour valider les concepts avec les utilisateurs.

4. **Tests utilisateurs :**

   - Collecte de retours sur les prototypes pour ajuster et améliorer l'interface.

5. **Implémentation :**

   - Intégration des maquettes finales dans le développement.

**Intérêt :**

- Augmentation de la satisfaction des utilisateurs grâce à une meilleure compréhension de leurs besoins.
- Réduction des erreurs et des incompréhensions dans l'utilisation du produit.
- Amélioration de la réputation et de la fidélité des utilisateurs envers la solution. 

<div style="page-break-after: always;"></div>

## Planification

### 1- Gestion des tâches : GitHub projet

Toutes les tâches et fonctionnalités sont organisées et suivies sur GitHub. Les issues sont utilisées pour décrire les tâches spécifiques de chaque sprint, et les pull requests permettent d’intégrer progressivement le code développé à la branche principale du projet.

### 2- Gantt

La planification des tâches est également suivie par un diagramme de Gantt, permettant de visualiser les différentes étapes du projet et de garantir que les délais sont respectés.

<div style="page-break-after: always;"></div>

## Branche fonctionnelle

### 1. Carte d’empathie pour le responsable de formation
![alt text](/img/carte_empathie_responsable.png)

### 2. Carte d’empathie pour l’inscrit
![alt text](/img/carte_empathie_inscrit.png)

### 3. Définir

L'application actuelle, développée en C# rencontre des difficultés opérationnelles importantes. Le déploiement s'avère complexe. 
De plus, l'absence d'une architecture modulaire complique l'intégration avec d'autres besoins tels que la gestion des absences ou des briefs. 
Cette limitation entraîne une fragmentation des fonctionnalités et des données, rendant la maintenance plus lourde et l'expérience utilisateur moins optimale.

### 4. Cas d’utilisation générale
![alt text](/img/use_case.png)

### 5. Cas d’utilisation Sprint 1
![alt text](/img/use_case_sprint_1.png)
### 6. Cas d’utilisation Sprint 2

![alt text](/img/use_case_sprint_2.png)

<div style="page-break-after: always;"></div>

## Branche technique

### 1. Besoin technique

Les besoins techniques incluent la création d'une interface intuitive pour l'inscription et l'évaluation, ainsi qu’un système automatisé pour la gestion des tests et des résultats. L’utilisation de technologies modernes comme AJAX et une architecture basée sur des API REST sont nécessaires pour assurer une réactivité optimale du système.

### 2. Analyse technique

L'interface utilisateur (UI) et l'expérience utilisateur (UX) sont des aspects essentiels pour garantir que l'application soit facile à utiliser. AJAX sera utilisé pour rendre les interactions en temps réel, comme la soumission des formulaires et l’affichage des résultats des tests, sans rechargement complet de la page.

### 3. Auto-formation

Pour garantir une maîtrise complète de l'interface, des composants de l'UI tels que les formulaires dynamiques, les graphiques de résultats et les tableaux de bord interactifs seront utilisés. Une formation continue est essentielle pour se familiariser avec les technologies front-end telles que HTML5, CSS3, JavaScript, et les frameworks comme React ou Vue.js.

### 4. Prototype

Le prototype initial a été développé sous forme d'une application blog, permettant de tester l'interface utilisateur avant de la déployer dans un environnement de production.

<div style="page-break-after: always;"></div>

## Conception

### 1. Maquettes

Les maquettes visuelles de l'interface ont été créées pour représenter les écrans de gestion des inscriptions, des tests et du tableau de bord. Ces maquettes ont été testées avec des utilisateurs pour assurer leur pertinence et leur simplicité. 
#### maquette tableau de board
![alt text](img/dashboard.png)
#### maquette index
![alt text](img/index.png)
#### maquette formulaire

![alt text](img/formulaire.png)

### 2. Diagramme de classe
![alt text](img/diagrame_de_class.png)
![alt text](img/diagrame_de_class.png)

<div style="page-break-after: always;"></div>

## Réalisation

Le développement du projet a suivi les étapes planifiées, en se concentrant sur la création des formulaires d'inscription, des tests d'évaluation et des fonctionnalités de gestion des résultats. Chaque fonctionnalité a été intégrée progressivement au sein du système à travers les sprints définis.

<div style="page-break-after: always;"></div>

## Conclusion

Le projet Solicode LMS vise à simplifier et automatiser le processus d'inscription et d'évaluation des apprenants. En s'appuyant sur les méthodologies agiles telles que Scrum, Design UX et Y(2Tup), nous avons pu construire une solution robuste, intuitive et efficace qui répond aux besoins des utilisateurs.
