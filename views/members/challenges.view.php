<main class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-5"><?= $view_bag['heading'] ?></h1>
        </div>
        <div class="row container">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search for a particular challenge..." aria-label="Search">
                <input class="btn btn-outline-success" type="submit" value="Search">
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($model as $challenge):?>
                <div class="col">
                    <?php 
                        if ($challenge->challenge_points > 50){
                            echo '<div class="card text-bg-danger">';
                        } elseif ($challenge->challenge_points < 20){
                            echo '<div class="card text-bg-success">';
                        } else {
                            echo '<div class="card text-bg-light">';
                        }
                    ?>
                        <div class="card-header">Category: <?= ucwords($challenge->challenge_category);?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $challenge->challenge_title;?></h5>
                            <p class="card-text"><?= substr($challenge->challenge_description, 0, 100);?>...</p>
                            <?php if ( str_contains($challenge->challenge_solvers, $view_bag['user_mail'])):?>
                                <a href="#" class="btn btn-outline-dark disabled">Already Solved</a>
                            <?php else: ?>
                                <a href="challenge.php?chid=<?= $challenge->challenge_id;?>" class="btn btn-outline-dark">Solve</a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    
</main>