<?php

class ProductClass
{
    private $id;
    private $name;
    private $description;
    private $old_price;
    private $current_price;
    private $unity;
    private $init_qty;
    private $current_qty;
    private $command_url;
    private $date_created;
    private $image_path;
    private $id_cathegorie;
    private $id_user;
	
	public function __construct()
	{
		
	}

    public function getId(): ?string
    {
        return $this->id;
    }
    
    public function setId(string $id_):self
    {
          $this->id = $id_;

         return $this;  
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name_): self
    {
        $this->name = $name_;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description_): self
    {
        $this->description = $description_;

        return $this;
    }

    public function getOldPrice(): ?float
    {
        return $this->old_price;
    }

    public function setOldPrice($old_price_): self
    {
        $this->old_price = $old_price_;

        return $this;
    }

    public function getCurrentPrice(): ?float
    {
        return $this->current_price;
    }

    public function setCurrentPrice($current_prince_): self
    {
        $this->current_price = $current_prince_;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(string $unity_): self
    {
        $this->unity = $unity_;

        return $this;
    }

    public function getInitQty(): ?float
    {
        return $this->init_qty;
    }

    public function setInitQty($init_qty_): self
    {
        $this->init_qty = $init_qty_;

        return $this;
    }

    public function getCurrentQty(): ?float
    {
        return $this->current_qty;
    }

    public function setCurrentQty($current_qty_): self
    {
        $this->current_qty = $current_qty_;

        return $this;
    }

    public function getCommandUrl(): ?string
    {
        return $this->command_url;
    }

    public function setCommandUrl(?string $command_url_): self
    {
        $this->command_url = $command_url_;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->date_created;
    }

    public function setDateCreated(string $date_created_): self
    {
        $this->date_created = $date_created_;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path_): self
    {
        $this->image_path = $image_path_;

        return $this;
    }

    public function getIdCathegorie(): ?string
    {
        return $this->id_cathegorie;
    }

    public function setIdCathegorie(string $id_cathegorie_): self
    {
        $this->id_cathegorie = $id_cathegorie_;

        return $this;
    }

    public function getIdUser(): ?string
    {
        return $this->id_user;
    }

    public function setIdUser(string $id_user_): self
    {
        $this->id_user = $id_user_;

        return $this;
    }
     //CRUD Functions
    //Save new Zelle
    public function _push(): self
    {
                   
        //generate code for id cathegorie
        $code_cathegorie = str_split('abcdefghijklmnopqrstuvwxyz'
        .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
        .'0123456789'); // and any other characters
        shuffle($code_cathegorie); // probably optional since array_is randomized; this may be redundant
        $code = 'C';
        foreach (array_rand($code_cathegorie, 6) as $k) $code .= $code_cathegorie[$k];
        $date = date("Y-m-d");

        $pdo = _connect();
        $abfrage = "INSERT INTO  product VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $code,
            $this->getName(),
            $this->getDescription(),
            $this->getOldPrice(),
            $this->getCurrentPrice(),
            $this->getUnity(),
            $this->getInitQty(),
            $this->getCurrentQty(),
            $this->getCommandUrl(),
            $date,
            $this->getImagePath(),
            $this->getIdCathegorie(),
            $this->getIdUser()
            ]) ) {
                echo "<div class='alert alert-success' role='alert'> New Product saved ! </div>";
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Error \n Try again ! </div>";
        }
        return $this;
    }
    //select all Zelle
			public function _fetch(){
				$pdo = _connect();
				$sql = "SELECT * FROM product";
				$stmt =$pdo->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row){
					$data[]=$row;
				}
				return $data;
			}
					
			//Get zelle by ID
			public function _getProductById($id_){
				$pdo = _connect();
				$sql = "SELECT * FROM product WHERE id= :id_";
				$stmt =$pdo->prepare($sql);
				$stmt->execute(['id_'=>$id_]);
				$result=$stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			}

    //Update product into Database
    public function _update() : self
    {
        $pdo = _connect();
        $abfrage = "UPDATE  product SET name = ? , description = ? , old_price = ? ,current_price = ? ,unity = ? , init_qty = ? , current_qty = ? , command_url = ? , date_created = ? , image_path = ? , id_cathegorie = ? , id_user = ? WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $this->getName(),
            $this->getDescription(),
            $this->getOldPrice(),
            $this->getCurrentPrice(),
            $this->getUnity(),
            $this->getInitQty(),
            $this->getCurrentQty(),
            $this->getCommandUrl(),
            $this->getDateCreated(),
            $this->getImagePath(),
            $this->getIdCathegorie(),
            $this->getIdUser(),
            $this->getId()
            ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Update Success ! </div>";
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Update impossible \n Try again ! </div>";
        }
        return $this;
    }

    //set price product by id
    public function setPrices($new_old_price,$new_current_price){
        $pdo = _connect();
        $abfrage = "UPDATE  product SET old_price = ? ,current_price = ?  WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $new_old_price,
            $new_current_price,
            $this->getId()
            ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Update Success ! </div>";
                
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Update impossible \n Try again ! </div>";
        }
        return $this;
    }
    // count all product
			public function totalRowCount(){
				$pdo = _connect();
				$sql= "SELECT * FROM product";
				$stmt =$pdo->prepare($sql);
				$stmt->execute();
				$t_rows = $stmt->rowCount();
				
				return $t_rows;
			}
    //Delete  into Database
    public function _delete()
    {
        $pdo = _connect();
        $abfrage = "DELETE FROM  product  WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([ $this->getId() ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Product was deleted ! </div>";
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Error delete impossible \n Try again ! </div>";
        }
    }


}
