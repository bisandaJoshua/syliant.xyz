<main class="container">
    <h1 class="mt-3"><?= $data_set['heading'];?></h1>
    <p class="lead">
        This is the student leaderboard, showcasing rankings of students based on the number and level of challenges they have solved. It is by no means an indication of which students are the best, but could be used to show which students have managed to solve challenges and to what degree.
    </p>

    <table class="table table-light">
          <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Institution</th>
                <th scope="col">Country</th>
                <th scope="col">Points</th>
                </tr>
            </thead>
        <?php $rank = 1;?>    
        <?php foreach($data_model as $student):?>
            <tr>
                <td><?= $rank;?></td>
                <td><?= ucwords($student->user_fn . ' ' . $student->user_ln);?></td>
                <td><?= ucwords($student->user_school);?></td>
                <td><?= ucwords($student->user_country);?></td>
                <td><?= $student->user_points;?></td>
            </tr>
            <?php $rank = $rank + 1;?>
        <?php endforeach;?>
    </table>
</main>