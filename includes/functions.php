<?php

require 'includes/config.php';

function inscription($email, $username, $password1, $password2, $conn)
{
    try {
        $sql1 = "SELECT * FROM users WHERE email = '{$email}'";
        $sql2 = "SELECT * FROM users WHERE username = '{$username}'";
        $res1 = $conn->query($sql1);
        $count_email = $res1->fetchColumn();
        if (!$count_email) {
            $res2 = $conn->query($sql2);
            $count_user = $res2->fetchColumn();
            if (!$count_user) {
                if ($password1 === $password2) {
                    $password1 = password_hash($password1, PASSWORD_DEFAULT);
                    $sth = $conn->prepare('INSERT INTO users (email, username, password) VALUES (:email,:username,:password)');
                    $sth->bindParam(':email', $email);
                    $sth->bindParam(':username', $username, );
                    $sth->bindParam(':password', $password1);
                    $sth->execute();
                    echo "L'utilisateur a bien été enregistré";
                } else {
                    echo 'Les mots de passe ne sont pas identiques !';
                }
            } elseif ($count_user > 0) {
                echo 'Ce nom d\'utilisateur est déjà pris !';
            }
        } elseif ($count_email > 0) {
            echo 'Cette adresse mail existe déjà !';
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}
