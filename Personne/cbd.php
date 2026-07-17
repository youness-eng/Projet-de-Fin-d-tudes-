<?php 

$conn = mysqli_connect("localhost", "root", "", "trocpfe");

if(!$conn){
    die("La connexion a échoué" . mysqli_connect_error());
}