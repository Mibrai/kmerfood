<?php
    //function connection
    include_once('ProductClass.php');
    function _connect(){
        $host = '127.0.0.1';
        $db   = 'kmerfood_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        try {
            $pdo = new \PDO($dsn, $user, $pass, $options);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    //get User by connect informations
    function getInfoConnect($login,$pwd)
    {
        $pdo = _connect();
        $abfrage = "SELECT * FROM userclass WHERE  login_user = ? AND pwd_user = ? ";
        $statement = $pdo->prepare($abfrage);
        $statement->execute([$login,$pwd]);
        $user = new UserClass();
        while($back=$statement->fetch())
                {
                    $user->setId($back['id_user']);
                    $user->setNameUser($back['name_user']);
                    $user->setSurnameUser($back['surname']);
                    $user->setLoginUser($back['login_user']);
                    $user->setPwdUser($back['pwd_user']);
                    $user->setAccesNiveauUser($back['acces_niveau']);
                    $user->setEmail($back['email']);
                    $user->setTelefone($back['telefone']);
                    $user->setImageUser($back['image_user']);
                    
                }
        return $user;
    }
    //function control login
    function connect_form($login,$pwd){
        $user = getInfoConnect($login,$pwd);
        if($user->getId() != null){
            //load Session Variable  User
            $_SESSION['name_user'] = $user->getNameUser();
            $_SESSION['surname_user'] = $user->getSurnameUser();
            $_SESSION['id_user'] = $user->getId();

            echo "<script type='text/javascript'>alert('Idantifiants valide !! ');</script>";
            header("Refresh:0; url='../index.php' ");
        }
        else{
            echo "<script type='text/javascript'>alert('Echec Connection veuillez reessayer');</script>";
        }
    }

    //get User by Id
    function getUserById($id_user){
        $pdo = _connect();
        $abfrage = "SELECT * FROM userclass WHERE  id_user = ? ";
        $statement = $pdo->prepare($abfrage);
        $statement->execute([$id_user]);
        $user = new UserClass();
        while($back=$statement->fetch())
                {
                    $user->setId($back['id_user']);
                    $user->setNameUser($back['name_user']);
                    $user->setSurnameUser($back['surname']);
                    $user->setLoginUser($back['login_user']);
                    $user->setPwdUser($back['pwd_user']);
                    $user->setAccesNiveauUser($back['acces_niveau']);
                    $user->setEmail($back['email']);
                    $user->setTelefone($back['telefone']);
                    $user->setImageUser($back['image_user']);
                    
                }
        return $user;
    }

    	// upload Files on Server
	function uploadImageProduct($path_destination,$path_origine,$product)
	{
		$target_file = $path_destination . basename($path_origine["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
			$check = getimagesize($path_origine["tmp_name"]);
			if($check !== false) {
				//echo "File Type  - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "<div class='alert alert-warning' role='alert'>Le fichier choisi n'est pas une image.</div>";
				$uploadOk = 0;
			}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "<div class='alert alert-warning' role='alert'>Desole, il existe deja un fichier du même nom \n  veuillez renommer votre fichier ! .</div>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "<div class='alert alert-danger' role='alert'>Oups !! Téléchargement du fichier impossible .</div>";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($path_origine["tmp_name"], $target_file)) {
                $upload_status = true;
                $file_name = basename($path_origine["name"]);
                echo "<div class='alert alert-success' role='alert'>Fichier ". basename($path_origine["name"]). " téléchargé avec succes .</div>";
                $product->setImagePath("images/".$file_name);
                $product->_push();
			}else {
				echo "<div class='alert alert-danger' role='alert'>Erreur , un problème est survenu pendant le téléchargement .</div>";
			}
		}
		
    }
    
    //load all cathegorie
    function loadAllCathegorie(){
		$pdo = _connect();
		$abfrage = "SELECT * FROM cathegorie";
		$statement = $pdo->query($abfrage);
				while($back = $statement->fetch())
				{
					$id = $back['id'];
					$label = $back['label'];
					echo "<option value=$id>$label</option>";
				}
    }
    
    //list all Cathegorie
    function getAllCathegorie(){
        $i = 0;
        $listCathegorie = array();
        $pdo = _connect();
		$abfrage = "SELECT * FROM cathegorie";
		$statement = $pdo->query($abfrage);
				while($back = $statement->fetch())
				{
                    $cathegorie = new CathegorieClass();
                    $cathegorie->setId($back['id']);
                    $cathegorie->setLabel($back['label']);
                    $listCathegorie[$i] = $cathegorie;
                    $i++;
                }
                
        return $listCathegorie;
    }


    //get all product by cathegorie
    function getProductByCathegorie($id_cathegorie){
        $i = 0;
        $listProduct = array();
        $pdo = _connect();
        $abfrage = "SELECT * FROM product WHERE id_cathegorie = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute([$id_cathegorie]);
				while($back = $statement->fetch())
				{
                    $product = new ProductClass();
                    $product->setId($back['id']);
                    $product->setName($back['name']);
                    $product->setDescription($back['description']);
                    $product->setOldPrice($back['old_price']);
                    $product->setCurrentPrice($back['current_price']);
                    $product->setUnity($back['unity']);
                    $product->setInitQty($back['init_qty']);
                    $product->setCurrentQty($back['current_qty']);
                    $product->setCommandUrl($back['command_url']);
                    $product->setDateCreated($back['date_created']);
                    $product->setImagePath($back['image_path']);
                    $product->setIdCathegorie($back['id_cathegorie']);
                    $product->setIdUser($back['id_user']);

                    $listProduct[$i] = $product;
                    $i++;
                }
        return $listProduct;
    }

    //get list of all product
    function getAllProduct(){
        $i = 0;
        $listProduct = array();
        $pdo = _connect();
        $abfrage = "SELECT * FROM product";
        $statement = $pdo->prepare($abfrage);
		$statement->execute();
				while($back = $statement->fetch())
				{
                    $product = new ProductClass();
                    $product->setId($back['id']);
                    $product->setName($back['name']);
                    $product->setDescription($back['description']);
                    $product->setOldPrice($back['old_price']);
                    $product->setCurrentPrice($back['current_price']);
                    $product->setUnity($back['unity']);
                    $product->setInitQty($back['init_qty']);
                    $product->setCurrentQty($back['current_qty']);
                    $product->setCommandUrl($back['command_url']);
                    $product->setDateCreated($back['date_created']);
                    $product->setImagePath($back['image_path']);
                    $product->setIdCathegorie($back['id_cathegorie']);
                    $product->setIdUser($back['id_user']);

                    $listProduct[$i] = $product;
                    $i++;
                }
        return $listProduct;
    }
    //get product by id
    function getProductById($id){
        $product = new ProductClass();
        $pdo = _connect();
        $abfrage = "SELECT * FROM product WHERE id = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute([$id]);
				while($back = $statement->fetch())
				{  
                    $product->setId($back['id']);
                    $product->setName($back['name']);
                    $product->setDescription($back['description']);
                    $product->setOldPrice($back['old_price']);
                    $product->setCurrentPrice($back['current_price']);
                    $product->setUnity($back['unity']);
                    $product->setInitQty($back['init_qty']);
                    $product->setCurrentQty($back['current_qty']);
                    $product->setCommandUrl($back['command_url']);
                    $product->setDateCreated($back['date_created']);
                    $product->setImagePath($back['image_path']);
                    $product->setIdCathegorie($back['id_cathegorie']);
                    $product->setIdUser($back['id_user']);
                }
        return $product;
    }

    //check if another product with the same already exist
    function getProductByName($name){ 
        $pdo = _connect();
        $product = new ProductClass();
        $abfrage = "SELECT * FROM product WHERE name = ? OR name LIKE '%?%'";
        $statement = $pdo->prepare($abfrage);
        $statement->execute([$name]);
        while($back = $statement->fetch()){
            $product->setId($back['id']);
            $product->setName($back['name']);
            $product->setDescription($back['description']);
            $product->setOldPrice($back['old_price']);
            $product->setCurrentPrice($back['current_price']);
            $product->setUnity($back['unity']);
            $product->setInitQty($back['init_qty']);
            $product->setCurrentQty($back['current_qty']);
            $product->setCommandUrl($back['command_url']);
            $product->setDateCreated($back['date_created']);
            $product->setImagePath($back['image_path']);
            $product->setIdCathegorie($back['id_cathegorie']);
            $product->setIdUser($back['id_user']);
        }

        return $product;
    }
    //get all pending command
    function getAllCommand($status){
        $i = 0;
        $listCommand = array();
        $pdo = _connect();
        $abfrage = "SELECT * FROM command WHERE status_ = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute([$status]);
				while($back = $statement->fetch())
				{
                    $command = new CommandClass();
                    $command->setId($back['id']);
                    $command->setClientName($back['client_name']);
                    $command->setTelefone($back['telefone']);
                    $command->setMail($back['mail']);
                    $command->setAdresse($back['adresse']);
                    $command->setPriceCmd($back['price_cmd']);
                    $command->setQtyCmd($back['qty_cmd']);
                    $command->setDateCmd($back['date_cmd']);
                    $command->setDateDelivry($back['date_delivry']);
                    $command->setStatus($back['status_']);
                    $command->setIdProduct($back['id_product']);

                    $listcommand[$i] = $command;
                    $i++;
                }
        return $listcommand;
    }

    //get Command by Id
    function getCommandById($id){
        $command = new CommandClass();
        $pdo = _connect();
        $abfrage = "SELECT * FROM command WHERE id = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute([$id]);
				while($back = $statement->fetch())
				{
                   
                    $command->setId($back['id']);
                    $command->setClientName($back['client_name']);
                    $command->setTelefone($back['telefone']);
                    $command->setMail($back['mail']);
                    $command->setAdresse($back['adresse']);
                    $command->setPriceCmd($back['price_cmd']);
                    $command->setQtyCmd($back['qty_cmd']);
                    $command->setDateCmd($back['date_cmd']);
                    $command->setDateDelivry($back['date_delivry']);
                    $command->setStatus($back['status_']);
                    $command->setIdProduct($back['id_product']);
                }
        return $command;

    }
    //list status
    function getListStatus($focus)
    {
        if ($focus == "En Attente") {
            echo "<option value='En route'>En route</option>
                <option value='Livrée'>Livrée</option>
            ";
        }else{
            if ($focus == "En route") {
                echo "<option value='En Attente'>En Attente</option>
                    <option value='Livrée'>Livrée</option>
                ";
            }else{
                if ($focus == "Livrée") {
                    echo "<option value='En Attente'>En Attente</option>
                        <option value='En route'>En route</option>
                    ";
                }
            }
        }
        
    }

    //update command
    function updateStatusCommand($id_cmd,$status,$date_delivry){
        $pdo = _connect();
        $abfrage = "UPDATE  command SET status_ = ? , date_delivry = ?  WHERE id = ? ";
        $statement = $pdo->prepare($abfrage);
        if($statement->execute([
            $status,
            $date_delivry,
            $id_cmd
            ]) ) {
                echo "<div class='alert alert-success' role='alert'>  Update Success ! </div>";
                $cmd = getCommandById($id_cmd);
                notifyClient($cmd);
            }
        else{
            echo "<div class='alert alert-danger' role='alert'> Update impossible \n Try again ! </div>";
        }
    }
            
    
    //notify client 
    function notifyClient($cmd){
        $to = "kmerfood2020@gmail.com,".$cmd->getMail()."";
            $subject = "Livraison Commande Kmerfood";
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
            <th>Date de livraison</th>
            </tr>
            <tr>
            <td>".$product->getName()."</td>
            <td>".$cmd->getQtyCmd()."</td>
            <td>".$cmd->getPriceCmd()."</td>
            <td>".$cmd->getDateDelivry()."</td>
            </tr>
            </table>
            <p/><div class='alert alert-secondary' role='alert'> est en chemin. </div><p/> <h4>Merci pour votre confiance!</h4>
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
    //get all command
    function getListAllCommand(){
        $i = 0;
        $listCommand = array();
        $pdo = _connect();
        $abfrage = "SELECT * FROM command WHERE status_ = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute(["En Attente"]);
				while($back = $statement->fetch())
				{
                    $command = new CommandClass();
                    $command->setId($back['id']);
                    $command->setClientName($back['client_name']);
                    $command->setTelefone($back['telefone']);
                    $command->setMail($back['mail']);
                    $command->setAdresse($back['adresse']);
                    $command->setPriceCmd($back['price_cmd']);
                    $command->setQtyCmd($back['qty_cmd']);
                    $command->setDateCmd($back['date_cmd']);
                    $command->setDateDelivry($back['date_delivry']);
                    $command->setStatus($back['status_']);
                    $command->setIdProduct($back['id_product']);

                    $listcommand[$i] = $command;
                    $i++;
                }

        $abfrage = "SELECT * FROM command WHERE status_ = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute(["En route"]);
				while($back = $statement->fetch())
				{
                    $command = new CommandClass();
                    $command->setId($back['id']);
                    $command->setClientName($back['client_name']);
                    $command->setTelefone($back['telefone']);
                    $command->setMail($back['mail']);
                    $command->setAdresse($back['adresse']);
                    $command->setPriceCmd($back['price_cmd']);
                    $command->setQtyCmd($back['qty_cmd']);
                    $command->setDateCmd($back['date_cmd']);
                    $command->setDateDelivry($back['date_delivry']);
                    $command->setStatus($back['status_']);
                    $command->setIdProduct($back['id_product']);

                    $listcommand[$i] = $command;
                    $i++;
                }
        $abfrage = "SELECT * FROM command WHERE status_ = ?";
        $statement = $pdo->prepare($abfrage);
		$statement->execute(["Livrée"]);
				while($back = $statement->fetch())
				{
                    $command = new CommandClass();
                    $command->setId($back['id']);
                    $command->setClientName($back['client_name']);
                    $command->setTelefone($back['telefone']);
                    $command->setMail($back['mail']);
                    $command->setAdresse($back['adresse']);
                    $command->setPriceCmd($back['price_cmd']);
                    $command->setQtyCmd($back['qty_cmd']);
                    $command->setDateCmd($back['date_cmd']);
                    $command->setDateDelivry($back['date_delivry']);
                    $command->setStatus($back['status_']);
                    $command->setIdProduct($back['id_product']);

                    $listcommand[$i] = $command;
                    $i++;
                }


        return $listcommand;
    }

?>