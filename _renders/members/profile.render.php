<main class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-3"><i class="bi-person-circle"></i> <?= ucwords($data_model->user_fn) . ' ' . ucwords($data_model->user_ln);?></h1>
            <p class="lead">
                Below are your details. Features to allow editing your details are currently in development.
            </p>
        </div>
        <div class="container lead">
                <div><strong><i class="bi-envelope-fill"></i> Email Address</strong>: <?= $data_model->user_email; ?></div>
                <div><strong><i class="bi-book-fill"></i> Rank</strong>: <?= ucwords($data_model->user_account_type); ?></div>
                <div><strong><i class="bi-gem"></i> Points</strong>: <?= $data_model->user_points; ?></div>
                <div><strong><i class="bi-globe"></i> Country</strong>: <?= $data_model->user_country; ?></div>
                <div><strong><i class="bi-pen-fill"></i> About Me</strong>: <?= $data_model->user_bio; ?></div>
            </ul>
        </div>
    </div>
    
</main>