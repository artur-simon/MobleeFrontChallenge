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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="/static/jquery.tablesorter.min.js"></script>
  <script type="text/javascript">
    var load_flag = 1;
    loadMore(load_flag)
    function loadMore(start)
    {
      $.ajax({
            url:'/api/get.php',
            data:'start=' + start,
            type:'post',
            success:function(result){
              $('#lazyTbody').append(result);
              load_flag += 7;
            }});
    }
    $(document).ready(function(){
      $(window).scroll(function(){
        if($(window).scrollTop() >= $(document).height() - $(window).height() && load_flag <= 150){
          loadMore(load_flag)
        }
      });
    });

    $(document).ready(function(){
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
                    <tbody id="lazyTbody">
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