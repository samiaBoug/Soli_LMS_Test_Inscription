---
layout: home
---
# Rapport du projet : Gestion des Inscriptions et Test - Solicode LMS

## Introduction

Dans le cadre du projet Solicode LMS, mon rôle porte sur la gestion des inscriptions pour l'année scolaire ainsi que sur les tests d'inscription. Le but est de simplifier et d’automatiser le processus d'inscription des apprenants, tout en fournissant un moyen efficace pour évaluer leurs compétences et gérer les résultats. Ce rapport décrit les différentes étapes de développement de cette fonctionnalité, en s’appuyant sur diverses méthodologies telles que Scrum, Design Thinking, et la méthode Y(2Tup).

## Contexte du projet

Le projet Solicode LMS vise à moderniser le processus d'inscription et d'évaluation des apprenants, en remplaçant les anciennes méthodes manuelles par un système en ligne fluide et interactif. Cela inclut la gestion des inscriptions, la création de tests d'évaluation, et la distribution rapide des résultats.

## Processus de développement

### 1- SCRUM

Le développement du projet suit la méthodologie agile SCRUM, qui permet de gérer le projet par sprints. Chaque sprint est une période de travail focalisée sur des tâches spécifiques, permettant d’itérer rapidement sur les fonctionnalités et d’adapter le produit aux besoins des utilisateurs. SCRUM aide à optimiser la communication entre les membres de l’équipe et à livrer des versions progressives et testées du produit.

### 2- Méthode 2TUP

La méthode 2TUP (Two-Tiered Unified Process) permet de structurer le développement en deux phases principales : la phase d’analyse (compréhension des besoins) et la phase de développement (implémentation). Cette approche facilite la gestion des tâches en simplifiant la planification tout en mettant l'accent sur l'amélioration continue à chaque itération.

### 3- Design Thinking

Le Design Thinking est une approche centrée sur l'utilisateur. Dans ce projet, elle a permis de mieux comprendre les besoins et attentes des apprenants et des responsables de formation. En intégrant les retours des utilisateurs dès le début, nous avons pu concevoir une interface plus intuitive et répondre aux besoins spécifiques de chaque partie prenante.

## Planification

### 1- Gestion des tâches : GitHub projet

Toutes les tâches et fonctionnalités sont organisées et suivies sur GitHub. Les issues sont utilisées pour décrire les tâches spécifiques de chaque sprint, et les pull requests permettent d’intégrer progressivement le code développé à la branche principale du projet.

### 2- Gantt

La planification des tâches est également suivie par un diagramme de Gantt, permettant de visualiser les différentes étapes du projet et de garantir que les délais sont respectés.

## Branche fonctionnelle

### 1. Carte d’empathie pour le responsable de formation
![alt text](carte_empathie_responsable.png)

### 2. Carte d’empathie pour l’inscrit
![alt text](carte_empathie_inscrit.png)

### 3. Définir

Le problème à résoudre est la gestion de l’inscription des apprenants, leur évaluation initiale et la gestion des résultats. Le processus actuel est long, complexe et manuel, ce qui ralentit l'accès aux informations pour les apprenants et les responsables de formation. Le système proposé vise à automatiser ces processus et à rendre les informations facilement accessibles à travers une interface intuitive.

### 4. Cas d’utilisation générale
![alt text](use_case.png)

### 5. Cas d’utilisation Sprint 1
![alt text](use_case_sprint_1.png)
### 6. Cas d’utilisation Sprint 2

![alt text](use_case_sprint_2.png)

## Branche technique

### 1. Besoin technique

Les besoins techniques incluent la création d'une interface intuitive pour l'inscription et l'évaluation, ainsi qu’un système automatisé pour la gestion des tests et des résultats. L’utilisation de technologies modernes comme AJAX et une architecture basée sur des API REST sont nécessaires pour assurer une réactivité optimale du système.

### 2. Analyse technique

L'interface utilisateur (UI) et l'expérience utilisateur (UX) sont des aspects essentiels pour garantir que l'application soit facile à utiliser. AJAX sera utilisé pour rendre les interactions en temps réel, comme la soumission des formulaires et l’affichage des résultats des tests, sans rechargement complet de la page.

### 3. Auto-formation

Pour garantir une maîtrise complète de l'interface, des composants de l'UI tels que les formulaires dynamiques, les graphiques de résultats et les tableaux de bord interactifs seront utilisés. Une formation continue est essentielle pour se familiariser avec les technologies front-end telles que HTML5, CSS3, JavaScript, et les frameworks comme React ou Vue.js.

### 4. Prototype

Le prototype initial a été développé sous forme d'une application blog, permettant de tester l'interface utilisateur avant de la déployer dans un environnement de production.

## Conception

### 1. Maquettes

Les maquettes visuelles de l'interface ont été créées pour représenter les écrans de gestion des inscriptions, des tests et du tableau de bord. Ces maquettes ont été testées avec des utilisateurs pour assurer leur pertinence et leur simplicité.

### 2. Diagramme de classe
![alt text](diagrame_de_class.png)

## Réalisation

Le développement du projet a suivi les étapes planifiées, en se concentrant sur la création des formulaires d'inscription, des tests d'évaluation et des fonctionnalités de gestion des résultats. Chaque fonctionnalité a été intégrée progressivement au sein du système à travers les sprints définis.

## Conclusion

Le projet Solicode LMS vise à simplifier et automatiser le processus d'inscription et d'évaluation des apprenants. En s'appuyant sur les méthodologies agiles telles que Scrum, Design Thinking et Y(2Tup), nous avons pu construire une solution robuste, intuitive et efficace qui répond aux besoins des utilisateurs.
