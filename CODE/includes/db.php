<?php
/*echo $_SERVER['SERVER_NAME'];
$host = $SERVER['SERVER_NAME'] == 'localhost' ? 'localhost:3306' : 'hostDeProd';
$name = $SERVER['SERVER_NAME'] == 'localhost' ? 'pa' : 'BddProd';
$user = $SERVER['SERVER_NAME'] == 'localhost' ? 'root' : 'userdeprod';
$mdp = $SERVER['SERVER_NAME'] == 'localhost' ? 'root' : 'mdpdeprod';
$attr = $SERVER['SERVER_NAME'] == 'localhost' ? [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] : [];

try{
    $bdd = new PDO('mysql:host='.$host .';dbname='.$name.','.$user.', '.$mdp.','. array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exeption $e){
    die('Erreur PDO : ' . $e->getMessage());
}*/



try{
    $bdd=new PDO('mysql:host=localhost:3306;dbname=pa','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e){
    die('Erreur PDO : ' . $e->getMessage());
}

?>
