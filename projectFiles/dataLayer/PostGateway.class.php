<?php
    class PostGateway extends AbstractGateway { 
        public function __construct($connect)    {
                parent::__construct($connect);
        }
        
        protected function getSelectStatement() {    
            return "SELECT PostID, UserID, MainPostImage, Title, Message, PostTime
                    FROM Posts";
        }
        
        //This may be unneeded will see
        protected function getOrderFields()    {
            return 'PostTime';
        }
        
        protected function getKeyField() {
            return "PostID"; 
        }
    } 
?>