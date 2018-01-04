<?

namespace App\Models;

class User {
    
    protected $firstName;

    protected $lastName;
    
    protected $email;


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($name)
    {
        $this->firstName = trim($name);
    }

    public function setLastName($name)
    {
        $this->lastName = trim($name);
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return $this->firstName. ' ' .$this->lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getProfile()
    {
        return [
            'fullname' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}