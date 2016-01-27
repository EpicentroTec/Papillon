<!DOCTYPE html>
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
    </script>
  </head>
  <body class="resolucao">
    <header id="header" class="header">
      <h1 class="hidden">Papillon Buffet e Eventos</h1>
      <div class="slider slideshow" data-cycle-center-horz="true" data-cycle-center-vert="true">
        <div class="cycle-pager"></div>
        <?php
					$dir = "abert";// . $qual;//array("vela2", "garcon", "mesas", "vela1", "bolo1", "fotohome", "bolo2", "alianca");
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
						//$i++;
					}
				?>
        <!--img class="slide active" src="assets/img/01x1900.png">
        <img class="slide" src="assets/img/02.png">
        <img class="slide" src="assets/img/03.jpg">
        <img class="slide" src="assets/img/04.png"-->
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
            <a href="."><img src="assets/img/logo.png" alt="Logo"></a>
          </div>
          <ul>
          
          <?php 
          if (!isset($_SESSION['i'])) {
            ?>
            <li class="menu-icon"><i class="fa fa-bars"></i></li>
            <li class="menu-item"><a href=".#quemsomos">Quem Somos</a></li>
            <li class="menu-item"><a href=".#servicos">Serviços</a></li>
            <li class="menu-item"><a href=".#casamento">Casamento na Praia</a></li>
            <li class="menu-item"><a href=".#orcamento">Orçamento</a></li>
            <li class="menu-item"><a href=".#depoimentos">Depoimentos</a></li>
            <li class="menu-item"><a href=".#midia">Mídia</a></li>
            <li class="menu-item"><a href=".#contato">Contato</a></li>
            <?php
          }
          else {
            ?>
            <li class="menu-icon"><i class="fa fa-bars"></i></li>
            <li class="menu-item"><a href=".#quemsomos">Who we are</a></li>
            <li class="menu-item"><a href=".#servicos">Services</a></li>
            <li class="menu-item"><a href=".#casamento">Beach Wedding</a></li>
            <li class="menu-item"><a href=".#orcamento">Online Budget</a></li>
            <li class="menu-item"><a href=".#midia">Multimedia</a></li>
            <li class="menu-item"><a href=".#contato">Contact us</a></li>
            <?php
          }
          ?>
            <!-- <li class="menu-item destaque"><a href="#">Locação de equipamento</a></li> -->
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <?php
      if ($lang == 1) {
      ?>
      <section id="locacao" class="locacao">
        <div class="wrap">
          <h1 class="hidden">Locação de materiais</h1>
          <p>Veja também: 
          <a href="?pag=124">Locação de materiais</a> | 
          <a href="?pag=noivos">Página dos noivos</a></p>
          
        </div>
      </section>
      <?php
      }
      ?>
      
      <section id="conteudo"></section>
      <?php
      if ($lang == 1) {
        $tit = array("Quem somos","Profissionalismo","Variedade","Custo-Benefício","Atendimento");
        include ("conexao.php");
      }
      else {
        $tit = array("Who we are","Professionalism","Variety","Cost-effectiveness","Customer service");
        include ("conexao2.php");
      }
      
      
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
                <h2 class="title"><?=$tit[0]; ?></h2>
                <p class="text">
                <!--Trabalhamos h&aacute; mais de dez anos com casamentos na praia, adquirindo neste per&iacute;odo experi&ecirc;ncia para prestar todos os servi&aacute;os com profissionalismo, oferecendo aos noivos seguran&ccedil;a em todo o planejamento do casamento. Temos servi&ccedil;o pr&oacute;prio de buffet, decora&ccedil;&atilde;o, bar de caipirinhas e espa&ccedil;os p&eacute; na areia. Para todos os outros como DJ, fotografia, filmagem, convites, temos parceria com profissionais da &aacute;rea. Desta forma, oferecemos praticidade aos noivos j&aacute; que, em sua maioria, s&atilde;o de fora da cidade.-->
                  <?= $bloco[0]; ?>
                </p>
              </div>
              <div class="content profissionalismo">
                <h2 class="title"><?=$tit[1]; ?></h2>
                <p class="text">
                <!--O Papillon Eventos trabalha com profissionalismo, dedica&ccedil;&atilde;o, al&eacute;m de ter muito prazer em poder realizar seus sonhos, projetos e ideias. Eventos sociais, cerim&ocirc;nias, festas, onde o calor do encontro familiar e afetivo se juntam. Trabalhamos junto a emo&ccedil;&otilde;es, que geram uma energia especial, energia esta que nos d&aacute; inspira&ccedil;&atilde;o para realizar cada vez melhor nosso trabalho.-->
                  <?= $bloco[1]; ?>
                </p>
              </div>
              <div class="content variedade">
                <h2 class="title"><?=$tit[2]; ?></h2>
                <p class="text">
                <!--Al&eacute;m dos servi&ccedil; do segmento de festas, promovemos tamb&eacute;m eventos institucionais, servi&ccedil;os prestados &agrave;s empresas. Em todos os tipos de eventos, somos objetivos e pr&aacute;ticos, oferecendo ideias e solu&ccedil;&otilde;es para as mais variadas necessidades. Com card&aacute;pios diversificados e criativos nas op&ccedil;&otilde;es de <em>coffee break</em>, caf&eacute; da manh&atilde;, <em>happy hour</em>, <em>catering </em>ou qualquer outro tipo de recep&ccedil;&atilde;o.-->
                  <?= $bloco[2]; ?>
                </p>
              </div>
              <div class="content custo-beneficio">
                <h2 class="title"><?=$tit[3]; ?></h2>
                <p class="text">
                <!--Como oferecemos todos os servi&ccedil;os num pacote &uacute;nico e prestamos uma assessoria completa sem custo adicional o custo-benef&iacute;cio se torna muito vi&aacute;vel. Parcerias e indica&ccedil;&otilde;es de profissionais para os mais diversos servi&ccedil;os e produtos facilitam ainda mais a vida de nossos clientes, familiares e seus convidados.-->
                  <?= $bloco[3]; ?>
                </p>
              </div>
              <div class="content atendimento">
                <h2 class="title"><?=$tit[4]; ?></h2>
                <p class="text">
                <!--Pe&ccedil;a um or&ccedil;amento e caso queira nos conhecer pessoalmente podemos agendar uma visita. <br><strong>ATENDEMOS TAMB&Eacute;M AOS DOMINGOS COM HORA MARCADA.</strong>-->
                  <?= $bloco[4]; ?>
                </p>
              </div>
              <div class="labels">
                <button class="label experiencia active"><?=$tit[0]; ?></button>
                <button class="label profissionalismo"><?=$tit[1]; ?></button>
                <button class="label variedade"><?=$tit[2]; ?></button>
                <button class="label custo-beneficio"><?=$tit[3]; ?></button>
                <button class="label atendimento"><?=$tit[4]; ?></button>
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

            ?>
            <h1>Serviços</h1>
            <div class="box-content clearfix">
              <button class="btn buffet active"><span class="title">Buffet</span></button>
              <div class="card buffet visible ">
                <div class="text">
                  <h2>Buffet</h2>
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
              <button class="btn decoracao"><span class="title">Decoração</span></button>
              <div class="card decoracao">
                <div class="text">
                  <h2>Decoração</h2>
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
              <button class="btn areia"><span class="title">Espaço Pé na Areia</span></button>
              <div class="card areia">
                <div class="text">
                  <h2>Espaço Pé na Areia</h2>
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
              <button class="btn openbar"><span class="title">Open bar de caipirinha</span></button>
              <div class="card openbar">
                <div class="text">
                  <h2>Open bar de caipirinha</h2>
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
              <button class="btn assessoria"><span class="title">Assessoria</span></button>
              <div class="card assessoria">
                <div class="text">
                  <h2>Assessoria</h2>
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
              <p><span class="text">Estaremos sempre a disposição para orientar e esclarecer qualquer detalhe a respeito do evento.</span><!-- <span class="link">Veja mais: <a href="#">Locação de materiais</a></span> --></p>
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
        ?>
        <section id="orcamento" class="orcamento">
          <div class="wrap">
            <h1>Orçamento Online</h1>
            <form action="." method="post">
              <table>
                <tr>
                  <td colspan="3">
                    <input required type="text" name="nome" placeholder="Insira seu nome*">
                  </td>
                  <td colspan="3">
                    <input required type="email" name="email" placeholder="Insira seu email*">
                  </td>
                </tr>
                <tr>
                  <td class="mobile-adaptacao">
                    <label for="telefone">Telefone:*</label>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="telefone">
                  </td>
                  <td class="mobile-adaptacao">
                    <label for="celular">Celular:*</label>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="celular">
                  </td>
                  <td>
                    <input required type="text" name="cidade" placeholder="Cidade*">
                  </td>
                </tr>
                <tr>
                  <td class="mobile-adaptacao">
                    <label for="tipoevento">Tipo de Evento:*</label>
                  </td>
                  <td colspan="2" class="mobile-adaptacao">
                    <select required name="tipoevento">
                      <option value="0">Escolha o tipo</option>
                      <option value="1">Aniversário</option>
                      <option value="2">Bodas</option>
                      <option value="3">Casamento na praia</option>
                      <option value="4">Casamento tradicional</option>
                      <option value="5">Formatura</option>
                      <option value="6">Festa infantil</option>
                      <option value="7">Confraternização</option>
                      <option value="8">Locação de material</option>
                    </select>
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="date" name="dataevento" placeholder="Data do evento*">
                  </td>
                  <td class="mobile-adaptacao">
                    <input required type="text" name="numeropessoas" placeholder="Número de pessoas*">
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <textarea name="observacoes" placeholder="Observações"></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <span>Onde Conheceu a Papillon Eventos?</span>
                  </td>
                  <td colspan="2">
                    <select name="onde">
                      <option value="">Escolha a opção</option>
                      <option value="Revista">Revista</option>
                      <option value="Site de busca">Site de busca</option>
                      <option value="Panfleto">Panfleto</option>
                      <option value="Amigos">Amigos</option>
                      <option value="Parentes">Parentes</option>
                      <option value="Outra">Outra</option>
                    </select>
                  </td>
                  <td>
                    <button type="submit" name="enviar" class="btn confirma">Enviar</button>
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
          <h1 class="hidden">Contatos</h1>
          <div class="wrap">
            <span class="item"><strong>Endereço</strong>: Rua Jordão H. da Costa, 179 Centro - Ubatuba, SP</span>
            <span class="item"><strong>Telefones</strong>: (12) 3833-9011 / 7813-6456</span>
            <span class="item">
              <strong>Redes sociais:</strong>
              <a href="http://www.facebook.com/profile.php?id=1746417399#!/profile.php?id=1746417399"><i class="fa fa-facebook-square"></i></a>
              <a href="http://twitter.com/#!/papillonbuffet"><i class="fa fa-twitter-square"></i></a>
              <a href="http://www.flickr.com/photos/31374899@N03/5110850805/"><i class="fa fa-flickr"></i></a>
              <a href="http://casamentonapraiapapillon.blogspot.com/"><img class="fa" src="assets/img/i-blog.png" alt="Ícone do blog da Papillon"></a>
              
            </span>
            <p align="center">
            Entre em contato ou solicite um orçamento online. <a href=".#orcamento">Clique aqui</a>!
            </p>
          </div>
        </div>
        <div class="navbar bottom">
          <span class="item"><strong>Papillon Buffet e Eventos</strong> 2015 © Todos os direitos reservados</span>
          <span class="item">Desenvolvido por <a href="epicentro.net.br" target="_blank">Epicentro Tecnologia</a></span>
        </div>
      </section>
    </footer>
  </body>
</html>
