<?php
class Message {
   private $_contenu;
   private $_timestamp;
   /**
   * @var User
   **/
   private $_user;
   private $_idMessage;

    public function __construct()
    {}
   
   public function getUser()
   {
      return $this->_user;
   }

   public function getContenu()
   {
      return $this->_contenu;
   }
   
   public function getTimestamp()
   {
      return $this->_timestamp;
   }
   
   public function getIdMessage()
   {
      return $this->_idMessage;
   }
   
   public function setUser(User $user)
   {
      $this->_user = $user; 
   }
   
   public function setContenu($contenu)
   {
      $this->_contenu = $contenu; 
   }
   
   public function setTimestamp()
   {
      $this->_timestamp = time();
   }
   
   public function setIdMessage($idM)
   {
      $this->_idMessage = $idM; 
   }
}
 ?>
