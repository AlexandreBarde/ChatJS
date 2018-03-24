<?php
require_once('../include/Database.php');

class MessageDAO
{
   private $_connection;
   private $_table;
    /**
     * @var Message
     */
   private $_message;
   
   public function __construct(Database $db)
   {
      $this->_connection = $db->getConnection();
      $this->_table = "message";
   }

   public function getTable()
   {
      return $this->_table;
   }
   
   public function getMessage()
   {
      return $this-> _message;
   }
   
   public function setMessage(Message $message)
   {
      $this->_message = $message;
   }

   public function yo(){
      return $this->_message->getContenu();
   }

   /**
   * Retourne vrai si l'insertion s'est bien déroulée
   * @return bool
   **/
   public function saveMessage()
   {
      $insert = "INSERT INTO " . $this->getTable() . " (timestamp,id_compte,contenu) VALUES(".$this->_message->getTimestamp().", ".$this->_message->getUser()->getIdUser().", '".$this->_message->getContenu()."')";
      $requete = $this->_connection->prepare($insert);
      return $requete->execute();
   }
}

?>
