<?php
include_once './header.php';
include_once './db.php';

include_once './sql.php';





$userid = $_SESSION['user_id'];
$idquestiona=$_GET['id'];

$queryp="SELECT * FROM posts WHERE id=$idquestiona";
$resultp = mysqli_query($link, $queryp);
$rowp = mysqli_fetch_array($resultp);
$idvprasalca=$rowp['id_usera'];
$headlinee=$rowp['headline'];
$detailss=$rowp['details'];
$datee=$rowp['date_posted'];

$queryvp="SELECT * FROM users WHERE id=$idvprasalca";
$resultvp = mysqli_query($link, $queryvp);
$rowvp=mysqli_fetch_array($resultvp);
$imevp=$rowvp['username'];

$avatarvp=$rowvp['avatar'];

$idquestiona=$rowp['id'];
$querytq="SELECT id_topica FROM topics_posts WHERE id_post=$idquestiona";
$resulttq=mysqli_query($link, $querytq);
$rowtq=mysqli_fetch_array($resulttq);
$idtopica=$rowtq['id_topica'];
$queryto="SELECT topic FROM topics WHERE id=$idtopica";
$resultto=mysqli_query($link, $queryto);
$rowto=mysqli_fetch_array($resultto);
$topicc=$rowto['topic'];

?>
<div align="center">
<div class="col-lg-7">
<div class="ui-block">

               <article class="hentry post">
                  <div class="m-link">

                        <h4><?php echo $headlinee ?></h4>

                  </div>

                  <div class="post__author author vcard inline-items">
                     <img src=<?php echo "$avatarvp" ?> alt="author">
                     <div class="author-date">
                        <a class="h6 post__author-name fn"><?php echo $imevp; ?></a>
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
                    <!-- odg -->
                    <form action="comments_inserting.php" method="post">
                    <textarea placeholder="Your comment" rows = "3" cols = "70" name="comment"></textarea> <br> <br>
                    <input type="hidden" name="idpitanja" value="<?php echo $idquestiona;?>">
                    <input type="submit" class="btn btn-sm btn-light" value="Comment">
                    </form>
                  </div>
               </article>
                     </div>
                       </div>
                 <!-- Comments -->

         <?php
                     $querya="SELECT * FROM comments WHERE id_questiona=$idquestiona ORDER BY upvote DESC";
                     $resulta = mysqli_query($link, $querya);
                     while ($rowa = mysqli_fetch_array($resulta)) {
                        $idodgovaralca=$rowa['id_usera'];
                        $odgovor=$rowa['answer'];
                        $idodgovora=$rowa['id'];
                        $datum=$rowa['date_commented'];
                        $upvotes=$rowa['upvote'];
                        $downvotes=$rowa['downvote'];
                        //ime, priimek
                        $queryodg="SELECT * FROM users WHERE id=$idodgovaralca";
                        $resultodg = mysqli_query($link, $queryodg);
                        $rowodg=mysqli_fetch_array($resultodg);
                        $imeodg=$rowodg['username'];

                        //avatar na postu
                        $slikaodg=$rowodg['avatar'];
                        ?>
                        <div class="col-lg-7">
            <div class="ui-block">

               <article class="hentry post">
                  <div class="post__author author vcard inline-items">
                     <img src=<?php echo "$slikaodg" ?> alt="author">
                     <div class="author-date">
                        <a class="h6 post__author-name fn"><?php echo $imeodg; ?></a>
                        <?php
                                                                                          if($_SESSION['tipu'] == 2) {
                                                                                      ?>
                                            <br>  <a href="deleting_comments.php?id=<?php echo $idodgovora;?>" class="btn btn-sm btn-light bg-light color-red"> Delete</a>
                                                                                      <?php
                                                                                        }?>
                        <div class="post__date">
                           <time class="published" datetime="2004-07-24T18:18">
                           <?php echo $datum; ?>
                           </time>
                           <br> <br>
                           <p><?php echo $odgovor;?> </p>
                           <br> <br>
                           <p>
                         <?php echo "This has:", " ", $upvotes, " ", "upvotes!", "  "; ?>
                         <?php $pritisnuto = 0;
                               $pritisnuto1 = 0;

                                 ?>
                                <a href="upvoting.php?id=<?php echo $idodgovora;?>" class="btn btn-sm btn-light"> Upvote</a>
                     </p>
                     <?php echo "This has:", " ", $downvotes, " ", "downvotes!", "  "; ?>
                     <?php $pritisnuto = 0;
                           $pritisnuto1 = 0;

                             ?>
                            <a href="downvoting.php?id=<?php echo $idodgovora;?>" class="btn btn-sm btn-light"> Downvote</a>
                        </div>
                     </div>
                     </div>
                  </div>
               </article>
                     </div>
                       <?php } ?>

</body>
