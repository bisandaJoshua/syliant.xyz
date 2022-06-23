<main class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-5"><?= $view_bag['heading'] ?></h1>
        </div>
        <div class="row">
            <h2><?= ucwords($model->user_fn) . ' ' . ucwords($model->user_ln);?></h2>
            <ul>
                <li><strong>Email Address</strong>: <?= $model->user_email; ?></li>
                <li><strong>Rank</strong>: <?= ucwords($model->user_account_type); ?></li>
                <li><strong>Points</strong>: <?= $model->user_points; ?></li>
                <li><strong>Country</strong>: <?= $model->user_country; ?></li>
                <li><strong>About Me</strong>: <?= $model->user_bio; ?></li>
            </ul>
        </div>
    </div>
    
</main>