<?php
include_once './header.php';
include 'config.php';
include 'sql.php';






if (isset($_SESSION['username'])) {

  $userid=$_SESSION['user_id'];

  $query="SELECT avatar FROM users where id=$userid";
  $res= mysqli_query($link, $query);
  $ro= mysqli_fetch_array($res);
  $slika=$ro['avatar'];
}
else{

}


?>
 <!-- Page Content -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-2">
            <div class=" aff-right">
               <div class="ui-block">
                  <h6 class="my-4">Popular groups</h6>
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

                     $queryp="SELECT * FROM posts ORDER BY date_posted DESC";
                     $resultp = mysqli_query($link, $queryp);
                     while ($rowp = mysqli_fetch_array($resultp)) {
                       $idodidea = $rowp['id'];
                        $idvprasalca=$rowp['id_usera'];
                        $headlinee=$rowp['headline'];
                        $detailss=$rowp['details'];
                        $datee=$rowp['date_posted'];
                        $datee = date("d.m.Y", strtotime($datee));
                        $image = $rowp['image'];
                        $upvotes = $rowp['upvote'];
                        $downvotes = $rowp['downvote'];
                        //ime
                        $queryvp="SELECT * FROM users WHERE id=$idvprasalca";
                        $resultvp = mysqli_query($link, $queryvp);
                        $rowvp=mysqli_fetch_array($resultvp);
                        $imevp=$rowvp['username'];
                        $slikaa=$rowvp['avatar'];
                        //topic
                       $idquestiona=$rowp['id'];
                        $querytq="SELECT id FROM topics_posts WHERE id_post=$idquestiona";
                        $resulttq=mysqli_query($link, $querytq);
                        $rowtq=mysqli_fetch_array($resulttq);
                        $idtopica=$rowtq['id'];
                        $queryto="SELECT topic FROM topics WHERE id=$idtopica";
                       $resultto=mysqli_query($link, $queryto);
                       $rowto=mysqli_fetch_array($resultto);
                       //$topicc=$rowto['topic'];
                        ?>
            <div class="ui-block">

               <article class="hentry post">
                  <div class="m-link">

                        <h4><?php echo $headlinee ?></h4>

                  </div>

                  <div class="post__author author vcard inline-items">
                     <img src="<?php echo "$slikaa" ?>" alt="author">
                     <div class="author-date">
                        <a class="h6 post__author-name fn"><?php echo $imevp; ?></a>
                        <div class="post__date">
                           <time class="published" datetime="2004-07-24T18:18">
                      <?php echo  $datee; ?>
                           </time>
                        </div>

                     </div>

                  </div>
<div>
      <img src=" <?php echo $image; ?>"  alt="image" width="100%" display="block" margin-left="auto" margin-right="auto"></a>
</div>


                  <p><?php echo $detailss;?>
                  </p>
                  <div class="post-additional-info inline-items">
                    <p>
                    <?php echo  $upvotes, " ", "upvotes!", "  "; ?>
                    <?php $pritisnuto = 0;
                        $pritisnuto1 = 0;

                          ?>
                         <a href="upvotingp.php?id=<?php echo $idodidea;?>" class="btn btn-sm btn-light"> Upvote</a>
                    </p>
                    <p>
                    <?php echo  $downvotes, " ", "downvotes!", "  "; ?>
                    <?php $pritisnuto = 0;
                        $pritisnuto1 = 0;

                          ?>
                         <a href="downvotingp.php?id=<?php echo $idodidea;?>" class="btn btn-sm btn-light"> Downvote</a>
                    </p>
                     <p>
                        <a href="comments.php?id=<?php echo $idquestiona;?>" class="btn btn-sm btn-light"><span class="fa fa-pencil"></span> Comment </a>

                     </p>
                  </div>
               </article>
                     </div>


                       <?php } ?>
</body>
