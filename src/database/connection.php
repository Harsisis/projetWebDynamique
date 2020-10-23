<?php
function connect (){
    try {
        $objPdo = new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=cadet25u_projetPHP', 'cadet25u_appli', 'Gauthier541609' );
    }
    catch( Exception $exception ) {
        die($exception->getMessage());
    }
}
?>