<?php
require 'util/database.php';

class User
{
    /*  private $id;
    private $name;
    private $firstname;
    private $birthDate;
    private $tel;
    private $email;
    private $country;
    private $comment;
    private $job;
    private $url;*/
    private $_properties;

    public function __construct(array $data = [])
    {

        $this->setParametersFromArray($data);
    }

    public function __set($name, $value)
    {
        return $this->_properties[$name] = $value;
    }

    public function __get($name)
    {
        return array_key_exists($name, $this->_properties)
            ? $this->_properties[$name]
            : null;
    }


    public function  setParametersFromArray($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key}=$value;
        }
    }

    public function getProperties()
    {
        return $this->_properties;
    }



    public function validateField($fieldName)
    {
        $value = $this->{$fieldName};
        $valid = false;
        if (!empty($value)) {
            switch ($fieldName) {
                case "name":
                    if (preg_match("/^[a-zA-Z ]*$/", $value)) {
                        $valid = true;
                    }
                    break;
                case "firstname":
                    if (preg_match("/^[a-zA-Z ]*$/", $value)) {
                        $valid = true;
                    }
                    break;
                case "tel":
                    if (preg_match("/^[0-9]*$/", $value)) {
                        $valid = true;
                    }
                    break;
                case "country":
                    if (preg_match("/^[a-zA-Z ]*$/", $value)) {
                        $valid = true;
                    }
                    break;
                case "email":
                    if ((filter_var($value, FILTER_VALIDATE_EMAIL))) {
                        $valid = true;
                    }
                    break;
                case "url":
                    if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
                        $valid = true;
                    }
                    break;
                default:
                    $valid = true;
            }
        }
        return $valid;
    }

    public function validateAll()
    {
        $paramaters = $this->getProperties();
        foreach ($paramaters as $value) {
        }
    }

    public function sanitizeFields()
    {
        $sanitizedFields = $this->getProperties();
        foreach ($sanitizedFields as &$value) {
            $value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }
        $this->setParametersFromArray($sanitizedFields);
    }
    /*
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function getUrl()
    {
        return $this->url;
    }
    */
}
