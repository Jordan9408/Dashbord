<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user = "root";
$pass = "";
$host = "localhost";
$db_name = "nitrocol.db";
$pw = "password";
$ad = "admin";

// connection à la db
$sth = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
$sth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Création tab users
    $tab_users = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        $pw VARCHAR(50) NOT NULL,
        f_name VARCHAR(30) NOT NULL,
        l_name VARCHAR(30) NOT NULL,
        $ad INT(11) UNSIGNED NOT NULL,
        photo VARCHAR(32) NOT NULL
    )
    ENGINE = InnoDB
    ";
    $sth->exec($tab_users);
    // echo "Table 'users' créé avec succès !<br>";

    // Création tab produits
    $tab_produits = "CREATE TABLE IF NOT EXISTS produits (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(50) NOT NULL,
        descriptions VARCHAR (50) NOT NULL,
        img VARCHAR(32) NOT NULL,
        dates DATETIME NOT NULL,
        avis VARCHAR(32) NOT NULL,
        prix INT(11) NOT NULL
    )
    ENGINE = InnoDB
    ";
    $sth->exec($tab_produits);
    // echo "Table 'produits' créé avec succès !<br>";

    // Création tab catégories
    $tab_categories = "CREATE TABLE IF NOT EXISTS categories (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(32) NOT NULL,
        emballages VARCHAR(25) NOT NULL,
        img VARCHAR(32) NOT NULL,
        dates DATETIME NOT NULL,
        prix INT(11) NOT NULL
    )
    ENGINE = InnoDB
    ";
    $sth->exec($tab_categories);
    // echo "Table 'catégories' créé avec succès !<br>";

    // Création tab pages
    $tab_pages = "CREATE TABLE IF NOT EXISTS pages (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(32) NOT NULL,
        descriptions VARCHAR(50) NOT NULL,
        img VARCHAR(32) NOT NULL,
        dates DATETIME NOT NULL,
        avis VARCHAR(32) NOT NULL,
        prix INT(11) NOT NULL
    )
    ENGINE = InnoDB
    ";
    $sth->exec($tab_pages);
    // echo "Table 'pages' créé avec succès !<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données et des tables : " . $e->getMessage();
}
