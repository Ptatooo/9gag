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
                $dzoin=$rowna['id_grupe'];
           ?> <h6 class="my-4"> <?php   echo 'Hello, ', $ime ,', here you can create a group, or join one'; ?> </h6>
              <h6 class="my-4"> <?php   echo 'Create a group <a href="group_create.php">HERE</a>'; ?> </h6>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Group</th>
            <th>Description</th>
            <th>Number of answers</th>
        </tr>
    </thead>
                <tbody>
        <?php
            $queryn="SELECT * FROM groups";
            $resultn= mysqli_query($link, $queryn);
            while ($rown= mysqli_fetch_array($resultn)){
                $group=$rown['imegrupe'];
                $opis=$rown['opis'];
                $stodg=$rown['steviloodgovora'];
                $idgrupe=$rown['id'];
                echo '<tr>';
                echo '<td>';
                // grupa
                echo $group;
                echo '</td>';
                echo '<td>';
                // opis
                echo $opis;
                echo '</td>';
                echo '<td>';
                // pravila
                echo $stodg;
                echo '</td>';
                echo '<td>';
                // join, leave
                if($dzoin === NULL) {
                echo '<a href="group_join.php?id='.$idgrupe.'">Join';
                echo '</td>';
                echo '<td>';
                }
                else {
                echo '<a href="group_leave.php?id='.$idgrupe.'">Leave';
                echo '</td>';
                echo '<td>';
                }
                echo '</tr>';
            }
        ?>
        </tbody>
        </table>
