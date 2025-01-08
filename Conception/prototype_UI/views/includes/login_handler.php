<?php
session_start();

// Configuration (à remplacer par vos propres valeurs)
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; 

// Validation des données du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le rôle et le nettoyer
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

    // Vérifier si le rôle est valide (à remplacer par votre logique de validation)
    $valid_roles = ['inscrit', 'responsable'];
    if (in_array($role, $valid_roles)) {
        $_SESSION['role'] = $role;
        if($_SESSION['role']=== 'inscrit'){
        header('Location: /views/inscrit/index.php'); // Rediriger vers le tableau de bord
        }elseif($_SESSION['role']=== 'responsable'){
        header('Location: /views/includes/dashboard.php'); // Rediriger vers le tableau de bord
        }
        exit();
    } else {
        $_SESSION['error'] = 'Rôle invalide.';
        header('Location: /views/includes/login.php');
        exit();
    }
}