<?php
require 'util/database.php';

class User
{

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
        if($this->_properties != null){
            return array_key_exists($name, $this->_properties)
            ? $this->_properties[$name]
            : null;
        }
       
    }


    public function  setParametersFromArray($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
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
        unset($paramaters['id']);
        $valid = true;
        foreach ($paramaters as $key => $value) {
            if (!$this->validateField($key)) {
                $valid = false;
            }
        }
        return $valid;
    }

    public function sanitizeFields()
    {
        $sanitizedFields = $this->getProperties();
        foreach ($sanitizedFields as &$value) {
            $value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }
        $this->setParametersFromArray($sanitizedFields);
    }
}
