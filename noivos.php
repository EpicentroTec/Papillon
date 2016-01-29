<?php
session_start();

include ("funcoes.php");
$con = connect();
		
$acao = anti_injection($_GET['acao']);

//echo "<script>alert('" . $_POST['us'] . " - " . $_POST['pw'] . "');</script>";

if ($_POST['us'] != "" && $_POST['pw'] != "") {
	$usu = anti_injection($_POST['us']);
	$sen = anti_injection($_POST['pw']);
  
  $sql = "SELECT * FROM convite WHERE usuario = \"" . $usu . "\" AND senhamd5 = md5('" . $sen . "')";
  $res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
  $num = mysql_num_rows($res);
  $eve = mysql_fetch_array($res);
  
  if ((!isset($_SESSION['usu']) && !isset($_SESSION['sen'])) || ($_SESSION['usu'] == "" && $_SESSION['sen'] == "")) {
    $_SESSION['usu'] = $usu;
    $_SESSION['sen'] = $sen;
    if (!isset($_SESSION['pag']))
      $_SESSION['pag'] = $eve['id'];
  }
}
else if ($num <> 1) {
  unset($_POST);
  session_destroy();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Papillon Buffet e Eventos - Página dos Noivos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Epicentro Inform&aacute;tica">
    <meta name="description" content="Papillon Buffet e Eventos - Casamento na praia, formaturas, eventos em geral - Ubatuba, SP">
    <meta name="robots" content="noindex">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="imagens/favicon.ico" >
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.center.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body class="resolucao">
    <?php
    if (!isset($_POST['us']) && !isset($_POST['pw'])) {
      ?>
      <section id="confirmacao" class="confirmacao">
        <div class="wrap">
          <h1>Autenticação</h1>
          <?php
          echo "<form method=\"post\" action=\"noivos.php\"><br />&nbsp;";
          echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
          echo "<tr><td align=\"right\" valign=\"top\">Nome de Usuário: <br /></span></td><td width=\"10\">&nbsp;</td><td><input type=\"text\" name=\"us\" size=\"40\" /></td></tr>";
          echo "<tr><td align=\"right\" valign=\"top\">Senha:</span></td><td width=\"10\">&nbsp;</td><td><input type=\"password\" name=\"pw\" size=\"40\" /></td></tr>";
          echo "</table>";
          echo "<center><input type=\"submit\" value=\"Confirmar\" /></center></form>";
          ?>
          <a href=".">Voltar</a>
        </div>
      </section>
      <?php
    }
    else {
      ?>
      <header id="header" class="header">
        <h1 class="hidden">Página dos Noivos - <?=$eve['noivos']; ?></h1>
        <div class="slider">
          <div class="slider slideshow" data-cycle-center-horz="true" data-cycle-center-vert="true">
            <img src="imagens/papillon_eventos_2.jpg" class="slide active">
            <img src="imagens/papillon_eventos_4.jpg" class="slide">
            <img src="imagens/papillon_eventos_6.jpg" class="slide">
          </div>
        </div>
        <nav class="menu">
          <h1 class="hidden">Menu</h1>
          <div class="wrap">
            <div class="logo">
              <a href="#header"><img src="assets/img/logo.png" alt="Logo"></a>
            </div>
            <ul>
              <?php 
                $tit  = array("História dos Noivos","Local e Horário","Trajes e Dicas","Lista de Presentes","Comércio e Serviços");
              ?>
              <li class="menu-icon"><i class="fa fa-bars"></i></li>
              <li class="menu-item"><a href="#historia"><?=$tit[0]; ?></a></li>
              <li class="menu-item"><a href="#locais"><?=$tit[1]; ?></a></li>
              <li class="menu-item"><a href="#trajes"><?=$tit[2]; ?></a></li>
              <li class="menu-item"><a href="#lista"><?=$tit[3]; ?></a></li>
              <li class="menu-item"><a href="#comercio"><?=$tit[4]; ?></a></li>
            </ul>
          </div>
        </nav>
      </header>
      <main>
        <section id="locacao" class="locacao">
          <div class="wrap">
            <h1 class="hidden">Confirmação de presença</h1>
            <a href="#confirmacao">Confirmação de presença</a> | 
            <a href=".">Sair</a>
          </div>
        </section>
        
        <section id="conteudo"></section>
          <section id="historia" class="historia clearfix"><!--quemsomos-->
            <h1>História dos Noivos</h1>
            <div class="slider">
              <div class="slider slideshow" data-cycle-center-horz="true" data-cycle-center-vert="true">
                <?php
                $sql = "SELECT * FROM galeria WHERE pagina = " . $_SESSION['pag'] . " ORDER BY ordem, id";
                $res = mysql_query($sql, $con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
        
                $i = 0;
                while ($sld = mysql_fetch_array($res))
                  $fotos[$i++] = $sld['arquivo'];
                
                $dir = "http://www.papilloneventos.com.br/sitenovo/imagens/galeria/";
                for ($i = 0; $i < count($fotos); $i++) {
                  echo "<img src=\"" . $dir . "/" . $fotos[$i] . "\"";
                  echo $i == 0? " class=\"slide active\"" : "class=\"slide\"";
                  echo ">";
                }
              ?>  
              </div>
            </div>
            
            <div class="content">
              <?php
              echo "<br><br><br>" . $eve['historia']; 
              ?>
            </div>
          </section>
          
          <section id="locais" class="locais"><!--servicos-->
            <div class="wrap">
              <div class="box-content clearfix">
              <h1>Local e Horário</h1>
                <div class="card buffet visible ">
                  <div class="text">
                    <h2>Horário</h2>
                    <?php
                      $data = substr($eve['data'],8,2) . "/" . substr($eve['data'],5,2) . "/" . substr($eve['data'],0,4) . ", &agrave;s " . substr($eve['data'],11,5);
                      //echo "<p><b>Evento: </b>" . $eve['evento'] . "</p>";
                      echo "<p><b>Data: </b>" . $data . "</p>";
                      ?>
                      <h2>Local</h2>
                      <?php
                      if ($eve['local'] != "" && $eve['localfesta'] != "") {
                        echo "<p><b>Local da cerim&ocirc;nia: </b>" . $eve['local'] . "</p>";
                        echo "<p><b>Endere&ccedil;o da cerim&ocirc;nia: </b>" . $eve['endlocal'] . " - " . $eve['cidade'] . "</p><hr />";
                      }
                      if ($eve['localfesta'] != "") {
                        echo "<p><b>Local da festa: </b>" . $eve['localfesta'] . "</p>";
                        echo "<p><b>Endere&ccedil;o da festa: </b>" . $eve['endfesta'] . " - " . $eve['cidade'] . "</p>";
                      }
                      else {
                        echo "<p><b>Local da cerim&ocirc;nia e festa: </b>" . $eve['local'] . "</p>";
                        echo "<p><b>Endere&ccedil;o da cerim&ocirc;nia e festa: </b>" . $eve['endlocal'] . " - " . $eve['cidade'] . "</p>";
                      }
                    ?>
                  
                    <h2>Como chegar</h2>
                      <?php
                      if ($eve['mapa'] != "")
                        echo "<p><b>Como chegar a Ubatuba: </b><br />" . $eve['mapa'] . "</p>";
                      if ($eve['mapa2'] != "")
                        echo "<p><b>Como chegar ao local da cerim&ocirc;nia: </b><br />" . $eve['mapa2'] . "</p>";
                      if ($eve['mapa3'] != "")
                        echo "<p><b>Como chegar ao local da festa: </b><br />" . $eve['mapa3'] . "</p>";
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <section id="trajes" class="trajes">
            <div class="wrap clearfix">
              <h1>Trajes e Dicas</h1>
              <?php
              $traje = explode("<!---->",$eve['traje']);

              echo $traje[0];
              $sel = "SELECT * FROM foto_traje WHERE pagina = " . $eve['id'] . " AND sexo = 1";
              $res = mysql_query($sel) or die("Erro 155: " . mysql_error($con));
              $num = mysql_num_rows($res);
              if ($num > 0) {
                echo "<center>";
                while ($ftt = mysql_fetch_array($res))
                  echo "<img src=\"imagens/" . $ftt['arquivo'] . "\">";
                echo "</center>";
              }
              
              echo $traje[1];
              $sel = "SELECT * FROM foto_traje WHERE pagina = " . $eve['id'] . " AND sexo = 2";
              $res = mysql_query($sel) or die("Erro 162: " . mysql_error($con));
              $num = mysql_num_rows($res);
              if ($num > 0) {
                echo "<center>";
                while ($ftt = mysql_fetch_array($res))
                  echo "<img src=\"imagens/" . $ftt['arquivo'] . "\">";
                echo "</center>";
              }
                
              echo $traje[2];
              ?>
            </div>
          </section>
          
          <section id="comercio" class="comercio">
            <div class="wrap">
              <div class="text">
                <h1>Comércio e Serviços</h1>
                <?php
                if ($eve['hotel'] != "") {
                  echo "<h2>Hospedagem</h2><p>";
                  echo "<span class=\"class1b\">" . $eve['hotel'] . "</span>";
                }
                if ($eve['restaur'] != "") {
                  echo "<h2>Alimenta&ccedil;&atilde;o</h2><p>";
                  echo "<span class=\"class1b\">" . $eve['restaur'] . "</span>";
                }
                if ($eve['salao'] != "") {
                  echo "<h2>Sal&otilde;es de Beleza</h2><p>";
                  echo "<span class=\"class1b\">" . $eve['salao'] . "</span>";
                }
                ?>
              </div>
            </div>
          </section>
          
          <?php
          $rot = array("Insira seu nome","Insira seu e-mail","Telefone","Celular","Cidade","Tipo de evento","Data do evento","Número de pessoas","Observações","Onde conheceu a Papillon","Enviar");
          ?>
          <section id="confirmacao" class="confirmacao">
            <div class="wrap">
              <h1>Confirmação de Presença</h1>
              <?php
              if (!isset($_GET['acao'])) {
                $hoje = date("Ymd");
                $limt = substr($eve['limite'],0,4) . substr($eve['limite'],5,2) . substr($eve['limite'],8,2);
          //			echo "Limite: " . $limt . " - " . $hoje;
              
                if ($eve['limite'] != "0000-00-00 00:00:00" && $hoje > $limt) {
                  echo "<p><font color=\"red\"><b>Aten&ccedil;&atilde;o:</b></font><br />Data limite para confirma&ccedil;&atilde;o: " . substr($eve['limite'],8,2) . "/" . substr($eve['limite'],5,2) . "/" . substr($eve['limite'],0,4) . "</p>";
                  echo "<p>Em caso de dúvida, entre em contato com a <b>Papillon Eventos</b>: (12) 3833-9011 / 7813-6826</p>";
                }
                else {
                  echo "<form method=\"post\" action=\"convite.php?acao=confconv\"><br />&nbsp;";
                  echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
                  echo "<tr><td align=\"right\" valign=\"top\">Nome completo: <br /></span></td><td width=\"10\">&nbsp;</td><td><input type=\"text\" name=\"nomeconv\" size=\"40\" /></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Nome (como no convite):</span></td><td width=\"10\">&nbsp;</td><td><input type=\"text\" name=\"nome\" size=\"40\" /></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Telefone:</span></td><td width=\"10\">&nbsp;</td><td><input type=\"text\" name=\"telefone\" size=\"10\" /></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">E-mail:  </span></td><td width=\"10\">&nbsp;</td><td><input type=\"text\" name=\"email\" size=\"40\" /></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Acompanhantes (adultos):*  </span></td><td width=\"10\">&nbsp;</td><td><select name=\"acompanha\">";
                  for ($i = 0; $i < 6; $i++)
                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                  echo "</select></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Nomes dos acompanhantes:  </span></td><td width=\"10\">&nbsp;</td><td><textarea name=\"nomesadu\" cols=\"40\" rows=\"5\"></textarea></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Crian&ccedil;as (< 8 anos):*  </span></td><td width=\"10\">&nbsp;</td><td><select name=\"criancas\">";
                  for ($i = 0; $i < 6; $i++)
                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                  echo "</select></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Nome/Idade das crian&ccedil;as: </span></td><td width=\"10\">&nbsp;</td><td><textarea name=\"nomescri\" cols=\"40\" rows=\"5\"></textarea></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">";
                  echo "<br />Mensagem aos noivos:  </span></td><td width=\"10\">&nbsp;</td><td><b>Aten&ccedil;&atilde;o: </b>Esta mensagem ser&aacute; apresentada na p&aacute;gina \"Mensagens dos convidados\"<br /><textarea name=\"mensagem\" cols=\"40\" rows=\"5\"></textarea></td></tr>";
                  echo "<tr><td align=\"right\" valign=\"top\">Observa&ccedil;&otilde;es: </span></td><td width=\"10\">&nbsp;</td><td><textarea name=\"observ\" cols=\"40\" rows=\"5\"></textarea></td></tr></table>";
                  echo "<input type=\"hidden\" value=\"" . $eve['id'] . "\" name=\"convite\" />";
                  echo "<center><input type=\"submit\" value=\"Confirmar\" /></center>";
                  echo "</form>";
                }
              }
            
              else if ($_GET['acao'] == "confconv") {
                echo "<h1>Confirma&ccedil;&atilde;o de Presen&ccedil;a</h1>";
                
                $convite  = anti_injection($_POST['convite']);
                $nome     = anti_injection($_POST['nome']);
                $nomeconv = anti_injection($_POST['nomeconv']);
                $acompan  = (int)$_POST['acompanha'];
                $nomesad  = anti_injection($_POST['nomesadu']);
                $crianca  = (int)$_POST['criancas'];
                $nomescr  = anti_injection($_POST['nomescri']);
                $mensagem = anti_injection($_POST['mensagem']);
                $telefone = anti_injection($_POST['telefone']);
                $email    = anti_injection($_POST['email']);
                $observ   = anti_injection($_POST['observ']);
                
                $sel = "SELECT noivos FROM convite WHERE id = " . $convite;
                $res = mysql_query($sel, $con) or die (mysql_error($con));
                $noi = mysql_fetch_array($res);

                $sql = "INSERT INTO confirma (convite, nome, nomeconv, acompanhantes, nomes_acomp, criancas, nomes_crian, mensagem, telefone, email, observ) VALUES (" . $convite . ", \"" . $nome . "\", \"" . $nomeconv . "\", " . $acompan . ", \"" . $nomesad . "\", " . $crianca . ", \"" . $nomescr . "\", \"" . $mensagem . "\", \"" . $telefone . "\", \"" . $email . "\", \"" . $observ . "\")";
                $ok  = mysql_query($sql, $con) or die (confirm("N&atilde;o foi poss&iacute;vel confirmar sua presen&ccedil;a. Por favor, tente novamente.",1,1) . mysql_error($con));
                
                if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST]))
                      $emailsender = 'papillon@papilloneventos.com.br';
                else
                      $emailsender = "buffet@" . $_SERVER[HTTP_HOST];
           
                if (PATH_SEPARATOR == ";") 
                  $quebra_linha = "\r\n";
                else 
                  $quebra_linha = "\n";

                $destino = "contato";
                
                $corpo    = "Nome: " . $nome . "<br />" . "Nome do convite: " . $nomeconv . "<br />" . "Telefone: " . $telefone . "<br />" . "e-Mail: " . $email . "<br />" . "Acompanhantes: " . $acompan . "<br />" . "Nomes dos acompanhantes: " . $nomesad . "<br />" . "Crian&ccedil;as: " . $crianca . "<br />" . "Nomes das crian&ccedil;as: " . $nomescr . "<br />" . "Mensagem: " . $mensagem . "<br />";
                $assunto  = "Confirmação de Presença: " . $noi[0];
                  
                $headers  = "MIME-Version: 1.1" .$quebra_linha;
                $headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
                $headers .= "From: " . $emailsender . $quebra_linha;
                $headers .= "Reply-To: " . $email . $quebra_linha;
           
                if (!mail($destino . "@papilloneventos.com.br", $assunto, $corpo, $headers ,"-r".$emailsender)) {
                  $headers .= "Return-Path: " . $emailsender . $quebra_linha;
                  $ok2 = mail($destino . "@papilloneventos.com.br", $assunto, $corpo, $headers);
                }
                else
                  $ok2 = 1;
                
                if ($ok2)
                  confirm("Sua confirma&ccedil;&atilde;o de presen&ccedil;a foi enviada. Agradecidos! <br /><i>" . $noi[0] . "</i>",1,1);
                else
                  confirm("Houve um erro no envio da confirma&ccedil;&atilde;o de presen&ccedil;a. Tente novamente, por favor.<br />Caso o problema persista, envie um e-mail para <a href=\"mailto:" . $destino . "@papilloneventos.com.br>" . $destino . "@papilloneventos.com.br</a>",1,1);
              }
              ?>
            </div>
          </section>
        <?php
        mysql_close($con);
        ?>
      </main>
    <footer class="footer">
        <section id="lista" class="lista">
          <div class="navbar top">
            <h1>Listas de Presentes</h1>
            <div class="wrap"><center>
              <span class="item">
                <?php
                if ($eve['quota'] != "")
                  echo $eve['quota'];
          
                if ($eve['quota'] != "" && $eve['imglista'] != "")
                  echo "<hr />";
                
                if ($eve['imglista'] != "")
                  echo "<center><img src=\"imagens/" . $eve['imglista'] . "\" /></center>";
                ?>
              </span>
            </div>
          </div>
          <div class="navbar bottom">
            <span class="item"><strong>Papillon Buffet e Eventos</strong> 2016 © Todos os direitos reservados</span>
            <span class="item">Desenvolvido por <a href="epicentro.net.br" target="_blank">Epicentro Tecnologia</a></span>
          </div>
        </section>
      </footer>
      <?php
      }
    ?>
  </body>
</html>
