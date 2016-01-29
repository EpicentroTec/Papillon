<?php
function connect() {
	include ("conexao.php");
	return $con;
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