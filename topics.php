<?php
include_once './header.php';
$userid=$_SESSION['user_id'];
include_once './db.php';
?>
<div align="center">
<?php

                $queryna="SELECT username FROM users WHERE id='$userid'";
                $resultna= mysqli_query($link, $queryna);
                $rowna= mysqli_fetch_array($resultna);
                $ime=$rowna['username'];
           ?> <h6 class="my-4"> <?php   echo 'Hello, ', $ime,', here you can pick a topic to view'; ?> </h6>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Topic</th>
            <th>Description</th>
            <th>Rules</th>
        </tr>
    </thead>
                <tbody>
        <?php
            $queryn="SELECT * FROM topics";
            $resultn= mysqli_query($link, $queryn);
            while ($rown= mysqli_fetch_array($resultn)){
                $topic=$rown['topic'];
                $opis=$rown['opis'];
                $pravila=$rown['pravila'];
                $idtopicaa=$rown['id'];
                echo '<tr>';
                echo '<td>';
                // topic
                echo '<a href="topics_show.php?id='.$idtopicaa.'">'.$topic.'';
                echo '</td>';
                echo '<td>';
                // opis
                echo $opis;
                echo '</td>';
                echo '<td>';
                // pravila
                echo $pravila;
                echo '</td>';
                echo '<td>';
                echo '</tr>';
            }
        ?>
        </tbody>
        </table>
