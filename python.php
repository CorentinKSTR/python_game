<?php
$username = "root";
$password = "";
$database = "python";

$mysqli = new mysqli("localhost", $username, $password, $database);

$sql = "SELECT id, player, count FROM game";
$winner = "SELECT winner FROM log ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($sql);
$resultwinner = $mysqli->query($winner);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p>" . "Player " . $row["player"].  " : " . $row["count"]. "</p>";
}
} else {
    echo "0 results";
}


while($row = $resultwinner->fetch_assoc()) {
    echo "<h1>" . "Winner : " . $row["winner"].  " </h1>";
}
$mysqli->close();


     if(isset($_POST['play'])) {
 
            $command = escapeshellcmd('jeu.py');
            $output = shell_exec($command);
        
     }
 ?>
  
 <form method="post">
     <input type="submit" name="play"
             value="Play the game"/>
 </form>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial;
        background-color: #000;
        color: #fff;
    }

    body{
        display: flex;
        justify-content: center;
    }

    p{
        font-size: 40px;
        margin: 100px;
    }

    h1{
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%);
        font-size: 30px;
        color: green;
    }

    input{
        padding: 1rem 2rem;
        background: none;
        border: solid 1px white;
        border-radius: 5px;
        transition: .5s;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
        font-size: 20px;
    }

    input:hover{
        background: white;
        color: black;
        cursor: pointer;
    }
</style>