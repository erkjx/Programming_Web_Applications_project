<?php
class Database {
    private $mysqli;

    public function __construct($serwer, $user, $pass, $baza)
   {
      $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
      if ($this->mysqli->connect_errno) {
         exit();
      }
      if ($this->mysqli->set_charset("utf8")) {
      }
   }
   function __destruct()
   {
      $this->mysqli->close();
   }
   public function insert($sql)
   {
      if ($this->mysqli->query($sql)) {
         return true;
      } else {
         return false;
      }
   }
   public function update($sql)
   {
      if ($this->mysqli->query($sql)) {
         return true;
      } else {
         return false;
      }
   }
   public function delete($sql)
   {
      if ($this->mysqli->query($sql)) {
         return true;
      } else {
         return false;
      }
   }
   public function select($sql, $pola)
   {

      $tresc = "";
      if ($result = $this->mysqli->query($sql)) {
         $ilepol = count($pola);
         $tresc .= "<table><tbody>";
         while ($row = $result->fetch_object()) {
            $tresc .= "<tr>";
            for ($i = 0; $i < $ilepol; $i++) {
               $p = $pola[$i];
               $tresc .= "<td>" . $row->$p . "</td>";
            }
            $tresc .= "</tr>";
         }
         $tresc .= "</table></tbody>";
         $result->close(); 
      }
      return $tresc;
   }
   public function selectUser($email, $pass, $tabela)
   {
      $id = -1;
      $sql = "SELECT * FROM $tabela WHERE email='$email'";
      if ($result = $this->mysqli->query($sql)) {
         $ile = $result->num_rows;
         if ($ile == 1) {
            $row = $result->fetch_object();
            $hash = $row->password;
            if (password_verify($pass, $hash))
               $id = $row->id;
         }
      }
      return $id;
   }
}

?>