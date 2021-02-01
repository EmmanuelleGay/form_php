<?php
SiteUtil::require("entity/UserDao.php");
SiteUtil::require("util/EntityValidator.php");

/**
 * User
 * User entity
 */
class User
{
    // a User is valid only if all properties in this array validate
    // in the form of $propertyName => list of validators that must pass
    public const VALIDATED_PROPERTIES = [
        "firstName" => ["notEmpty","letters"],
        "lastName" => ["notEmpty", "letters"],
        "tel" => ["telephone"],
        "email" => ["email", "unique"]
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

    private $errors;
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
        $this->errors = null;

        foreach ($parameters as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * isValid
     * Looks at error array andreturns false if it contains an error
     * @return bool true if all validators passed, false if just one validator failed
     */
    public function isValid(){
        return empty($this->getErrors());
    }
    
    /**
     * validateProperty
     * Loops through all validators for that property (if any), and returns a list of failed validators
     * @param  String $fieldName
     * @return Array errors found, by validator name (or empty array if none found)
     * example return array:
     * ['notEmpty' => true],   // error found: empty value
     */
    public function validateProperty(String $propertyName){
        $propertyErrors = [];
        
        if (isset(self::VALIDATED_PROPERTIES[$propertyName])) {
            // Loop through each validator for that field
            foreach(self::VALIDATED_PROPERTIES[$propertyName] as $validatorName){
                // store error states (negated validator) with the validator name as key
                $errored = !EntityValidator::$validatorName($this,$propertyName);
                if ( $errored ) {
                    $propertyErrors[$validatorName] = true;
                }
                
            }
        }

        return $propertyErrors;
    }

    /**
     * getErrors
     * validate each field, store array of failed validators
     * @return Array multidimensional array of error arrays, stored by property name.
     * Example returned array: 
     *  [
     *      'lastName'  =>  ['notEmpty' => true],
     *      'tel'       =>  ['notEmpty' => true, 'telephone' => true ],
     *      'email'     =>  ['unique' => true ],
     * ]
     */
    public function getErrors(): ?array{
        if ($this->errors == null) {
            $this->errors = [];

            foreach (self::VALIDATED_PROPERTIES as $propertyName=>$validators) {
                // assign an array of errors in the form ['myValidator' => true, 'myOtherValidator' => false ]
                $this->errors[$propertyName] = $this->validateProperty($propertyName);
                if (empty($this->errors[$propertyName])){ 
                    unset($this->errors[$propertyName]); // If no error found, unset empty array
                }
            }
        }

        return $this->errors;
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

    public function getDaoClass(){
        return 'UserDao';
    }
}
