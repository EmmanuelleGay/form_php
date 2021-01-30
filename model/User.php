<?php
require_once 'UserDao.php';

/**
 * User
 * User entity
 */
class User
{
    // a User is valid only if all properties in this array validate
    public const VALIDATED_PROPERTIES = [
        "firstName",
        "lastName",
        "birthDate",
        "tel",
        "country",
        "email",
        "comment",
        "job",
        "url",
    ];

    private $id;
    private $firstName;
    private $lastName;
    private $birthDate;
    private $tel;
    private $country;
    private $email;
    private $comment;
    private $job;
    private $url;

    /**
     * __construct
     * Creates a new user, with optional parameters
     * 
     * @param  Array $parameterArray parameters to assign to user. defaults to empty array
     * @return void
     */
    public function __construct($parameters = [])
    {
        $this->setParametersFromArray($parameters);
    }

    /**
     * setParametersFromArray
     * Loops through an array of parameters, and adds its values to the entity properties
     * @param  mixed $parameterArray
     * @return void
     */
    public function  setParametersFromArray(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * validateField
     * Tells wether or not a field is valid
     * @param  String $fieldName
     * @return true if valid, false otherwise
     */
    public function validateField(String $fieldName){
        $valid = false;
        $value = $this->$fieldName;
        if (!empty($value)) {
            switch ($fieldName) {
                case "lastName":
                case "firstName":
                case "country":
                    if (preg_match("/^[a-zA-ZÀ-ÿ\- ]*$/", $value)) { // must contain only letters and spaces (including accents)
                        $valid = true;
                    }
                    break;
                case "tel":
                    if (preg_match("/^\+?[0-9]+$/", $value)) { // only numbers, with optional "+" in front
                        $valid = true;
                    }
                    break;

                case "email":
                    if ((filter_var($value, FILTER_VALIDATE_EMAIL))) {
                        $valid = true;
                    }
                    break;
                case "url":
                    if (filter_var($value, FILTER_VALIDATE_URL) === FALSE) { // Need to use strict identical operator with FILTER_VALIDATE_URL
                        $valid = true;
                    }
                    break;
                default:
                    $valid = true;
            }
        }
        return $valid;
    }

    /**
     * isValid
     * Loops trough all fields and validates them
     * @return void
     */
    public function isValid(){
        $valid = true;
        foreach (self::VALIDATED_PROPERTIES as $key) {
            $valid &= $this->validateField($key); // If any field validates false, $valid becomes and stays false
        }
        return $valid;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
        return $this;
    }

    public function getBirthDate(){
        return $this->birthDate;
    }

    public function setBirthDate($birthDate){
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel){
        $this->tel = $tel;
        return $this;
    }

    public function getCountry(){
        return $this->country;
    }

    public function setCountry($country){
        $this->country = $country;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getComment(){
        return $this->comment;
    }

    public function setComment($comment){
        $this->comment = $comment;
        return $this;
    }

    public function getJob(){
        return $this->job;
    }

    public function setJob($job){
        $this->job = $job;
        return $this;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setUrl($url){
        $this->url = $url;
        return $this;
    }
}
