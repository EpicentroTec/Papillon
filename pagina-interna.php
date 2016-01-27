      <?php
        $sql = "SELECT * FROM pagina WHERE id = " . $_GET['pag'] . ";";
//        echo $sql;
        $res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
          
        $num = mysql_num_rows($res);
        
        if ($num > 0) {
          $txt = mysql_fetch_array($res);
          $texto = str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $txt['texto']);
          
          $sel = "SELECT * FROM foto f WHERE pagina=" . $txt['id'] . ";";
          $rst = mysql_query($sel,$con) or die ("Erro: " . $sel . "<br />" . mysql_error($con));
          $qtf = mysql_num_rows($rst);
          
          $i = 0;
          if ($qtf > 0)
            while ($fot = mysql_fetch_array($rst))
              $foto[$i++] = $fot['arquivo'];
        }
        else 
          $texto = "<strong>Erro 404 </strong>Página não encontrada."
      ?>
      <script>
        rolar();
      </script>
      <section id="page" class="page">
        <article class="wrap">
          <h1><?=$txt['titulo']; ?></h1>
          <p><?=$texto; ?></p>
          <?php
          if ($qtf > 0) {
            ?>
            <div id="foto_gde" class="foto_gde">
              <img src="http://www.papilloneventos.com.br/sitenovo/imagens/<?=$foto[0]; ?>" alt="Imagem principal">
            </div>
            <?php
          }
          ?>
          <!--h2>Subtitulo</h2>
          <div class="videos clearfix">
            <div class="video">
              <a href="#">
                <img src="assets/img/video01.jpg" alt="Imagem do vídeo">
                <span class="titulo">Casamento na Praia Papillon Eventos</span>
              </a>
            </div>
            <div class="video">
              <a href="#">
                <img src="assets/img/video02.jpg" alt="Imagem do vídeo">
                <span class="titulo">Casamento na Praia - Papillon Buffet e Eventos - Ubatuba - SP</span>
              </a>
            </div>
            <div class="video">
              <a href="#">
                <img src="assets/img/video03.jpg" alt="Imagem do vídeo">
                <span class="titulo">Casamento na Praia - Papillon Eventos - Ubatuba</span>
              </a>
            </div>
          </div-->
          <?php
          if ($qtf > 0) {
            ?>
            <div class="galerias clearfix">
              <h2>Galeria de imagens</h2>
              <?php
              for ($i = 0; $i < $qtf; $i++) {
                ?>
                <div class="galeria">
                  <img src="http://www.papilloneventos.com.br/sitenovo/imagens/i-<?=$foto[$i]; ?>" onclick="foto('<?=$foto[$i]; ?>')" alt="Foto <?=$i; ?>">
                  <!--span class="titulo">Foto <?=$qtf; ?></span-->
                </div>
                <?php
              }
              ?>
              </div>
              <?php
            }
            ?>
            <!--div class="galeria">
              <a href="#"><img src="assets/img/galeria04.jpg" alt="Imagem">
              <span class="titulo">Casamento Tradicional</span></a>
            </div>
            <div class="galeria">
              <a href="#"><img src="assets/img/galeria03.jpg" alt="Imagem">
              <span class="titulo">Decoração de Aniversário</span></a>
            </div>
            <div class="galeria">
              <a href="#"><img src="assets/img/galeria04.jpg" alt="Imagem">
              <span class="titulo">Catering</span></a>
            </div-->
          </div>
        </article>
      </section>