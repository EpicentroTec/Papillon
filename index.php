<?php
  session_start();
  if (isset($_GET['i']) && $_GET['i'] == "eng") {
    $_SESSION['i'] = 1;
    header('Location: .');
  }
  else
    session_destroy();
  $lang = $_SESSION['i'] == 1? 2 : 1;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Papillon Buffet e Eventos - Casamento na Praia - Ubatuba, SP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Epicentro Inform&aacute;tica">
    <meta name="description" content="Papillon Buffet e Eventos - Casamento na praia, formaturas, eventos em geral - Ubatuba, SP">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="Papillon,">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagens/favicon.ico" >
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.center.min.js"></script>
    <script src="script.js"></script>
    <script>
    <!--
      function menudepo() {
        var f = document.getElementById('depo-menu');
        f.style.marginTop = "-40px";
        f.style.height = "80px";
        f.innerHTML  = "<a href='#envie'>Envie seu depoimento</a><br><a href='#mais'>Mais depoimentos</a>";
        f.innerHTML += "<br><span onclick='menuhide()'><i class='fa fa-caret-down'></i></span>";
      }
      function menuhide() {
        var f = document.getElementById('depo-menu');
        f.style.marginTop = "0";
        f.style.height = "40px";
        f.innerHTML  = "<span onclick='menudepo()'><i class='fa fa-caret-up'></i> Depoimentos</span>";
      }
      function rolar() {
        var h = window.innerHeight;
        window.scrollTo(0, h);
      }
      function foto(img) {
        var f = document.getElementById('foto_gde');
        f.innerHTML = "<img src='http://www.papilloneventos.com.br/sitenovo/imagens/" + img + "'>";
      }
    -->
    </script>
  </head>
  <body class="resolucao">
    <header id="header" class="header">
      <h1 class="hidden">Papillon Buffet e Eventos</h1>
      <div class="slider slideshow" data-cycle-center-horz="true" data-cycle-center-vert="true">
        <div class="cycle-pager"></div>
        <?php
					$dir = "abert";
					if (is_dir($dir)) {
						if ($dh = opendir($dir)) {
							$i = 0;
							while (($file = readdir($dh)) !== false)
								$fotos[$i++] = $file;
							closedir($dh);
						}
					}
					for ($i = 3; $i < count($fotos)-3; $i++) {
						echo "<img src=\"" . $dir . "/" . $fotos[$i] . "\"";
						echo $i == 3? " class=\"slide active\"" : "class=\"slide active\"";
						echo ">";
					}
				?>
      </div>
      <div class="wrap wrap-social">
        <ul class="social-bar">
          <li><a href="http://www.facebook.com/profile.php?id=1746417399#!/profile.php?id=1746417399"><img src="assets/img/i-facebook.png" alt="ícone Facebook"></a></li>
          <li><a href="http://twitter.com/#!/papillonbuffet"><img src="assets/img/i-twitter.png" alt="ícone Twitter"></a></li>
          <li><a href="http://www.flickr.com/photos/31374899@N03/5110850805/"><img src="assets/img/i-flickr.png" alt="ícone Flickr"></a></li>
          <li><a href="http://casamentonapraiapapillon.blogspot.com/"><img src="assets/img/i-blogger.png" alt="ícone Blogger"></a></li>
          <li class="english"><span class="text"> 
          <?php
            if (isset($_SESSION['i']))
              echo "<a href=\".\"><img src=\"assets/img/i-portugues.png\" alt=\"ícone Português\"> Português</a>";
            else
              echo "<a href=\"?i=eng\"><img src=\"assets/img/i-english.png\" alt=\"ícone Inglês\"> English</a>";
          ?>
          </span></li>
        </ul>
      </div>
      <nav class="menu">
        <h1 class="hidden">Menu</h1>
        <div class="wrap">
          <div class="logo">
            <a href="<?= $lang == 1? "." : "?i=eng"; ?>"><img src="assets/img/logo.png" alt="Logo"></a>
          </div>
          <ul>
            <?php 
            if ($lang == 1)
              $tit  = array("Quem somos","Serviços","Casamento na Praia","Orçamento","Mídia","Contato");
            else
              $tit  = array("Who we are","Services","Beach Wedding","Online Budget","Multimedia","Contact us");
            ?>
            <li class="menu-icon"><i class="fa fa-bars"></i></li>
            <li class="menu-item"><a href=".#quemsomos"><?=$tit[0]; ?></a></li>
            <li class="menu-item"><a href=".#servicos"><?=$tit[1]; ?></a></li>
            <li class="menu-item"><a href=".#casamento"><?=$tit[2]; ?></a></li>
            <li class="menu-item"><a href=".#orcamento"><?=$tit[3]; ?></a></li>
            <?php 
            if ($lang == 1) {
              ?>
              <li class="menu-item"><a href=".#depoimentos">Depoimentos</a></li>
              <?php 
            }
            ?>
            <li class="menu-item"><a href=".#midia"><?=$tit[4]; ?></a></li>
            <li class="menu-item"><a href=".#contato"><?=$tit[5]; ?></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <section id="locacao" class="locacao">
        <div class="wrap">
          <?php
          if ($lang == 1) {
          ?>
            <h1 class="hidden">Locação de materiais</h1>
            <p>Veja também: 
            <a href="?pag=124">Locação de materiais</a> | 
            <a href="noivos.php">Página dos noivos</a></p>          
          <?php
          }
          else
            echo "<p>&nbsp;</p>";
          ?>
        </div>
      </section>
      
      <section id="conteudo"></section>
      <?php
      if ($lang == 1)
        $tit2 = array("Quem somos","Profissionalismo","Variedade","Custo-Benefício","Atendimento");
      else
        $tit2 = array("Who we are","Professionalism","Variety","Cost-effectiveness","Customer service");
      
      include ("conexao.php");
      
      if (!isset($_GET['pag'])) {
        ?>
        <section id="quemsomos" class="quemsomos clearfix">
          <h1 class="hidden"><?= $tit[0]; ?></h1>
          <?php
            $sql = "SELECT * FROM pagina WHERE id = 1;";
            $res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
              
            $txt = mysql_fetch_array($res);
            $num = mysql_num_rows($res);
            
            $texto = str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $txt['texto']);
            $bloco = explode("<!-- -->", $texto);
          ?>
          <div class="wrap">
            <div class="painel clearfix">
              <div class="content experiencia visible">
                <h2 class="title"><?=$tit2[0]; ?></h2>
                <p class="text">
                  <?= $bloco[0]; ?>
                </p>
              </div>
              <div class="content profissionalismo">
                <h2 class="title"><?=$tit2[1]; ?></h2>
                <p class="text">
                  <?= $bloco[1]; ?>
                </p>
              </div>
              <div class="content variedade">
                <h2 class="title"><?=$tit2[2]; ?></h2>
                <p class="text">
                  <?= $bloco[2]; ?>
                </p>
              </div>
              <div class="content custo-beneficio">
                <h2 class="title"><?=$tit2[3]; ?></h2>
                <p class="text">
                  <?= $bloco[3]; ?>
                </p>
              </div>
              <div class="content atendimento">
                <h2 class="title"><?=$tit2[4]; ?></h2>
                <p class="text">
                  <?= $bloco[4]; ?>
                </p>
              </div>
              <div class="labels">
                <button class="label experiencia active"><?=$tit2[0]; ?></button>
                <button class="label profissionalismo"><?=$tit2[1]; ?></button>
                <button class="label variedade"><?=$tit2[2]; ?></button>
                <button class="label custo-beneficio"><?=$tit2[3]; ?></button>
                <button class="label atendimento"><?=$tit2[4]; ?></button>
              </div>
            </div>
          </div>
        </section>
        <section id="servicos" class="servicos">
          <div class="wrap">
            <?php
            $sql = "SELECT * FROM pagina WHERE id = 3;";
            $res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
              
            $txt = mysql_fetch_array($res);
            $num = mysql_num_rows($res);
            
            $texto = str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $txt['texto']);
            $bloco = explode("<!-- -->", $texto);

            if ($lang == 1)
              $tit2 = array("Buffet","Decoração","Espaço Pé na Areia","Open bar de caipirinha","Assessoria");
            else
              $tit2 = array("Buffet","Decoration","On the Beach Space","Caipirinha's Open Bar","Advice");
            ?>
            <h1><?=$tit[1]; ?></h1>
            <div class="box-content clearfix">
              <button class="btn buffet active"><span class="title"><?=$tit2[0]; ?></span></button>
              <div class="card buffet visible ">
                <div class="text">
                  <h2><?=$tit2[0]; ?></h2>
                  <p>
                  <!--Temos uma variedade de cardápios exclusivos como por exemplo; Coquetéis, Crepes, Mesas de frios, jantar, cardápio típico praiano e outros.</p>
                  <p>Já oferecemos dentro dos serviços de buffet;<br>
          * Doces Finos, bolo e bem casados.<br>
          * Material: todo o material necessário sem custo adicional. (mesas, cadeiras, toalhas,louças...)<br>
          * Equipe: Coordenador, cerimonialista, recepcionista, garçons, staff de cozinha, copa e montagem.-->
                    <?=$bloco[0]; ?>
                  </p>
                </div>
                <div class="image">
                  <img src="assets/img/buffet-bg.jpg">
                </div>
              </div>
              <button class="btn decoracao"><span class="title"><?=$tit2[1]; ?></span></button>
              <div class="card decoracao">
                <div class="text">
                  <h2><?=$tit2[1]; ?></h2>
                  <p>
                  <!--Produzimos todos os arranjos de flores da cerimônia e da festa com criatividade e bom gosto sempre priorizando o estilo e preferência dos noivos.</p>
                  <p>Podemos também confeccionar o buquê, coroa e colar de flores, que dão um toque de charme nas cerimônias à beira mar.-->
                    <?=$bloco[1]; ?>
                  </p>
                </div>
                <div class="image">
                  <img src="assets/img/decoracao-bg.jpg">
                </div>
              </div>
              <button class="btn areia"><span class="title"><?=$tit2[2]; ?></span></button>
              <div class="card areia">
                <div class="text">
                  <h2><?=$tit2[2]; ?></h2>
                  <p>
                  <!--Oferecemos dois espaços adequados a realização do casamento na praia. Com estrutura coberta, cozinha, banheiros, estacionamento...</p>
                  <p>Nos dois casos as praias são tranquilas, o que é muito importante para que a cerimônia aconteça sem interferências ou tumultos.-->
                    <?=$bloco[2]; ?>
                  </p>
                </div>
                <div class="image">
                  <img src="assets/img/areia-bg.jpg">
                </div>
              </div>
              <button class="btn openbar"><span class="title"><?=$tit2[3]; ?></span></button>
              <div class="card openbar">
                <div class="text">
                  <h2><?=$tit2[3]; ?></h2>
                  <p>
                  <!--Uma opção diferenciada para servir um drink.</p>
                  <p>Um bar bem decorado servindo caipirinhas de frutas. O convidado poderá criar seu próprio drink escolhendo os ingredientes (Bebidas: vodka, Rum, Saquê e Cachaça e Frutas variadas).-->
                    <?=$bloco[3]; ?>
                  </p>
                </div>
                <div class="image">
                  <img src="assets/img/caipira-bg.jpg">
                </div>
              </div>
              <button class="btn assessoria"><span class="title"><?=$tit2[4]; ?></span></button>
              <div class="card assessoria">
                <div class="text">
                  <h2><?=$tit2[4]; ?></h2>
                  <p>
                  <!--<b>Este serviço oferecemos como cortesia.</b></p>
                  <p>Desde o primeiro momento nossos noivos recebem um chek list com orientações sobre todas as decisões a respeito da organização do casamento ao qual faremos um acompanhamento com idéias , esclarecimentos e sugestões.</p>
                  <p>Faremos o serviço de RSVP (confirmação de presença) e o Cerimonial no dia do casamento (organização do cortejo e acompanhamento dos noivos durante toda a festa).-->
                    <?=$bloco[4]; ?>
                  </p>
                </div>
                <div class="image">
                  <img src="assets/img/assesoria-bg.jpg">
                </div>
              </div>
            </div>
            <div class="veja-mais clearfix">
              <p><span class="text">
                <?php
                if ($lang == 1) {
                  ?>
                  Estaremos sempre a disposição para orientar e esclarecer qualquer detalhe a respeito do evento.
                  <?php
                }
                else {
                  ?>
                  We will always be on hand to guide and clarify any details about the event.
                  <?php
                }
                ?>
              </span><!-- <span class="link">Veja mais: <a href="#">Locação de materiais</a></span> --></p>
            </div>
          </div>
        </section>
        <?php
        if (!isset($_SESSION['i'])) {
          ?>
          <section id="depoimentos" class="depoimentos">
            <div class="wrap clearfix">
              <h1 class="hidden">Depoimentos</h1>
              <div class="depo-menu" id="depo-menu">
                <span onclick="menudepo()"><i class="fa fa-caret-up"></i> Depoimentos</span>
              </div>
              <?php
                $sql = "SELECT * FROM pagina p WHERE tipo=2 ORDER BY data DESC LIMIT 3;";
                $res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
                  
                while ($dep = mysql_fetch_array($res)) {
                ?>
                  <div class="depo-box">
                    <?php
                    $sel = "SELECT * FROM foto f WHERE pagina=" . $dep['id'] . " LIMIT 1;";
                    $rst = mysql_query($sel,$con) or die ("Erro: " . $sel . "<br />" . mysql_error($con));
                    $qtf = mysql_num_rows($rst);
                    if ($qtf > 0) {
                      $fot = mysql_fetch_array($rst);
                      ?>
                      <img src="imagens/<?=$fot['arquivo']; ?>" alt="Foto de <?=$dep['titulo']; ?>">
                      <?php
                    }
                    else {
                      ?>
                      <img src="assets/img/no_photo.png" alt="Sem foto de <?=$dep['titulo']; ?>">
                      <?php
                    }
                    ?>
                    <p>
                    <?php
                      if (strlen($dep['texto']) < 400)
                        echo str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $dep['texto']); 
                      else {
                        echo substr(str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $dep['texto']),0,400) . "..."; 
                        echo "<a href=\"?pag=" . $dep['id'] . "\">Leia mais</a>";
                      }
                    ?>
                    </p>
                    <span class="autor"><?=$dep['titulo'] . ", " . substr($dep['data'],0,4); ?></span>
                  </div>
                <?php
                }
              ?>
            </div>
          </section>
          <?php
        }  
        if ($lang == 1)
          $rot = array("Insira seu nome","Insira seu e-mail","Telefone","Celular","Cidade","Tipo de evento","Data do evento","Número de pessoas","Observações","Onde conheceu a Papillon","Enviar");
        else
          $rot = array("Insert your name","Insert your e-mail","Telephone","Mobile","City","Event type","Date","Quantity people","Message","Where did you know Papillon","Send");          
        ?>
        <section id="orcamento" class="orcamento">
          <div class="wrap">
            <h1><?=$tit[3]; ?></h1>
            <form action="." method="post">
              <table>
                <tr>
                  <td colspan="3">
                    <input required type="text" name="nome" placeholder="<?=$rot[0]; ?>*">
                  </td>
                  <td colspan="3">
                    <input required type="email" name="email" placeholder="<?=$rot[1]; ?>*">
                  </td>
                </tr>
                <tr>
                  <td class="mobile-adaptacao">
                    <label for="telefone"><?=$rot[2]; ?>:*</label>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="telefone">
                  </td>
                  <td class="mobile-adaptacao">
                    <label for="celular"><?=$rot[3]; ?>:*</label>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="celular">
                  </td>
                  <td>
                    <input required type="text" name="cidade" placeholder="<?=$rot[4]; ?>*">
                  </td>
                </tr>
                <tr>
                  <td class="mobile-adaptacao">
                    <label for="tipoevento"><?=$rot[5]; ?>:*</label>
                  </td>
                  <td colspan="2" class="mobile-adaptacao">
                    <select required name="tipoevento">
                      <?php
                      if ($lang == 1)
                        $opt = array("Escolha o tipo","Aniversário","Bodas","Casamento na praia","Casamento tradicional","Formatura","Festa infantil","Confraternização","Observações","Locação de material");
                      else
                        $opt = array("Choose the type","Birthday","Marriage","Beach Wedding","Traditional Wedding","Graduation","Children Party","Fraternization","Message","Equipment rental");
                      
                      for ($i = 0; $i <= 9; $i++)
                        echo "<option value=\"" . $i . "\">" . $opt[$i] . "</option>";
                      ?>
                    </select>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="date" name="dataevento" placeholder="<?=$rot[6]; ?>*">
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="numeropessoas" placeholder="<?=$rot[7]; ?>*">
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <textarea name="observacoes" placeholder="<?=$rot[8]; ?>"></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <span><?=$rot[9]; ?>?</span>
                  </td>
                  <td colspan="2">
                    <select name="onde">
                      <?php
                      if ($lang == 1)
                        $opt = array("Escolha a opção","Revista","Site de Busca","Panfleto","Amigos","Outro");
                      else
                        $opt = array("Choose...","Magazine","Search engine","Flyer","Friends","Other");
                      
                      for ($i = 0; $i <= 6; $i++)
                        echo "<option value=\"" . $i . "\">" . $opt[$i] . "</option>";
                      ?>
                    </select>
                  </td>
                  <td>
                    <button type="submit" name="enviar" class="btn confirma"><?=$rot[10]; ?></button>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </section>
      <?php
      }
      else
        include ("pagina-interna.php");
       
      mysql_close($con);
      ?>
    </main>
    <footer class="footer">
      <section id="contato" class="contato">
        <div class="navbar top">
          <h1 class="hidden"><?=$tit[5]; ?></h1>
          <div class="wrap"><center>
            <span class="item">Rua Jordão Homem da Costa, 179 - Centro - Ubatuba, SP</span>
            <span class="item">(12) 3833-9011 / 7813-6456</span>
            <span class="item">
              <a href="http://www.facebook.com/profile.php?id=1746417399#!/profile.php?id=1746417399"><i class="fa fa-facebook-square"></i></a>
              <a href="http://twitter.com/#!/papillonbuffet"><i class="fa fa-twitter-square"></i></a>
              <a href="http://www.flickr.com/photos/31374899@N03/5110850805/"><i class="fa fa-flickr"></i></a>
              <a href="http://casamentonapraiapapillon.blogspot.com/"><img class="fa" src="assets/img/i-blog.png" alt="Ícone do blog da Papillon"></a>  
            </span>
            </center>
            
            <p align="center">
              <?php
              if ($lang == 1) {
                ?>
                Entre em contato ou solicite um orçamento online. <a href=".#orcamento">Clique aqui</a>!
                <?php
              }
              else {
                ?>
                Contact us or ask for an online budget. <a href=".#orcamento">Click here</a>!
                <?php
              }
              ?>
            </p>
          </div>
        </div>
        <div class="navbar bottom">
        <?php
        if ($lang == 1) {
          ?>
          <span class="item"><strong>Papillon Buffet e Eventos</strong> 2016 © Todos os direitos reservados</span>
          <span class="item">Desenvolvido por <a href="epicentro.net.br" target="_blank">Epicentro Tecnologia</a></span>
          <?php
        }
        else {
          ?>
          <span class="item"><strong>Papillon Buffet e Eventos</strong> 2016 © All rights reserved</span>
          <span class="item">Powered by <a href="epicentro.net.br" target="_blank">Epicentro Tecnologia</a></span>
          <?php
        }
        ?>
        </div>
      </section>
    </footer>
  </body>
</html>
