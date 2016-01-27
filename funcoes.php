<?php
function connect() {
	include ("conexao.php");
	return $con;
}
function content($pag,$acao,$con) {
	if ($acao == "" || $acao == "voltar") {
		if (isset($_GET['info']))
			$info = anti_injection($_GET['info']);
		else
			$info = 1;
		
		if ($pag == 1 || $pag == 3) {
			$sql = "SELECT * FROM pagina WHERE id = " . $pag;
			$res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
				
			$txt = mysql_fetch_array($res);
			$num = mysql_num_rows($res);
				
			echo "<br /><span class=\"corpo\">" . str_replace("<p>&nbsp;</p><p>&nbsp;</p>", "", $txt['texto']) . "</span>";			
			
			$ini = isset($_GET['ini'])? $_GET['ini'] : 0;
			
			echo $pag == 3? "<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;": "";
			
			icons($pag,$ini,$pag);
		}
		
		else if ($pag == 2) {
			$sql = "SELECT * FROM pagina WHERE id = 7";
			$rrr = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
			$tit = mysql_fetch_array($rrr);
			
			echo "<br /><span class=\"corpo\">" . $tit['texto'] . "</span>";
			
			$ini = isset($_GET['ini'])? $_GET['ini'] : 0;
			icons(7,$ini,$pag);
		}
		
		else if ($pag == 4) {
			$tit = $info == 1? "Or&ccedil;amento Online" : "Envie-nos um Depoimento";
			moreinfo($info, $tit);
		}
		
		else if ($pag == 5) {
			echo "<div id=\"Icones\">";
			
			$sql0 = "SELECT * FROM pagina WHERE tipo > 5";
			$res0 = mysql_query($sql0,$con) or die ("Erro: " . $sql0 . "<br />" . mysql_error($con));
			$num0 = mysql_num_rows($res0);
			
			echo "<br /><h3><b>Galerias de imagens</b></h3><br />";
			
			echo "<p><a href=\"?pag=2&tipo=1&ok=" . $tipo . "\">Casamento na praia</a></p>";
			for ($i = 0; $i <= $num0; $i++) {
				$tip0 = $i != 0? mysql_fetch_array($res0) : 0;
				$tipo = $i == 0? 4 : $tip0['id'];
				
				echo "<p><a href=\"?pag=" . $tip0['id'] . "\">" . $tip0['titulo'] . "</a></p>";
			}
			echo "</div>";
			
			$sql = "SELECT * FROM videos ORDER BY ordem,id ASC";
			$rrr = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
			$num = mysql_num_rows($rrr);
			
			if ($num > 0) {
				//echo "<div id=\"Videos\">";
				echo "<h4>Galeria de V&iacute;deos</h4>";
				echo "<table cellpadding=\"0\" width=\"100%\" cellspacing=\"10\" border=\"0\">";
				
				while ($tit = mysql_fetch_array($rrr)) {
					echo "<tr><td width=\"100\">";
					
					echo "<a href=\"https://www.youtube.com/watch?v=" . $tit['chave'] . "\" target=\"_blank\">";
					echo "<img alt=\"Miniatura\" src=\"//i1.ytimg.com/vi/" . $tit['chave'] . "/mqdefault.jpg\" data-thumb=\"//i1.ytimg.com/vi/" . $tit['chave'] . "/mqdefault.jpg\" width=\"185\" data-group-key=\"thumb-group-0\" align=\"left\"></a></td>";
					echo "<td valign=\"top\"><a href=\"https://www.youtube.com/watch?v=" . $tit['chave'] . "\" target=\"_blank\">" . $tit['titulo'] . "</a></td></tr><tr><td colspan=\"2\"><hr /></td></tr>";
					
//					echo "</td><td valign=\"top\" width=\"80\"><span class=\"class2\"><b>" . $tit['legenda'] . "</b></span></td></tr>";
					
//					echo "<tr><td colspan=\"2\"><hr /></td></tr>";
				}
				echo "</table>";
				//echo "</div>";
				
				if (isset($_GET['video'])) {
					$sel = "SELECT * FROM foto WHERE id = " . $_GET['video'];
					$res = mysql_query($sel,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
					$vid = mysql_fetch_array($res);
					
					echo "<div id=\"Player\">";
					echo "<div id=\"div2\">";
					echo "<a href=\"index2.php?pag=5\" target=\"_top\">Fechar [X]&nbsp;&nbsp;&nbsp;</a></div>";
					echo "<embed src=\"imagens/" . $vid['arquivo'] . "\" width=\"360\" height=\"300\"></embed></div>";
				}
			}
		}
		
		else if ($pag == 6) {
			$ctrl = isset($_GET['ctrl'])? anti_injection($_GET['ctrl']) : 1;
			$sql  = "SELECT titulo, texto FROM pagina WHERE tipo = 2 ORDER BY id DESC";
			$res  = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
			$dep  = mysql_result($res,($ctrl-1),1);
			$ass  = mysql_result($res,($ctrl-1),0);
			$num  = mysql_num_rows($res);
			
			echo "<div id=\"Icones\">";
			if ($ctrl > 1)
				echo "<p align=\"center\"><a href=\"?pag=6&amp;ctrl=" . ($ctrl-1) . "\">Anterior</a> | ";
			else
				echo "<p align=\"center\">Anterior | ";
			if ($ctrl < $num)
				echo "<a href=\"?pag=6&amp;ctrl=" . ($ctrl+1) . "\">Pr&oacute;ximo</a></p>";
			else
				echo "Pr&oacute;ximo</p>";
			echo "<hr /><p align=\"center\"><a href=\"?pag=4&amp;info=4\">Envie-nos seu depoimento</a></p>";
			echo "</div>";
			
			echo $dep . "<br /><p align=\"right\"><i>" . $ass . "</i></p>";
		}
		
		else if ($pag == 7)
			moreinfo(4, "Entre em Contato");
			
		else {
			$sql = "SELECT * FROM pagina WHERE id = " . $pag;
			$res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
			
			$txt = mysql_fetch_array($res);
			$num = mysql_num_rows($res);
			
			echo "<h1>" . $txt['titulo'] . "</h1>";
			echo "<br /><span class=\"corpo\">" . $txt['texto'] . "</span>";			
		
			$ini = isset($_GET['ini'])? $_GET['ini'] : 0;
			
			icons($pag,$ini,6);
		}
	}
	else if ($acao == "convite1" || $acao == "convite2") {
		@session_start();
		$target = $acao == "convite1"? "_blank" : "_self";
		
		echo "<br /><h1>P&aacute;gina dos Noivos</h1>";
		echo "<br />&nbsp;<center><span class=\"class2\">Digite o usu&aacute;rio e senha para acesso &agrave;s informa&ccedil;&otilde;es</span>";
		echo "<form action=\"../convite.php\" method=\"post\" target=\"" . $target . "\">";
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
		echo "<tr><td align=\"right\"><span class=\"class2b\">Usu&aacute;rio: </span></td><td><input type=\"text\" size=\"20\" name=\"usuario\" /></td></tr>";
		echo "<tr><td align=\"right\"><span class=\"class2b\">Senha: </span></td><td><input type=\"password\" size=\"20\" name=\"senha\" /></td></tr>";
		echo "</table><input type=\"submit\" size=\"20\" value=\"Entrar!\" /></form></center>";
		echo "<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;";
	}
	
	if (isset($_GET['foto']))
	{
		$foto = $_GET['foto'];
		echo "<div id=\"Foto3\">";
		
		$sql = "SELECT * FROM foto WHERE id = " . $foto . " ORDER BY ordem, id";
		$res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
		$fot = mysql_fetch_array($res);
		
		$info   = getimagesize("imagens/m-" . $fot['arquivo']); 
		$w      = $info[0];
		$h      = $info[1];
		
		if ($w > $h)
			echo "";
		echo "<center><img src=\"imagens/m-" . $fot['arquivo'] . "\"><center>";
		echo "</div>";
		
		echo "<div id=\"Sobre\">";
	?>
		<script language="javascript">
			if (AC_FL_RunContent == 0) {
				alert("This page requires AC_RunActiveContent.js. In Flash, run \"Apply Active Content Update\" in the Commands menu to copy AC_RunActiveContent.js to the HTML output folder.");
			} else {
				AC_FL_RunContent(
					'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
					'width', '460',
					'height', '340',
					'src', 'sobre',
					'quality', 'high',
					'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
					'align', 'middle',
					'play', 'true',
					'loop', 'true',
					'scale', 'showall',
					'wmode', 'transparent',
					'devicefont', 'false',
					'id', 'sobre',
					'bgcolor', '#ffffff',
					'name', 'base',
					'menu', 'true',
					'allowScriptAccess','sameDomain',
					'movie', 'sobre',
					'salign', ''
					); //end AC code
			}
		</script>
	<?
	}
}

function unformat($texto) {
	$historia = $texto;
	$historia = str_replace("<br />",chr(13),$historia);
	$historia = str_replace("<i>","[i]",$historia);
	$historia = str_replace("</i>","[/i]",$historia);
	$historia = str_replace("<b>", "[n]",$historia);
	$historia = str_replace("</b>", "[/n]",$historia);
	$historia = str_replace("<u>","[s]",$historia);
	$historia = str_replace("</u>","[/s]",$historia);
	$historia = str_replace('<center>','[c]',$historia);
	$historia = str_replace('</center>',"[/c]",$historia);
	$historia = str_replace("<font color=red>","[r]",$historia);
	$historia = str_replace("<font color=green>","[g]",$historia);
	$historia = str_replace("<font color=darkblue>","[b]",$historia);
	$historia = str_replace("<font size=4>","[2]",$historia);
	$historia = str_replace("<font size=5>","[3]",$historia);
	$historia = str_replace("</font><!--r-->","[/r]",$historia);
	$historia = str_replace("</font><!--g-->","[/g]",$historia);
	$historia = str_replace("</font><!--b-->","[/b]",$historia);
	$historia = str_replace("</font><!--2-->","[/2]",$historia);
	$historia = str_replace("</font><!--3-->","[/3]",$historia);
	$historia = str_replace("<table border=1 bordercolor=gray cellpadding=5 cellspacing=0 width=300><tr bgcolor=#dddddd><td valign=top><font size=2>", "[t3]", $historia);
	$historia = str_replace("<table border=1 bordercolor=gray cellpadding=5 cellspacing=0 width=100%><tr bgcolor=#dddddd><td valign=top><font size=2>", "[t]", $historia);
	$historia = str_replace("</font></td></tr></table>","[/t]",$historia);
	$historia = str_replace("</font></td><td valign=top><font size=2>","[d]",$historia);
	$historia = str_replace("</font></td></tr><tr><td valign=top><font size=2>","[l]",$historia);
	$historia = str_replace("&#8226;&nbsp;","[o]",$historia);
	
	return $historia;
}

function format($texto, $ctrl) {
	$historia = str_replace('"',"&quot;",$texto);
	$historia = str_replace(chr(13),"<br />",$historia);
	$historia = str_replace("[i]", "<i>",$historia);
	$historia = str_replace("[/i]", "</i>",$historia);
	$historia = str_replace("[n]", "<b>",$historia);
	$historia = str_replace("[/n]", "</b>",$historia);
	$historia = str_replace("[s]", "<u>",$historia);
	$historia = str_replace("[/s]", "</u>",$historia);
	$historia = str_replace("[c]", "<center>",$historia);
	$historia = str_replace("[/c]", "</center>",$historia);
	$historia = str_replace("[r]", "<font color=red>",$historia);
	$historia = str_replace("[g]", "<font color=green>",$historia);
	$historia = str_replace("[b]", "<font color=darkblue>",$historia);
	$historia = str_replace("[/r]", "</font><!--r-->",$historia);
	$historia = str_replace("[/g]", "</font><!--g-->",$historia);
	$historia = str_replace("[/b]", "</font><!--b-->",$historia);
	$historia = str_replace("[2]", "<font size=4>",$historia);
	$historia = str_replace("[3]", "<font size=5>",$historia);
	$historia = str_replace("[/2]", "</font><!--2-->",$historia);
	$historia = str_replace("[/3]", "</font><!--3-->",$historia);
	$historia = str_replace("[o]", "&#8226;&nbsp;",$historia);
	$historia = str_replace("[t3]", "<table border=1 bordercolor=gray cellpadding=5 cellspacing=0 width=300><tr bgcolor=#dddddd><td valign=top><font size=2>",$historia);
	$historia = str_replace("[t]", "<table border=1 bordercolor=gray cellpadding=5 cellspacing=0 width=100%><tr bgcolor=#dddddd><td valign=top><font size=2>",$historia);
	$historia = str_replace("[/t]","</font></td></tr></table>",$historia);
	$historia = str_replace("[d]", "</font></td><td valign=top><font size=2>",$historia);
	$historia = str_replace("[l]", "</font></td></tr><tr><td valign=top><font size=2>",$historia);
	
	if ($ctrl == 0) {
		$arroba   = strpos($historia, "@");
		
		if ($arroba === false)
			$historia = $historia . "";
		else {
			$antes   = substr($historia, 0, $arroba); 
			$depois  = substr($historia, $arroba+1); 
			$depois2 = $depois;
			$antesp  = strpos($antes, "[v]");
			$prxesp  = strpos($depois, "[/v]");
			$antes   = substr($antes, $antesp+1, $arroba);
			$depois  = substr($depois, 0, $prxesp);
	
			$email   = $antes . "@" . $depois;
			
			$historia = str_replace($email , "<a href=mailto:" . $email . ">" . $email . "</a>",$historia);
		}
		
		$www = strpos($historia, "[v]www");
		
		if ($www === false)
			$historia = $historia . "";
		else {
			$depois  = substr($historia, $www); 
			$prxesp  = strpos($depois, "[/v]");
			$depois  = substr($depois, 0, $prxesp);
	
			$historia = str_replace($depois, "<a href=http://" . $depois . " target=_blank>" . $depois . "</a>",$historia);
		}
	
		$historia = str_replace("[v]", "",$historia);
		$historia = str_replace("[/v]", "",$historia);
	}
	return $historia;
}

function anti_injection($_input) {
	$__output = stripslashes($_input);
	$__output = str_replace(";"			, "", $__output);
	$__output = str_replace("'"			, "", $__output);
	$__output = str_replace('"'			, '', $__output);
	$__output = str_replace("="			, "", $__output);
	$__output = str_replace("DROP"		, "", $__output);
	$__output = str_replace("ALL"		, "", $__output);
	$__output = str_replace("ADD"		, "", $__output);
	$__output = str_replace("DELETE"	, "", $__output);
	$__output = str_replace("INSERT"	, "", $__output);
	$__output = str_replace("ADD"		, "", $__output);
	$__output = str_replace("FROM"		, "", $__output);
	$__output = str_replace("DATABASE"	, "", $__output);
	$__output = str_replace("CREATE"	, "", $__output);
	$__output = str_replace("ALTER"		, "", $__output);
	$__output = str_replace("RENAME"	, "", $__output);
	$__output = str_replace("DESCRIBE"	, "", $__output);
	$__output = str_replace("START"		, "", $__output);
	$__output = str_replace("TRANSACTI"	, "", $__output);
	$__output = str_replace("COMMIT"	, "", $__output);
	$__output = str_replace("ROLLBACK"	, "", $__output);
	$__output = str_replace("UNION"		, "", $__output);
	$__output = str_replace("ORDER"		, "", $__output);
	$__output = str_replace("--"		, "", $__output);
	$__output = str_replace("/*"		, "", $__output);
	$__output = str_replace("*/"		, "", $__output);
	$__output = str_replace("||"		, "", $__output);
	$__output = str_replace("' --"		, "", $__output);
	$__output = str_replace("' #"		, "", $__output);
	$__output = str_replace("'/*"		, "", $__output);
	$__output = str_replace("<"			, "", $__output);
	$__output = str_replace(">"			, "", $__output);
	$__output = str_replace("("			, "", $__output);
	$__output = str_replace(")"			, "", $__output);
	$__output = str_replace("%"			, "", $__output);
	$__output = str_replace("="			, "", $__output);
	$__output = str_replace("\""		, "", $__output);
	$__output = str_replace("\'"		, "", $__output);
	
	return $__output;
}

function selectitem($id,$tab,$item,$col) {
	$sql1 = "SELECT * FROM " . $tab . " WHERE " . $id . " = " . $item;
	$res1 = mysql_query($sql1,$con) or die ("Erro: " . $sql1 . "<br>" . mysql_error($con));
	$nome = mysql_fetch_array($res1);
	
	return $nome[$col] . "<br>";
}

function icons($pag,$ini,$cnt) {
	$con = connect();
	$sql = "SELECT * FROM foto WHERE pagina = " . $pag . " ORDER BY ordem, id";// LIMIT " . ($ini*8) . ",8";
	$rst = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
	$num = mysql_num_rows($rst);

	
	if ($num > 0) {
		echo "<div id='Icones'>";
		echo "<div id='fotos'>";
		echo "<br /><center><h3>Galeria de imagens</h3>";
		echo "<ul class=\"gallery clearfix\">";
		
		$i = 1;
		while ($foto = mysql_fetch_array($rst)) {
			echo "<li><a href=\"imagens/m-" . $foto['arquivo'] . "\" rel=\"prettyPhoto[gallery2]\" title=\"" . utf8_decode($foto['legenda']) . "\"><img src=\"imagens/i-" . $foto['arquivo'] . "\" alt=\"\" /></a></li>&nbsp;";
			echo $i % 2 == 0? "<br />" : "";
			$i++;
		}
		echo "</ul>";
		
		echo "</center></div></div>";
	}
	mysql_close($con);
}

/*function back($ini,$pag,$num)
{
	echo "<script>camada('Voltar2',660,316,140,30,0,'fundicon.jpg','');</script><center>";
	
	if ($ini != -1 && $num > 8)
	{
		if ($ini == 0)	
		{
			echo "<img src=\"imagens/ant2.jpg\" border=\"0\">";
			echo "<a href=\"index2.php?pag=" . $pag . "&ini=" . ($ini+1) . "\"><img src=\"imagens/pro1.jpg\" border=\"0\"></a>";
		}
		if ($ini > 0 && $num > 9)	
		{
			echo "<a href=\"index2.php?pag=" . $pag . "&ini=" . ($ini-1) . "\"><img src=\"imagens/ant1.jpg\" border=\"0\"></a>";
			echo "<a href=\"index2.php?pag=" . $pag . "&ini=" . ($ini+1) . "\"><img src=\"imagens/pro1.jpg\" border=\"0\"></a>";
		}
		if ($num == 9)	
		{
			echo "<a href=\"index2.php?pag=" . $pag . "&ini=" . ($ini-1) . "\"><img src=\"imagens/ant1.jpg\" border=\"0\"></a>";
			echo "<img src=\"imagens/pro2.jpg\" border=\"0\">";
		}
	}
	
	echo "<br /><a href=\"javascript:history.back(-1)\"><img src=\"imagens/vol1.jpg\" border=\"0\"></a>";

	echo "</div>";
}*/
function selectbox($tab,$tam,$and,$item) {
	$con = connect();
	$sql = "SELECT DISTINCT * FROM " . $tab . $and . " ORDER BY id";
	$res = mysql_query($sql,$con) or die ("Erro: " . $sql . "<br>" . mysql_error($con));
	$num = mysql_num_rows($res);
	
	if ($num > 0) {
		echo "<select name=\"" . $tab . "\" class=\"select" . $tam . "\" onChange=\"" . $tab . "1.submit()\">";
		echo "<option value=\"0\">Escolha</option>";
		while ($neg = mysql_fetch_array($res)) {
			if ($neg['id'] == $item)
				$sel = " selected=\"selected\"";
			else
				$sel = "";
			$iii = $tab == "convite"? $neg['evento'] : $neg['nome'];
			echo "<option value=\"" . $neg['id'] . "\"" . $sel . ">" . $iii . "</option>";
		}
		echo "</select>";
	}
	else
		echo "Ítens não encontrados";	
	mysql_close($con);
}

function moreinfo($info,$tit) {
	if ($info == 1 || $info == 2 || $info == 3 || $info == 4)
		$vis2   = "visible";
	else
		$vis2   = "hidden";
	
	if ($info == 1 || $info == 3 || $info == 4) {
		echo "<h2>" . $tit . "</h2>";
		$inf = $info == 1? 2 : 4;
		echo "<form action=\"index2.php?info=2&pag=4&info1=" . $info . "\" method=\"post\" target=\"_self\">";
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
		echo "<tr><td class=\"class2c\">Nome:* </td>";
		echo "<td><input type='text' size='40' name='nome' /></td></tr>";
		echo "<tr><td class=\"class2c\">E-Mail:* </td>";
		echo "<td><input type=\"text\" size=\"40\" name=\"email\" /></td></tr>";
		echo "<tr><td class=\"class2c\">Telefone:* </td>";
		echo "<td class=\"class2c\"><input type=\"text\" size=\"1\" name=\"dddtel\" /><input type=\"text\" size=\"10\" name=\"telefone\" />";
		echo "Celular: ";
		echo "<input type=\"text\" size=\"1\" name=\"dddcel\" /><input type=\"text\" size=\"10\" name=\"celular\" /></td></tr>";
		echo "<tr><td class=\"class2c\">Cidade: </td>";
		echo "<td><input type=\"text\" size=\"35\" name=\"cidade\" /></td></tr></table>";
		echo "<hr /><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"400\">";
		if ($info == 1) {
			echo "<tr><td class=\"class2c\">Tipo do evento:* </td>";
			echo "<td><select name=\"tipoevento\">";
			echo "<option value=\"0\">Escolha o tipo</option>";
			echo "<option value=\"1\">Aniversário</option>";
			echo "<option value=\"2\">Bodas</option>";
			echo "<option value=\"3\">Casamento na praia</option>";
			echo "<option value=\"4\">Casamento tradicional</option>";
			echo "<option value=\"5\">Formatura</option>";
			echo "<option value=\"6\">Festa infantil</option>";
			echo "<option value=\"7\">Confraterniza&ccedil;&atilde;o</option>";
			echo "<option value=\"8\">Loca&ccedil;&atilde;o de material</option>";
			echo "</select></td></tr>";
			echo "<tr><td class=\"class2c\">N&uacute;mero de pessoas:* </td>";
			echo "<td class=\"class2c\"><input type=\"text\" size=\"3\" name=\"pessoas\" />&nbsp;&nbsp;Data do evento: ";
			echo "<input type=\"text\" size=\"10\" name=\"data\" /></td></tr>";
		}
		echo "<tr><td class=\"class2\" colspan=\"2\">";
		echo $info == 1? "Observa&ccedil;&otilde;es:" : "Mensagem";
		$l = $info == 1? 3 : 6;
		echo "<br /><textarea size=\"25\" name=\"observ\" cols=\"60\" rows=\"" . $l . "\"></textarea>";
		
		if ($info == 1) {
			echo "<tr><td class=\"class2c\" width=\"150\">Onde conheceu a Papillon Eventos?: </td>";
			echo "<td width=\"250\"><select name=\"onde\">";
			echo "<option value=\"\">Escolha a op&ccedil;&atilde;o</option>";
			echo "<option value=\"Revista\">Revista</option>";
			echo "<option value=\"Site de busca\">Site de busca</option>";
			echo "<option value=\"Panfleto\">Panfleto</option>";
			echo "<option value=\"Amigos\">Amigos</option>";
			echo "<option value=\"Parentes\">Parentes</option>";
			echo "<option value=\"Outra\">Outra</option>";
			echo "</select></td></tr></table>";
		}
		echo "<input type=\"submit\" value=\"Enviar\"><br />* <span class=\"class3b\">Por favor, n&atilde;o deixe de preencher esses campos</span></td></tr></table></form>";
	}
	else if ($_GET['info'] == 2) {
		$tit = $_GET['info1'] == 1? "<h2>Or&ccedil;amento on-line</h2>" : "<h2>Enviar Depoimento</h2>";
		$tit = $_GET['info1'] == 4? "<h2>Entre em Contato</h2>" : $tit;
		
		echo $tit;
		
		$erro = "";
		
		if ($_POST['nome'] != "")
			$nome  = $_POST['nome'];
		else
			$erro .= "Digite seu nome<br />";
			
		if ($_POST['email'] != "")
			$email = $_POST['email'];
		else
			$erro .= "Digite seu e-mail<br />";
			
		$cidade   = $_POST['cidade'];
		
		if ($_POST['telefone'] == "" || $_POST['dddtel'] == "")
			$erro    .= "Digite seu telefone corretamente<br />";
		else
			$telefone = "(" . $_POST['dddtel'] . ") " . $_POST['telefone'];
			
		$celular = "(" . $_POST['dddcel'] . ") " . $_POST['celular'];
		
		if ($_GET['info1'] == 1) {
			if ($_POST['tipoevento'] != 0)
				$tipoevento = $_POST['tipoevento'];
			else
				$erro     .= "Escolha o tipo do evento<br />";
				
			if ($_POST['pessoas'] != "")
				$pessoas = $_POST['pessoas'];
			else
				$erro   .= "Digite a quantidade de pessoas<br />";
		}
		
		$data   = $_POST['data'];
		$observ = $_POST['observ'];
		$onde   = $_POST['onde'];
		
		if ($erro == "") {
			$con = connect();
			if ($_GET['info1'] == 1) {
				$sql = "INSERT INTO contato (nome, email, telefone, celular, cidade, tipoevento, pessoas, data, observ, resp, onde) VALUES 
				  (\"$nome\",\"$email\",\"$telefone\",\"$celular\",\"$cidade\",$tipoevento,$pessoas,\"$data\",\"$observ\",0,\"$onde\")";
				mysql_query($sql,$con) or die ("Erro: " . $sql . "<br />" . mysql_error($con));
			}
			mysql_close($con);
				
			if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST]))
        $emailsender = 'papillon@papilloneventos.com.br';
			else
        $emailsender = "buffet@" . $_SERVER[HTTP_HOST];
 
			if (PATH_SEPARATOR == ";") 
				$quebra_linha = "\r\n";
			else 
				$quebra_linha = "\n";

			$assunto = $_GET['info1'] == 1? "SITE: Orçamento Online" : "SITE: Depoimento";
			$assunto = $_GET['info1'] == 4? "SITE: Contato" : $assunto;
			
			$destino = $_GET['info1'] == 1? "atendimento" : "buffet";
			$destino = $_GET['info1'] == 4? "contato" : $destino;
			
			$corpo  = "Nome: " . $nome . "<br />Tel.:" . $telefone;
			$corpo .= $celular != "() "? " / Cel.:" . $celular : "";
			if ($onde != "")
				$corpo .= "<br />Onde conheceu:" . $onde . "<br />";
			
			$corpo .= $_GET['info1'] == 1? "Tipo do evento: " . $tipoevento . "<br />Convidados: " . $pessoas . "<br />Data do evento: " . $data . "<br />" : "";
			$corpo .= $observ;

			$headers  = "MIME-Version: 1.1" .$quebra_linha;
			$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
			$headers .= "From: " . $emailsender . $quebra_linha;
			$headers .= "Reply-To: " . $email . $quebra_linha;
 
			if (!mail($destino . "@papilloneventos.com.br", $assunto, $corpo, $headers ,"-r".$emailsender)) {
				$headers .= "Return-Path: " . $emailsender . $quebra_linha;
				$ok = mail($destino . "@papilloneventos.com.br", $assunto, $corpo, $headers);
			}
			else
				$ok = 1;
			
			if ($ok) {
				$msg = $_GET['info1'] == 1? "Solicita&ccedil;&atilde;o de or&ccedil;amento on-line enviada com sucesso. <br />Por favor, aguarde nosso contato!" : "Depoimento enviado com sucesso!";
				$msg = $_GET['info1'] == 4? "Contato enviado com sucesso. <br />Por favor, aguarde nosso retorno em breve!" : $msg;
			}
			else
				$msg = "Infelizmente, houve um erro ao enviar mensagem. <br />Tente novamente e, se o problema persistir, entre em contato pelo e-mail <a href=\"mailto:buffet@papilloneventos.com.br\">buffet@papilloneventos.com.br</a>";
			confirm($msg,1,1);
		}
		else {
			echo $erro . "<br />";
			confirm("Por favor, corrija os erros de preenchimento do formul&aacute;rio",1,1);
		}
	}
}
function confirm($msg,$pag,$ini) {
	echo "<br /><table width=\"490\" border=\"0\"><tr><td width=\"100\">&nbsp;</td>";
	echo "<td width=\"390\" class=\"red\">" . $msg . "</td></tr><tr><td>&nbsp;</td><td><hr>";
	echo "<a href=\"javascript:self.history.go(-" . $pag . ")\"><img src=\"imagens/voltar.jpg\" border=\"0\"> Voltar</a><p>";
	echo "<a href=\"";
	echo $ini == 1? "index2.php" : $ini == 3? "convite.php?acao=logoff" : "adm_sys.php";
	echo "\">In&iacute;cio</a><p>";
	echo "</td></tr></table>";
}
?>