<?php
//connexion
try {
    $bdd  = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



  //Read data from database
  public function select($query)
  {
      $result = $this->link->query($query) or die($this->link->error . __LINE__);
      if ($result->num_rows > 0) {
          return $result;
      } else {
          return false;
      }
  }


  //Insert into Database
  public function crate($query)
  {
      $insert = $this->link->query($query) or die($this->link->error . __LINE__);
      if ($insert) {
          return $insert;
      } else {
          return false;
      }
  }
  //Update into Database
  public function update($query)
  {
      $update = $this->link->query($query) or die($this->link->error . __LINE__);
      if ($update) {
          return $update;
      } else {
          return false;
      }
  }

  public function delete($query)
  {
      $delete = $this->link->query($query) or die($this->link->error . __LINE__);
      if ($delete) {
          return $delete;
      } else {
          return false;
      }
  }
}
?>