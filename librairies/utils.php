<?php

 function redirect(string $url): void // void : cette fonctio ne renvoie rien
{
    header("Location: $url");
    exit();
}
?>