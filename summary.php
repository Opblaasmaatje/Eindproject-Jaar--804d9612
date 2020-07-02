<?php
$dsn = "mysql:host=localhost;dbname=cv_maker";
$user = "root";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);
$query = $pdo->query("SELECT * FROM users");
$query2 = $pdo->prepare("SELECT * FROM profile_pages WHERE user_id=?")
?>
<!DOCTYPE html>
    <html>
    <center>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="JS/script.js"></script>
    </head>
    <header>
        <div id="header_container">
            <h1 id="header_summary">Summary of all users</h1>
        </div>
    </header>
    <body id="soDone">
    <table id="myTable">
    <tr><th><input class='in_summary' name='username' type='text' placeholder='Search by Username'><div class="Switch" id="username" style="width:150px">Username</div></th>
    <th><input class='in_summary' name='name' type='text' placeholder='Search by Name'><div class="Switch" id="name" style="width:150px">Name</div></th></tr>
    <?php 
    while ($show = $query->fetch(PDO::FETCH_ASSOC)) {
        $query2->execute([$show['id']]);
        $show_real_name = $query2->fetch(PDO::FETCH_ASSOC);
        echo '<tr><td style="text-align:center;"><a href="profile.php?selected_user=' . $show['id'] . '">';
        echo($show['username'] . '</a></td><td style="text-align:center;">' .  $show_real_name['name']);
        echo '</td></tr>';
    }?>
    </table>
    </body>
    <footer>
        <div class="footerContainer">    
            <h4> Code Monkey Incorporated© CV Maker</h4>
            <h4 href="About-us"><a href="https://www.notion.so/bitacademy/2020-Code-Monkey-Incorporated-7c231c7df5f84c4e888f6c85849e0a07">About us</a></h4>
        </div>
    </footer>
    </center>
    </html>