<?php
include_once './header.php';
$userid=$_SESSION['user_id'];
include_once './db.php';


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "9gaga";

// Create connection
$link = mysqli_connect($servername, $username, $password, $db_name);

// driver napaka - popravek
mysqli_query($link, "SET NAMES 'utf8'");




?>
<div align="center">
<?php

                $queryna="SELECT * FROM users WHERE id='$userid'";
                $resultna= mysqli_query($link, $queryna);
                $rowna= mysqli_fetch_array($resultna);
                $ime=$rowna['username'];
           ?> <h6 class="my-4"> <?php   echo 'Hello, ', $ime,', here you can see all of your notifications'; ?> </h6>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Type</th>
            <th>Content</th>
            <th>Date</th>
            <th>Mark read</th>
        </tr>
    </thead>
                <tbody>
        <?php
            $queryn="SELECT * FROM notifications WHERE id_usera='$userid'";
            $resultn= mysqli_query($link, $queryn);
            while ($rown= mysqli_fetch_array($resultn)){
                $tip=$rown['tip_notif'];
                $datum=$rown['datum_notifikacije'];
                $idno=$rown['id'];
                echo '<tr>';
                echo '<td>';
                // grupa
                if($tip==1){
                echo 'Upvote';
                }
                else if($tip==2){
                    echo 'Comment';
                }
                echo '</td>';
                echo '<td>';
                // opis
                if($tip==1){
                    echo 'Someone has upvoted!';
                    }
                    else if($tip==2){
                        echo 'Someone has commented your post!';
                    }
                    else if($tip ==3){
                      echo 'Someone has downvoted!';
                    }
                echo '</td>';
                echo '<td>';

                echo $datum;
                echo '</td>';
                echo '<td>';

                echo '<a href="notif_delete.php?id='.$idno.'">Mark';
                echo '</td>';
                echo '<td>';

                echo '</tr>';
                }
        ?>
        </tbody>
        </table>
