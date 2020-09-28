<?php
include_once './header.php';
$userid=$_SESSION['user_id'];
include_once './db.php';
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
                    echo 'Answer';
                }
                echo '</td>';
                echo '<td>';
                // opis
                if($tip==1){
                    echo 'Someone has upvoted your answer!';
                    }
                    else if($tip==2){
                        echo 'Someone has answered your question!';
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
