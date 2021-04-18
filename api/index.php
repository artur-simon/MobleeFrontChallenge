<!DOCTYPE html>
<html lang="pt">
<head>

  <!-- Meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, user-scalable=no">
  <meta name="Artur" content="mobLee">
  <meta name="theme-color" content="#ed1164">

  <!-- CSS -->
  <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">

  <!-- Title -->
  <title>Desafio 1</title>
  
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"/></script>

  <!-- Plugin tablesorter  -->
  <script src="js/jquery.tablesorter.min.js"></script>
  <script type="text/javascript">//usa jquery pra ordenar a tabela, rápido e fácil
  $(document).ready(function(){//espera a pagina carregar para chamar
    $("#pokedex").tablesorter();
  }); 
</script>

</head>
<body>
  <div id="nesscss">
    <div class="container">
      <section class="topic">
        <div class="item">
          <section class="showcase">
            <section class="nes-container is-dark member-card">
              <div class="avatar">
                <img data-src="assets/trainer.png" alt="Artur Simon" class="" src="assets/trainer.png">
              </div>
              <div class="profile">
                <h4 class="name">A tabela Pokémon - por Artur Simon</h4>
                <p>Desafio para a vaga de desenvolvimento em marketing na empresa mobLee.</p>
              </div>
            </section>
          </section>
          <section class="showcase">
            <section class="nes-container with-title">
              <h3 class="title">A tabela Pokémon</h3>
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
                  $url = 'https://pokeapi.co/api/v2/pokemon/';//endereço base da api
                  $index = 1;

                  while($index < 10) {//O desafio especifica 9 dos pokemons, logo criamos o laço que corre até a décima iteração, acessando a pokeapi e os dados dos pokemons, convertemos o json em objeto e acessamos suas propriedades para printar a tabela com as devidas conversões.

                    $pokeData = file_get_contents($url.$index); //armazenamos os dados recebidos através da requisição feita à api, utilizando a url mais o número do pokemon
                    
                    $pokemon = json_decode($pokeData); //dados sao devidadmente convertidos de json para um objeto que podemos acessar
                    
                    $tipos = $pokemon->types; //type, diferente das outras propriedades, é um array de tamanho variável, implementamos um laço para adicionar todos
                    $pokeTipo = ""; //iniciamos vazio
                    foreach ($tipos as $t) {
                      $pokeTipo .= ucfirst($t->type->name).", "; //concatenamos o tipo com a primeira letra em caixa alta, adicionamos vírgula e espaço.
                    }
                    $pokeTipo = substr($pokeTipo, 0, -2);//removemos a ultima vírgula ao final do laço

                    /*Imprimimos por fim toda a linha da tabela com as informações coletadas da api; em html*/
                    echo "<tr>"
                    ."<td><img src=".$pokemon->sprites->front_default." alt=".$pokemon->name."></td>"
                    ."<td><strong>".ucfirst($pokemon->name)."</strong></td>"
                    ."<td><span>".($pokemon->height/10)."</span>m</td>"
                    ."<td><span>".($pokemon->weight/10)."</span>Kg</td>"
                    ."<td>".$pokeTipo."</td>"
                    ."</tr>";

                    $index++;
                  }
                  ?>
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