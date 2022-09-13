<?php

class CommandClass
{
    private $id;
    private $clientName;
    private $telefone;
    private $mail;
    private $adresse;
    private $priceCmd;
    private $qtyCmd;
    private $dateCmd;
    private $dateDelivry;
    private $date_created;
    private $status;
    private $idProduct;
	
	public function __construct()
	{
		
	}

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(int $id_):self
    {
          $this->id = $id_;

         return $this;  
    }
    
    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(string $name_): self
    {
        $this->clientName = $name_;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone_): self
    {
        $this->telefone = $telefone_;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail_): self
    {
        $this->mail = $mail_;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse_): self
    {
        $this->adresse = $adresse_;

        return $this;
    }

    public function getPriceCmd(): ?float
    {
        return $this->priceCmd;
    }

    public function setPriceCmd(float $priceCmd_): self
    {
        $this->priceCmd = $priceCmd_;

        return $this;
    }

    public function getQtyCmd(): ?float
    {
        return $this->qtyCmd;
    }

    public function setQtyCmd(float $qtyCmd_): self
    {
        $this->qtyCmd = $qtyCmd_;

        return $this;
    }

    public function getDateCmd(): ?string
    {
        return $this->dateCmd;
    }

    public function setDateCmd(string $dateCmd_): self
    {
        $this->dateCmd = $dateCmd_;

        return $this;
    }

    public function getDateDelivry(): ?string
    {
        return $this->dateDelivry;
    }

    public function setDateDelivry(string $dateDelivry_): self
    {
        $this->dateDelivry = $dateDelivry_;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status_): self
    {
        $this->status = $status_;

        return $this;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $id_product): self
    {
        $this->idProduct = $id_product;

        return $this;
    }

     //CRUD Functions
    //Save new Command
    public function _push(): self
    {
                   
        $date = date("Y-m-d");

        $pdo = _connect();
        $abfrage = "INSERT INTO  command VALUES ('',?,?,?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $this->getClientName(),
            $this->getTelefone(),
            $this->getMail(),
            $this->getAdresse(),
            $this->getPriceCmd(),
            $this->getQtyCmd(),
            $date,
            $date,
            $this->getStatus(),
            $this->getIdProduct()
            ]) ) {
                echo "<div class='alert alert-success' role='alert'> Votre commande a été enregistré  ! <img src='images/confiance.png' alt=' ' />  Merci pour votre confiance </div>";
                $this->notify($this);
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Error \n Try again ! </div>";
        }
        return $this;
    }
    //Update Command into Database
    public function _updateStatusAndDelivry() : self
    {
        $pdo = _connect();
        $abfrage = "UPDATE  command SET status_ = ? , date_delivry = ?  WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $this->getStatus(),
            $this->getDateDelivry(),
            $this->getId()
            ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Update Success ! </div>";
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Update impossible \n Try again ! </div>";
        }
        return $this;
    }


    public function notify($cmd){
        $to = "kmerfood2020@gmail.com,".$cmd->getMail()."";
            $subject = "Commande Kmerfood";
            $product = getProductById($cmd->getIdProduct());
            $message = "
            <html>
            <head>
            <title><div class='alert alert-primary' role='alert'>Copie de votre Commande</div></title>
            </head>
            <body>
            <p>Salut ".$cmd->getClientName()." !</p>
            <div class='alert alert-info' role='alert'>Telephone : ".$cmd->getTelefone()."  <br/> Adresse : ".$cmd->getAdresse()."</div>
                <h3><div class='alert alert-secondary' role='alert'>Votre commande ,</div></h3> <p/>
            <table>
            <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix</th>
            </tr>
            <tr>
            <td>".$product->getName()."</td>
            <td>".$cmd->getQtyCmd()."</td>
            <td>".$cmd->getPriceCmd()."</td>
            </tr>
            </table>
            <p/><div class='alert alert-secondary' role='alert'> a bien été pris en compte. </div><p/> Vous serez notifié un du statu de votre commande.<p/> Merci pour votre confiance!
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <kmerfood2020@gmail.com>' . "\r\n";
            $headers .= 'Cc: kmerfood2020@gmail.com' . "\r\n";

            mail($to,$subject,$message,$headers);

    }
    //notify client
    public function notifyClient(){
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
    // count all command
			public function totalRowCount(){
				$pdo = _connect();
				$sql= "SELECT * FROM command";
				$stmt =$pdo->prepare($sql);
				$stmt->execute();
				$t_rows = $stmt->rowCount();
				
				return $t_rows;
			}
    //Delete  into Database
    public function _delete()
    {
        $pdo = _connect();
        $abfrage = "DELETE FROM  command  WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([ $this->getId() ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Command was deleted ! </div>";
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Error delete impossible \n Try again ! </div>";
        }
    }

}
