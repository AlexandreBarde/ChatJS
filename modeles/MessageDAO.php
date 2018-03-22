<?php
require_once('../include/Database.php');

class MessageDAO
{
   private $_connection;
   private $_table;
   /**
   *
   **/
   private $_message;
   
   public function __construct(Database $db)
   {
      $this->_connection = $db->getConnection();
      $this->table = "message";
   }

   public function getTable()
   {
      return $this->table;
   }
   
   public function getMessage()
   {
      return $this-> _message;
   }
   
   public function setMessage(Message $message)
   {
      $this->_message = $message;
   }
   
   /**
   * Retourne vrai si l'insertion s'est bien déroulée
   * @return bool
   **/
   public function saveMessage()
   {
      $insert = "INSERT INTO " . $this->getTable() . "VALUES(:timestamp, :id_compte, :contenu)";
      $requete = $this->_connection->prepare($insert);
      return $requete->execute(array('timestamp' => $this->_message->getTimestamp(),
                                     'id_compte') => $this->_message->getUser()->getIdUser(),
                                     'contenu' => $this->_message->getContenu());
   }
}

?>
