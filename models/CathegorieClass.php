<?php

    class CathegorieClass
    {
        private $id;
        private $label;

        public function __construct(){}

        public function getId(): ?string
        {
            return $this->id;
        }

        public function setId(string $id_): self
        {
            $this->id = $id_;

            return $this;
        }

        public function getLabel(): ?string
        {
            return $this->label;
        }

        public function setLabel(string $label_): self
        {
            $this->label = $label_;

            return $this;
        }
        //save cathegorie

        public function _push(): self
        {
            //generate code for id cathegorie
            $code_cathegorie = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789'); // and any other characters
            shuffle($code_cathegorie); // probably optional since array_is randomized; this may be redundant
            $code = 'C';
            foreach (array_rand($code_cathegorie, 4) as $k) $code .= $code_cathegorie[$k];

            $pdo = _connect();
            $abfrage = "INSERT INTO  cathegorie VALUES (?,?)";
            $statement = $pdo->prepare($abfrage);
            if($statement->execute([
                $code,
                $this->getLabel()
                ]) ) {
                    echo "
                    <div aria-live='polite' aria-atomic='true' data-delay='10000' style='position: relative; min-height: 200px;'>
                    <div class='toast' style='position: absolute; top: 0; right: 0;'>
                      <div class='toast-header'>
                        <img src='../images/info.png' class='rounded mr-2' alt='Infos !'>
                        <strong class='mr-auto'>Feedback !</strong>
                        <small>3s</small>
                        <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='toast-body'>
                      <div class='alert alert-success' role='alert'>  La cathegorie ".$this->getLabel()." a été sauvegardé <img src='../images/good.png' alt='Saved !' /> </div>
                      </div>
                    </div>
                  </div>";
                }
            else{
                echo "
                <div aria-live='polite' aria-atomic='true' data-delay='10000' style='position: relative; min-height: 200px;'>
                <div class='toast' style='position: absolute; top: 0; right: 0;'>
                  <div class='toast-header'>
                    <img src='../images/info.png' class='rounded mr-2' alt='Infos !'>
                    <strong class='mr-auto'>Feedback !</strong>
                    <small>3s</small>
                    <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='toast-body'>
                  <div class='alert alert-danger' role='alert'> Echec Sauvegarde  <img src='../images/error.png' alt='Saved !' /> </div>
                  </div>
                </div>
              </div>";
            }
            return $this;
        }

    }

