<?php
require_once 'User.php';
SiteUtil::require('util/Database.php');

/**
 * UserDao
 * Data source-related methods for the User entity
 */
class UserDao {    
    private const TABLE_NAME = "tp_crud_user";
    private const ENTITY_CLASS = "User";
    /**
     * findById
     * create and return a User corresponding to a given id
     * @param  mixed $id id of user to find
     * @return User if found, null otherwise
     */
    public static function findById($id): ?User {
        return self::findOneBy("id", $id);
    }

    
    /**
     * findOneBy
     * create and return a User corresponding to a given field name, and it's searched value
     * @param  String $key field name
     * @param  mixed $value to search
     * @return User if found, null otherwise
     */
    public static function findOneBy(String $key, $value): ?User {
        $pdo = Database::connect();
        $req = $pdo->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE $key = ?");
        $req->execute([$value]);
        $user= $req->fetchObject(self::ENTITY_CLASS); // set user properties to fetched column values
        if (!$user){ // fetchObject returns boolean false if no row found, whereas we want null
            $user = null;
        }
        return $user;
    }
    
    /**
     * findAll
     * fetch all table rows, create and return matching users
     * @return Array of Users (or empty if no rows in table)
     */
    public static function findAll(): Array {
        $pdo = Database::connect();
        $req = $pdo->prepare("SELECT * FROM " . self::TABLE_NAME . " ORDER BY id DESC");
        $req->execute();

        $result = [];
        while ($user = $req->fetchObject(self::ENTITY_CLASS)) { // set user properties to fetched column values
            $result[] = $user;
        };
        return $result;
    }

    
    /**
     * update
     * update the table row that corresponds to a user
     * @param  User $user to update in table
     * @return void
     */
    public static function update(User $user) {
        $pdo = Database::connect();
        $sql = "UPDATE " . self::TABLE_NAME . " SET firstName = ?, lastName = ?, birthDate = ?,tel = ?, email = ?, country = ?, comment = ?, job = ?, url = ? WHERE id = ?";
        $q = $pdo->prepare($sql);

        $q->execute([
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthDate(),
            $user->getTel(),
            $user->getEmail(),
            $user->getCountry(),
            $user->getComment(),
            $user->getJob(),
            $user->getUrl(),
            $user->getId()
        ]);
    }
    
    /**
     * saveOrUpdate
     * Save a User to data source if it exists, or insert a new row if it doesn't
     * @param  mixed $user
     * @return void
     */
    public static function saveOrUpdate(User $user){
        $pdo = Database::connect();
        if(!empty($user->getId())){
            UserDao::update($user);  // if user has an id set, it already exists in data source
        }
        else {
            $id = UserDao::save($user); // If no id set, insert new row
            $user->setId($id);
        }
    }
    
    /**
     * save
     * insert a new row into data source that correpsonds to a User
     * @param  User $user to base new row on
     * @return int inserted user's ID
     */
    public static function save(User $user): int {
        $pdo = Database::connect();
        $sql = "INSERT INTO " . self::TABLE_NAME . " (firstName, lastName, birthDate, tel, email, country, comment, job, url) 
            values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute([
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBirthDate(),
            $user->getTel(),
            $user->getEmail(),
            $user->getCountry(),
            $user->getComment(),
            $user->getJob(),
            $user->getUrl()
        ]);
        
        return $pdo->lastInsertId(); // Last inserted ID is user's id
    }

    
    /**
     * delete
     * remove row in data source that corresponds to a User
     * @param  User $user
     * @return void
     */
    public static function delete(User $user) {
        $pdo = Database::connect();
        $sql = "DELETE FROM " . self::TABLE_NAME . " WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$user->getId() ?? null]); // if user doesn't exist, null instead of id
    }
}
