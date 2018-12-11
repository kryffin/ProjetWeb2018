<!DOCTYPE html>
<html>

<head>
	  <meta charset="utf-8" />
    <title>Inscription</title>
</head>

<body>

  <form action="sign.php">
    <table align="center">
      <tr>
        <td>Login : </td><td><input type="text" name="login"/></td>
      </tr>
      <tr>
        <td>Mot de passe : </td><td><input type="password" name="password"/></td>
      </tr>
      <tr>
        <td>Nom : </td><td><input type="text" name="nom"/></td>
      </tr>
      <tr>
        <td>Prenom : </td><td><input type="text" name="prenom"/></td>
      </tr>
      <tr>
        <td>Sexe : </td><td><input type="radio" name="sexe" value="Femme"/>Femme <input type="radio" name="sexe" value="Homme"/>Homme</td>
      </tr>
      <tr>
        <td>Adresse electronique : </td><td><input type="text" name="adresse_electronique"/></td>
      </tr>
      <tr>
        <td>Date de naissance : </td><td><input type="text" name="date_naissance"/></td>
      </tr>
      <tr>
        <td>Adresse : </td><td><input type="text" name="adresse"/></td>
      </tr>
      <tr>
        <td>Code postal : </td><td><input type="text" name="code_postal"/></td>
      </tr>
      <tr>
        <td>Ville : </td><td><input type="text" name="ville"/></td>
      </tr>
      <tr>
        <td>Numéro de téléphone : </td><td><input type="text" name="numero_telephone"/></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="Envoyer"/></td>
      </tr>
    </table>
  </form>

</body>
</html>
