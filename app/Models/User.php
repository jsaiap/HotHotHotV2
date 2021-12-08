<?php

final class User extends ObjectModel{

    private $user_id;
    private $name;
    private $email;
    private $password;
    private $creation_date;
    private $connection_date;
	private $admin;

    public function showMembers() {
        $req = prepare('SELECT `name`, `email`, creation_date, `admin` FROM users');
        return execute($req);
    }

    public function createMember($user_id, $name, $email, $password, $creation_date, $connection_date, $admin = 0) {
        $req = prepare('INSERT INTO users ($user_id, $name, $email, $password, $creation_date, $connection_date) VALUES(?,?,?,?,?,NOW())');
        return execute($req);
    }

    public function changePassword($user_id, $password) {
        $req = prepare('UPDATE users SET password = '.$password.' WHERE id = '.$user_id);
        $req = execute($req);
    }

    public function changeName($user_id, $name) {
        $req = prepare('UPDATE users SET `name` = '.$name.' WHERE id = '.$user_id);
        $req = execute($req);
    }

    public function changeEmail($user_id, $email) {
        $req = prepare('UPDATE users SET `email` = '.$email.' WHERE id = '.$user_id);
        $req = execute($req);
    }
}