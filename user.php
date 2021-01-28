<?php

class User
{
    private $name;
    private $firstname;
    private $birthDate;
    private $tel;
    private $email;
    private $country;
    private $comment;
    private $job;
    private $url;

    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->firstname = $data["firstname"];
        $this->birthDate = $data["birthDate"];
        $this->tel = $data["tel"];
        $this->email = $data["email"];
        $this->country = $data["country"];
        $this->comment = $data["comment"];
        $this->job = $data["job"];
        $this->url = $data["url"];
    }

    public function createArray()
    {
        $array=array(
            "name"=>$this->name,
            "firstname"=>$this->firstname,
            "birthDate"=>$this->birthDate,
            "tel"=>$this->tel,
            "email"=>$this->email,
            "country"=>$this->country,
            "comment"=>$this->comment,
            "job"=>$this->job,
            "url"=>$this->url
        );
        return $array;
    }

    public function name()
    {
        return $this->name;
    }

    public function firstname()
    {
        return $this->firstname;
    }

    public function birthDate()
    {
        return $this->birthDate;
    }

    public function tel()
    {
        return $this->tel;
    }

    public function email()
    {
        return $this->email;
    }

    public function country()
    {
        return $this->country;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function job()
    {
        return $this->job;
    }

    public function url()
    {
        return $this->url;
    }
}
