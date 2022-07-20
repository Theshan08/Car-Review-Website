<?php
include('includes/config.php');

$page_title = "Home Page";
$meta_description = "Car Review website";
$meta_keywords = "";

include('includes/header.php');
include('includes/navbar.php');
?>




<div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="assets/images/paul_dom.gif" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Cars!!!</h1>
                <p>A true car guy will not compare his car with others. He will always love the car and always turn back to see his car after the car being parked. </p>
            </div>
        </div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Latest Posts</h3>
                <div class="underline"></div>

                <?php
                    $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12"; 
                    $homePosts_run = mysqli_query($con, $homePosts);
        
                    if(mysqli_num_rows($homePosts_run) > 0)
                    {
                        foreach($homePosts_run as $homePostItem)
                        {
                            ?>
                                <div class="mb-3">
                                    <a class="text-decoration-none" href="<?= base_url('post/'.$homePostItem['slug']) ?>">
                                        <div class="card shadow-sm p-2 bg-light">
                                            <h5><?= $homePostItem['name']; ?></h5>
                                            <label class="text-dark me-2 fs-6">Posted On: <?= date('d-M-Y', strtotime($homePostItem['created_at'])); ?></label>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    }
                ?>

            

            
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
