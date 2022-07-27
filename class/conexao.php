<?php
    $dbname='teste';
    $user='root';
    $pass='';

        try {
            $con= new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
        } catch (Exception $e) { 
            echo $e->getMessage();
        }   
        
    

?>