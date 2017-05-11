<?php

error_reporting(0);

try{
      // $con = new PDO('mysql:host=localhost;dbname=merchans_kotokubank','merchans_admin','globa@@rachel.sinoway1993');
          $con = new PDO('mysql:host=localhost;dbname=timetable','root','');
        }
      catch(PDOException $e)
      {
        print_r($e->getMessage());
      }


?>
