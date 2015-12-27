<?php
function tabUser($tab_user)
{
    $max=sizeof($tab_user);
    $i=0;
    while($i<$max){
    $u=$tab_user[$i];
        $username = $u->username;
        $name = $u->nameUser;
        $nickname = $u->nicknameUser;
        $sex = $u->sexUser;        
        $email = $u->emailUser;
        $tel = $u->telUser;
        $mobile = $u->mobileUser;
        $address= $u->addressUser;
        $cp = $u->cpUser;
        $city = $u->cityUser;
        $admin = $u->admin;
        if($admin == 1)
        {
            $admin = 'Oui';
        }
        else{
            $admin = 'Non';
        }
        $ban = $u->banUser;
        if($ban==0){
            $ban='Non';
        }  else {
            $ban='Oui';
        }
        echo <<< EOT
        <tr><td><a href="?action=modifyUser&user=$username">$username</a></td><td>$name</td><td>$nickname</td><td>$sex</td><td>$email</td><td>$tel</td><td>$mobile</td><td>$address</td><td>$cp</td><td>$city</td><td>$admin</td><td>$ban</td></tr>
</div>
EOT;
    $i++;
    }
}
?>
<?php
echo '<div class="container">';
if(isset($_SESSION['login']) && $_SESSION['admin']==1){ //Il faut être admin pour voir la liste des utilisateurs

    echo <<<EOT
    <h1>Liste des utilisateurs :</h1>
    <div class="containt-Jeux">
        <table class="table-striped tableJeux" id="tableUser"><thead>
          <tr>
            <th>Utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Téléphone</th>            
            <th>Mobile</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Admin</th>
            <th>Banni</th>
          </tr>
        </thead>
EOT;
tabUser($tab_user);
    echo <<<EOT
    </table>
EOT;
echo <<<EOT
    </div>
</div>
<script>$(document).ready(function() { $('#tableUser').DataTable(); } );</script>
EOT;
}else{
    echo "Seul l'administrateur peut voir la liste des utilisateurs !";
}
echo '</div>';
/*
 * Modifier le script DataTable pour l'adapter aux utilisateurs
 */