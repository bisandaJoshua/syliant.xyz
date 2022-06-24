<main class="container">
    <?php
        // display login error messages here. 
        if (!empty($view_bag['status'])) {
        echo '<div class="container col-sm-6 mx-auto alert alert-danger" role="alert">';
        echo $view_bag['status'];
        echo '</div>';
        }
    ?>
    <div class="row">
        <div class="col-md-5">
            <h1 class="mt-3"><?= ucwords($model->challenge_title);?></h1>
        </div>
        <div class="col-md-7">
            <h6 class="mt-5">Challenge by : <i><?= ucwords($model->challenge_owner); ?></i></h6>
        </div>
    </div>
    <div class="col-md-8">
        <div class="p-5 bg-light rounded-3">
            <h5>Category: <?= ucwords($model->challenge_category);?></h5>
            <h6>Challenge worth: <?= $model->challenge_points;?> Points</h6>
            <p><?= $model->challenge_description;?></p>

            <?php 
                // check whether the challenge involves an uploaded file and show link
                if (!empty($model->challenge_resource_url)){
                    echo ' <p>Download file: <a href="./_uploads/' . $model->challenge_resource_url . '">Challenge File</a></p>
                    ';
                }
            ?>

            <div class="accordion accordion-flush rounded-3 col-md-8" id="hintAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Show Hint
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#hintAccordion">
                        <div class="accordion-body"><?= $model->challenge_hint;?></div>
                    </div>
                </div>
            </div> <br>

            <form class="d-flex" action="challenge.php" method="post">
                <input class="form-control me-2" type="text" placeholder="flag{your_solution}" name="user_flag">
                <input type="hidden" name="challenge_id" value="<?= $model->challenge_id;?>">
                <input class="btn btn-outline-primary" type="submit" value="Submit Solution" name="submit_solution">
            </form>
        </div>
    </div>    
</main>