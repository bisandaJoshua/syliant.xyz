<main class="container">
    <h1 class="mt-3 text-decoration-underline"><?= ucwords($data_model->tutorial_title);?></h1>
    <section class="bg-light p-3 rounded-3">
        <h5 class="text-secondary">Tutorial by : <?= ucwords($data_model->tutorial_owner); ?></h2>
        <h6 class="text-secondary">Category: <?= ucwords($data_model->tutorial_category);?></h3>
        <p>
            <?= $data_model->tutorial_description;?>
        </p>
        <p> Download the tutorial PDF Here: <a href="./_uploads/<?= $data_model->tutorial_resource_url;?>">Tutorial PDF</a></p>
    </section>
</main>