<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-3"><?= $view_bag['heading'] ?></h1>

            <?php foreach( $model as $tutorial ):?>
                <div class="bg-light p-3 rounded-3 mb-3">
                    <header class="row">
                        <div class="col text-primary"><h3><?= ucwords($tutorial->tutorial_title);?></h3></div>
                        <div class="col pt-2 text-end"><span>[Posted on:  <?= ucwords($tutorial->tutorial_date);?>]</span></div>
                    </header>
                    <span class="bg-secondary p-1 rounded-3 text-white">Category: <?= ucwords($tutorial->tutorial_category);?></span>
                    <p class="p-2"><?= substr($tutorial->tutorial_description, 0, 300);?>...</p>
                    <footer class="row">
                        <div class="col text-secondary">
                            Tutorial By: <?= ucwords($tutorial->tutorial_owner);?>
                        </div>
                        <div class="col text-end">
                            <a href="tutorial.php?tut_id=<?= $tutorial->tutorial_id;?>" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </footer>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
