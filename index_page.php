<!DOCTYPE html>
<html>

<head>
	  <meta charset="utf-8" />
    <title>Recettes - Ingrédients</title>
</head>

<body>

<?php

  $type = $_GET['type']; //type de la page (recettes ou ingrédients)
  $current = $_GET['current']; //objet courant (recette ou ingrédient ou x : rien)

	if ($type == null) {
		$type = "ingredients";
	}

  //choix pour se placer dans les recettes ou ingrédients
  if ($type == "ingredients") {
    echo "<table width='100%' border ='solid'><tr><td align='center' width='50%'><h2><a href='index_page.php?type=recettes&current=x'>Recettes</a></h2></td><td bgcolor='#DDD' align='center'><h2><a href='index_page.php?type=ingredients&current=x'>Ingrédients</a></h2></td></tr></table>";
  } else if ($type == "recettes") {
    echo "<table width='100%' border ='solid'><tr><td bgcolor='#DDD' align='center' width='50%'><h2><a href='index_page.php?type=recettes&current=x'>Recettes</a></h2></td><td align='center'><h2><a href='index_page.php?type=ingredients&current=x'>Ingrédients</a></h2></td></tr></table>";
  }

  //affichage du titre
  if ($current == "x") {
    echo "<h1>Tout</h1>";
  } else {
    echo "<h1>$current</h1>";
  }

  //barre de recherche
  echo "<form autocomplete=\"off\" action=\"index_page.php\" method=\"get\">
    <input type=\"text\" name=\"current\" placeholder=\"Recherche moi vas-y!\"/>
    <input type=\"hidden\" name=\"type\" value=\"$type\">
    <input type=\"submit\" value=\"Rechercher\"/>
  </form>
  <br/>";

  //inclusion des tableaux Hierarchie et Recettes
  include 'Donnees.inc.php';

  //affichage de l'ingrédient sélectionné
  if ($type == "ingredients" && array_key_exists($current, $Hierarchie)) {

    foreach ($Hierarchie[$current] as $key => $value) {
      $keyName = ucfirst($key);
      echo "$keyName :<br/><ul>";
      foreach ($value as $key2 => $value2) {
        echo "<li><a href='index_page.php?type=ingredients&current=$value2&path='>$value2</a></li>";
      }
      echo "</ul><br/>";
    }

  //affichage des ingrédients
  } else if ($type == "ingredients" && $current == "x") {

    foreach ($Hierarchie as $key => $value) {
      echo "<a href='index_page.php?type=ingredients&current=$key&path='>$key</a><br/>";
      foreach ($value as $key2 => $value2) {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;$key2<br/><ul>";
        foreach ($value2 as $key3 => $value3) {
          echo "<li><a href='index_page.php?type=ingredients&current=$value3&path='>$value3</a></li>";
        }
        echo "</ul>";
      }
      echo "<br/>";
    }

  //affichage de la recette sélectionnée
  } else if ($type == "recettes" && array_key_exists($current, $Recettes)) {

    foreach ($Recettes[$current] as $key => $value) {
      if (strcmp($key, "index") != 0) {
        echo "<li>$key $value</li>";
      } else {
        echo "<li>$key</li><ul>";
      }
      foreach ($value as $key2 => $value2) {
        echo "<li><a href='index_page.php?type=ingredients&current=$value2'>$value2</a></li>";
      }
      if (strcmp($key, "index") == 0) {
        echo "</ul>";
      }
    }

  //affichage des recettes
  } else if ($type == "recettes" && $current == "x") {

    foreach ($Recettes as $key => $value) {
      echo "<a href='index_page.php?type=recettes&current=$key'>$key</a><ul>";
      foreach ($value as $key2 => $value2) {
        if (strcmp($key2, "index") != 0) {
          echo "<li>$key2 $value2</li>";
        } else {
          echo "<li>$key2</li><ul>";
        }
        foreach ($value2 as $key3 => $value3) {
          echo "<li><a href='index_page.php?type=ingredients&current=$value3'>$value3</a></li>";
        }
        if (strcmp($key2, "index") == 0) {
          echo "</ul>";
        }
      }
      echo "</ul>";
    }

  //si la recherche n'est pas fructueuse
  } else {

    echo "Error 404 : $current not found!";

  }

?>

</body>
</html>
