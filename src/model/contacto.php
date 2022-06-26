<?php
class contacto{

    public $id;
    public $contact_no;
    public $lastname;
    public $createdtime;


    public function __construct($id, $contact_no,$lastname,$createdtime){
        $this->id = $id;
        $this->contact_no = $contact_no;
        $this->lastname = $lastname;
        $this->createdtime= $createdtime;
    }

    function setId($id){
        $this -> id = $id;
    }

    function setContact_No($contact_no){
        $this -> contact_no = $contact_no;
    }

    function setLastName($lastname){
        $this -> lastname = $lastname;
    }

    function setCreatedTime($createdtime){
        $this -> createdtime = $createdtime;
    }

    function getId(){
        return $this -> id;
    }

    function getContact_No(){
        return $this -> contact_no;
    }

    function getLastName(){
        return $this -> lastname;
    }

    function getCreatedTime(){
        return $this ->createdtime;
    }

}