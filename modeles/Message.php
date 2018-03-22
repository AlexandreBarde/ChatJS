<?php
class Message {
   private $_contenu;
   private $_timestamp;
   /**
   * @var User
   **/
   private $_user;
   private $_idMessage;
   
   public function getUser(){
      return $this->$_user->getPseudo();
   }

   public function getContenu(){
      return $this->_contenu;
   }
   
   public function getTimestamp(){
      return $this->_timestamp;
   }
   
   public function getIdMessage(){
      return $this->_idMessage;
   }
}
 ?>
