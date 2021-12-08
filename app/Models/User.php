<?php

final class User extends ObjectModel{

    private $user_id;
    private $name;
    private $email;
    private $password;
    private $creation_date;
    private $connection_date;
	private $admin;

	/**
     * Affiche les informations de l'utilisateur
     */
    public function showMembers() {
        $req = prepare('SELECT `name`, `email`, creation_date, `admin` FROM users');
        return execute($req);
    }

    /**
     * Permet d'ajouter un membre à la base de données
     */
    public function createMember($user_id, $name, $email, $password, $creation_date, $connection_date, $admin = 0) {
        $req = prepare('INSERT INTO users ($user_id, $name, $email, $password, $creation_date, $connection_date, $admin) VALUES(?,?,?,?,?,NOW(),?)');
        return execute($req);
    }

    /**
     * Fonction qui regarde dans la base de données si la donnée existe (nom ou email ou mot de passe)
     */
    public function checkData($data) {
        $req = prepare('SELECT `'.$data.'` FROM users WHERE');
        return execute($req);
    }

    /**
     * Fonction qui change la donnée (nom ou email ou mot de passe)
     */
    public function changeData($data, $password, $user_id) {
        $req = prepare('UPDATE users SET '.$data.' = '.$password.' WHERE id = '.$user_id);
        return execute($req);
    }
}