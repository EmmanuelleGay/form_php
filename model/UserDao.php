<?php
require 'User.php';

class UserDao
{
    public static function findById($id)
    {
        $pdo = Database::connect();
        $req = $pdo->prepare("SELECT * FROM tp_crud_user WHERE id = ?");
        $req->execute([$id]);
        $user = new User($req->fetch(PDO::FETCH_ASSOC));
        return $user;
    }

    public static function findAll()
    {
        $pdo = Database::connect();
        $req = $pdo->prepare("SELECT * FROM tp_crud_user ORDER BY id DESC");
        $req->execute();

        $result = [];
        while ($userData = $req->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($userData);
            $result[] = $user;
        };
        return $result;
    }


    public static function update($user)
    {
        $pdo = Database::connect();
        $user->sanitizeFields();
        $sql = "UPDATE tp_crud_user SET name = ?,firstname = ?,birthDate = ?,tel = ?, email = ?, country = ?, comment = ?, job = ?, url = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $user->name,
            $user->firstname,
            $user->birthDate,
            $user->tel,
            $user->email,
            $user->country,
            $user->comment,
            $user->job,
            $user->url,
            $user->id
        ]);
    }

    public static function saveOrUpdate($user){
        $pdo = Database::connect();
        $user->sanitizeFields();
        $id = $user->id;
        if(!empty($id)){
            UserDao::update($user);
        }
        else {
            UserDao::save($user);
        }
    }

    public static function save($user)
    {
        $pdo = Database::connect();
        $user->sanitizeFields();
        $sql = "INSERT INTO tp_crud_user (name,firstname,birthDate,tel, email, country,comment, job, url) 
            values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute([
            $user->name,
            $user->firstname,
            $user->birthDate,
            $user->tel,
            $user->email,
            $user->country,
            $user->comment,
            $user->job,
            $user->url
        ]);
    }


    public static function delete($user)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM tp_crud_user WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$user->id]);
    }
}
