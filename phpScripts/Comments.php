<?php

    class Comments extends DBmanager
    {
        
        public function __construct($conn)
        {
            parent::__construct($conn);
        }
        
        public function addComment($positive, $comment, $user_id, $car_id)
        {
            $getUserIDRequest = "SELECT COUNT(*) AS count FROM comment WHERE UserID={$user_id} AND CarID={$car_id}";
            $commentsCount = $this->conn->query($getUserIDRequest)->fetch_array()['count'];

            if($commentsCount != 0) //rewriting comment
            {
                $this->deleteComment($user_id, $car_id);
            }
            
            $this->conn->query("INSERT INTO `comment`(positive, commentText, UserID, CarID) VALUES({$positive}, '{$comment}', {$user_id}, {$car_id});"); 
        }
        
        public function getCommentsForCar($carName)
        {
            $comments = [];
            
            $request = "SELECT positive, commentText, `date`, `user`.avatar, `user`.login 
            FROM `comment` 
            JOIN `user` ON UserID = `user`.`ID` 
            JOIN `car` ON CarID = `car`.`ID` 
            WHERE car.Name = '{$carName}'";
            $result = $this->conn->query($request);
            
            //echo $request;

            while($row = $result->fetch_array()) //fetching request to array
            {
                $comments[count($comments)] = $row;
            }
            
            return $comments;
        }
        
        private function deleteComment($user_id, $car_id)
        {
            $this->conn->query("DELETE FROM `comment` WHERE UserID={$user_id} AND CarID={$car_id}; "); 
        }
    }

?>