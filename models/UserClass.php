<?php

class UserClass
{
    private $id;
    private $nameUser;
    private $surnameUser;
    private $telefone;
    private $email;
    private $gender;
    private $login_user;
    private $pwd_user;
    private $accesNiveau_user;
    private $date_created;
    private $image_user;
    private $status;
	
	public function __construct()
	{
		
	}

    public function getId(): ?string
    {
        return $this->id;
    }
    
    public function setId(string $id):self
    {
          $this->id = $id;

         return $this;  
    }
    
    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getSurnameUser(): ?string
    {
        return $this->surnameUser;
    }

    public function setSurnameUser(string $surnameUser): self
    {
        $this->surnameUser = $surnameUser;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }
    
    public function setTelefone(string $telefone_):self
    {
          $this->telefone = $telefone_;

         return $this;  
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    public function setEmail(string $email_):self
    {
          $this->email = $email_;

         return $this;  
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }
    
    public function setGender(string $gender_):self
    {
          $this->gender = $gender_;

         return $this;  
    }

    public function getLoginUser(): ?string
    {
        return $this->login_user;
    }

    public function setLoginUser(string $loginUser): self
    {
        $this->login_user = $loginUser;

        return $this;
    }

    public function getPwdUser(): ?string
    {
        return $this->pwd_user;
    }

    public function setPwdUser(string $pwdUser): self
    {
        $this->pwd_user = $pwdUser;

        return $this;
    }

    public function getAccesNiveauUser(): ?int
    {
        return $this->accesNiveau_user;
    }

    public function setAccesNiveauUser(int $accesNiveauUser): self
    {
        $this->accesNiveau_user = $accesNiveauUser;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->date_created;
    }
    
    public function setDateCreated(string $date_created_):self
    {
          $this->date_created = $date_created_;

         return $this;  
    }

    public function getImageUser(): ?string
    {
        return $this->image_user;
    }
    
    public function setImageUser(string $image_user_):self
    {
          $this->image_user = $image_user_;

         return $this;  
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }
    
    public function setStatus(string $status_):self
    {
          $this->status = $status_;

         return $this;  
    }

    
}
