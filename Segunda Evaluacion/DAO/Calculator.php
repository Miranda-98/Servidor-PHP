<?php
    require_once 'CalculatorDAOImpl.php';

    class Calculator {
        private $dao;
        
        public function __construct() {
            $this->dao = new CalculatorDAOImpl();
        }
        
        public function add($a, $b) {
            $result = $a + $b;
            $this->saveOperation("$a + $b = $result");
            return $result;
        }
        
        public function subtract($a, $b) {
            $result = $a - $b;
            $this->saveOperation("$a - $b = $result");
            return $result;
        }
        
        public function multiply($a, $b) {
            $result = $a * $b;
            $this->saveOperation("$a * $b = $result");
            return $result;
        }
        
        public function divide($a, $b) {
            if ($b == 0) {
            throw new Exception("Division by zero");
            }
            $result = $a / $b;
            $this->saveOperation("$a / $b = $result");
            return $result;
        }
        
        private function saveOperation($operation) {
            $this->dao->saveOperation($operation);
        }
        
        public function getOperations() {
            return $this->dao->getOperations();
        }
    }
    

?>