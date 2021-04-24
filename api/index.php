<!DOCTYPE html>
<html lang="pt">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, user-scalable=no">
  <meta name="Artur" content="mobLee">
  <meta name="theme-color" content="#ed1164">
  <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
  <link href="/static/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"/></script>
  <script src="/static/jquery.tablesorter.min.js"></script>
  <script type="text/javascript">//usa jquery pra ordenar tabelas, rápido e fácil
    $(document).ready(function(){//espera a pagina carregar para chamar
      $("#pokedex").tablesorter();
    }); 
  </script>
  <title>Desafio Moblee</title>
</head>

<body>
  <div id="nesscss">
    <div class="container">
      <section class="topic">
        <div class="item">
          <section class="showcase">
            <section class="nes-container is-dark member-card">
              <div class="avatar">
                <img data-src="/static/trainer.png" alt="Artur Simon" class="" src="/static/trainer.png">
              </div>
              <div class="profile">
                <h1 class="name">Pokédex </h1><h4> - por Artur Simon</h4>
                <p>Desafio para a vaga de desenvolvimento front na empresa mobLee.</p>
              </div>
            </section>
          </section>
          <section class="showcase">
            <section class="nes-container with-title">
              <h3 class="title">Pokédex</h3>
              <div id="tables" class="item">
                <div class="nes-table-responsive">
                  <table id="pokedex" class="nes-table is-centered is-bordered" style="margin: 4px auto 4px auto;">
                    <thead>
                      <tr>
                        <th colspan="2" id="nome"><a href="#" class="is-selected">Pokémon</a></th>
                        <th><a href="#" >Altura</a></th>  
                        <th><a href="#" >Peso</a></th>
                        <th><a href="#" >Tipo</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once __DIR__ . '/../vendor/autoload.php';
                        use PokeAPI\Client;
                        $client = new Client();
                        $index = 1;
                        while($index <= 51) {
                          @$species = $client->pokemon($index);
                          $tipos = $species->getTypes();
                          $pokeTipos = "";
                          foreach ($tipos as $t)
                            $pokeTipos .= ucfirst($t->getType()->getName()).", ";
                          $pokeTipos = substr($pokeTipos, 0, -2);
                          echo "<tr>"
                              ."<td><img src=".$species->getSprites()['front_default']." loading='lazy' alt=".$species->getName()."></td>"
                              ."<td><strong>".ucfirst($species->getName())."</strong></td>"
                              ."<td><span>".($species->getHeight()/10)."</span>m</td>"
                              ."<td><span>".($species->getWeight()/10)."</span>Kg</td>"
                              ."<td>".$pokeTipos."</td>"
                              ."</tr>";
                          $index++;
                        }?>
                    </tbody>
                  </table>
            </section>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>
</div>
</body>
<footer>2019 © - Artur Simon</footer>
</html>