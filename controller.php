<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'model/UserDao.php';

if (!empty($_GET['id'])) {
    $user = UserDao::findById($_GET['id']);
} else {
    $user = new User;
}
/*
if (empty($_GET['action'])) {
    $_GET['action']='list';
}*/

switch (@$_GET['action']) {
    case 'edit':
        var_dump(($_POST));
        if (!empty($_POST)) {
           
            UserDao::saveOrUpdate($user);
            require 'view/list.php';
        } else {
            echo "coucou";
            require 'view/edit.php';
        }
        break;
    case 'delete':
        if (!empty($_POST)) {
            UserDao::delete($user);
            require 'view/list.php';
        } else {
            require 'view/delete.php';
        }
        break;
    case 'read':
        require 'view/read.php';
        break;
    default:
        require 'view/list.php';
}
