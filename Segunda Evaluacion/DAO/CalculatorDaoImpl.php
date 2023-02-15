<?php
    require_once 'CalculatorDAO.php';

    class CalculatorDAOImpl implements CalculatorDAO {
        private $sessionKey = "calculator-operations";

        public function saveOperation($operation) {
            if(session_status() == PHP_SESSION_NONE)
                session_start();
            $operations = $_SESSION[$this->sessionKey] ?? array();
            $operations[] = $operation;
            $_SESSION[$this->sessionKey] = $operations;
        }

        public function getOperations() {
            if(session_status() == PHP_SESSION_NONE)
                session_start();
            return $_SESSION[$this->sessionKey] ?? array();
        }
    }
    
?>