<?php 

include "DB.php";

    class Todo extends DB {

        /// Read Todo ///
        public function getTodo() 
        {
            $sql = "SELECT * FROM todo ORDER BY id DESC";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
    
            while($result = $stmt->fetchAll()) {
            return $result;
            };
        }

        /// Create Todo ///
        public function addTodo($title) 
        {
            $sql = "INSERT INTO todo(title) VALUES(?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title]);
        }

        /// Edit Todo ///
        public function editTodo($id) 
        {
            $sql = "SELECT * FROM todo WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        
            return $result;
        }

        /// Update Todo ///
        public function updateTodo($title, $id) 
        {
            $sql = "UPDATE todo SET title = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $id]);
        }

        /// Delete Todo ///
        public function deleteTodo($id)
        {
            $sql = "DELETE FROM todo WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }

    }
    

?>