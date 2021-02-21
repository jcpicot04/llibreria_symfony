<?php
namespace App\Service;

class BDProvaLlibres{

private $llibres = array(
        array("isbn" => "A111B3", "titol" => "IT",
        "autor" => "Pepe", "pagines" => 345),
        array("isbn" => "A222B3", "titol" => "Amor",
        "autor" => "Paco", "pagines" => 375),
        array("isbn" => "A333B3", "titol" => "Esa noche",
        "autor" => "Manolo", "pagines" => 445),
        array("isbn" => "A444B3", "titol" => "Desierto nevado",
        "autor" => "Eric", "pagines" => 745),
        array("isbn" => "A555B3", "titol" => "Penumbra",
        "autor" => "Pablo", "pagines" => 645),
        );

public function get()
{
return $this->llibres;
}
}
?>