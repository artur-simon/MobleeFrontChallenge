<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PokeAPI\Client;
if(isset($_POST['start']) && $_POST['start'] > 0)
{
    $html = "";
    $client = new Client();
    $start = $_POST['start'];
    $index = $start;
    while($index <= $start+6) 
    {
      @$species = $client->pokemon($index);
      $tipos = $species->getTypes();
      $pokeTipos = "";
      foreach ($tipos as $t)
        $pokeTipos .= ucfirst($t->getType()->getName()).", ";
      $pokeTipos = substr($pokeTipos, 0, -2);
      $html .=  "<tr>"
              ."<td><img src=".$species->getSprites()['front_default']." loading='lazy' alt=".$species->getName()."></td>"
              ."<td><strong>".ucfirst($species->getName())."</strong></td>"
              ."<td><span>".($species->getHeight()/10)."</span>m</td>"
              ."<td><span>".($species->getWeight()/10)."</span>Kg</td>"
              ."<td>".$pokeTipos."</td>"
              ."</tr>";
      $index++;
    }
    echo $html;
}
?>