<?php
include_once './header.php';
include_once './db.php';
$idtopicaa=$_GET['id'];
?>
 <!-- Page Content -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-2">
            <div class=" aff-right">
               <div class="ui-block">
                  <h6 class="my-4">Active groups</h6>
                  <hr>
                  <div class="nav flex-column nav-pills nav-stacked" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                     <?php
                   $querytop="SELECT imegrupe FROM groups ORDER BY steviloodgovora DESC";
                   $resulttop = mysqli_query($link, $querytop);
                   $counter=0;
                   while ($rowtop = mysqli_fetch_array($resulttop)) {
                      $imegrupe=$rowtop['imegrupe'];
                     $counter++;
                     
                    echo '<a class="nav-link" data-toggle="pill">'.$imegrupe.'</a>';
                    if($counter==5){
                       break;
                    }
                     }
                  ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.col-lg-3 -->
         <!-- Questions pa to -->
         
         <div class="col-lg-7">
         <?php
                     
                     //topic za question id
                     $querytq2="SELECT * FROM topics_questions WHERE id_topica=$idtopicaa";
                     $resulttq2=mysqli_query($link, $querytq2);
                     while ($rowtq2=mysqli_fetch_array($resulttq2)) {
                     $idtopicsquestions=$rowtq2['id'];
                     
                     $queryp="SELECT * FROM questions WHERE id=$idtopicsquestions";
                     $resultp = mysqli_query($link, $queryp);
                     while ($rowp = mysqli_fetch_array($resultp)) {
                        $idvprasalca=$rowp['id_usera'];
                        $headlinee=$rowp['headline'];
                        $detailss=$rowp['details'];
                        $datee=$rowp['date_asked'];
                        $idquestiona=$rowp['id'];
                        //ime, priimek
                        $queryvp="SELECT * FROM users WHERE id=$idvprasalca";
                        $resultvp = mysqli_query($link, $queryvp);
                        $rowvp=mysqli_fetch_array($resultvp);
                        $imevp=$rowvp['ime'];
                        $priimekvp=$rowvp['priimek'];
                        $slikaa=$rowvp['avatar'];
                        //topic
                     $querytq="SELECT * FROM topics_questions WHERE id_topica=$idtopicaa";
                     $resulttq=mysqli_query($link, $querytq);
                     $rowtq=mysqli_fetch_array($resulttq);
                     $idtopica=$rowtq['id_topica'];
                     $queryto="SELECT topic FROM topics WHERE id=$idtopica";
                     $resultto=mysqli_query($link, $queryto);
                     $rowto=mysqli_fetch_array($resultto);
                     $topicc=$rowto['topic'];
                        ?>
            <div class="ui-block">
            
               <article class="hentry post">
                  <div class="m-link">
                     
                        <h4><?php echo $headlinee ?></h4>
                     
                  </div>
                  
                  <div class="post__author author vcard inline-items">
                     <img src=<?php echo "$slikaa" ?> alt="author">
                     <div class="author-date">
                        <a class="h6 post__author-name fn"><?php echo $imevp, " ", $priimekvp; ?></a>
                        <div class="post__date">
                           <time class="published" datetime="2004-07-24T18:18">
                           <?php echo $topicc, " • ", $datee; ?>
                           </time>
                        </div>
                     </div>
                     <!-- tu bo delete -->
                     <div class="more">
                        <a href="#">
                        <i class="fa fa-ellipsis-v"></i>
                        </a>
                     </div>
                  </div>
                  <p><?php echo $detailss;?>
                  </p>
                  <div class="post-additional-info inline-items">
                     <p>
                        <a href="answering.php?id=<?php echo $idquestiona;?>" class="btn btn-sm btn-light"> Answer</a>
                     </p>
                  </div>
               </article>
                     </div>       
                       <?php } } ?>
</body>