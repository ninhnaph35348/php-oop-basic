<?php
class Person
{
    private $name;
    private $email;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

$person = new Person();

$person->setName("Anii" . "<br>");

$person->setEmail("anninh0712@gmail.com");

echo "Tên là: " . $person->getName();
echo "Email là: " . $person->getEmail();
