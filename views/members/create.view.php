<div class="modal fade" id="newChallengeModal" data-bs-backdrop="static" aria-labelledby="newChallengeModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create A New Challenge</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Kindly enter the details of your challenge below. If your challenge involves users downloading a file, don't forget to upload it in the resource section.
        </p>
        <form action="create.php" method="post" class="p-3" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <input type="text" class="form-control" name="challenge_title" placeholder="Challenge Title" aria-label="Challenge Title">
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <select class="form-select" name="challenge_category" aria-label="Challenge Category">
                        <option selected>Choose A Category</option>
                        <option value="cryptography">Cryptography</option>
                        <option value="Scripting">Scripting</option>
                        <option value="linux">Linux</option>
                        <option value="general knowledge">General Knowledge</option>
                        <option value="web security">Web Security</option>
                        <option value="digital forensics">Digital Forensics</option>
                        <option value="digital forensics">Reverse Engineering</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <textarea name="challenge_description" class="form-control" id="tutorial-description" placeholder="Enter your challenge description here..." cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <input type="text" class="form-control" name="challenge_solution" placeholder="Challenge Solution - flag{solution_in_here}" aria-label="Challenge Title">
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <input type="number" name="challenge_points" class="form-control" id="challenge_points" placeholder="Allocate Points eg. 20">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="challenge_resource" class="form-label">Resources - Upload any files related to your challenge.</label>
                    <input class="form-control" type="file" id="challenge_resource" name="challenge_resource">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="challenge_hint" placeholder="Any hints to aid students?" aria-label="Challenge Hint">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="post_challenge" value="Post Challenge" class="btn btn-success">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newTutorialModal" data-bs-backdrop="static" aria-labelledby="newTutorialModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create A New Tutorial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            You can enter the details of your tutorial below and submit the tutorial to publish and make it accessible to all students on the site.
        </p>
        <form action="create.php" method="post" class="p-3">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <input type="text" class="form-control" name="tutorial_title" placeholder="Tutorial Title" aria-label="tutorial_title">
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Choose A Category</option>
                        <option value="cryptography">Cryptography</option>
                        <option value="scripting">Scripting</option>
                        <option value="Linux">Linux</option>
                        <option value="general knowledge">General Knowledge</option>
                        <option value="web security">Web Security</option>
                        <option value="digital forensics">Digital Forensics</option>
                        <option value="digital forensics">Reverse Engineering</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <textarea name="tutorial_description" class="form-control" id="tutorial-description" placeholder="Start typing your tutorial here..." cols="30" rows="8"></textarea>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="publish_tutorial" value="Publish Tutorial" class="btn btn-primary">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<main class="container">
    <!-- <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"><?= $view_bag['heading'];?></h1>
            <p class="col-md-8 fs-4">This is the creation hub. This area allows teachers to create content for students to use as study material or as exercises to hone their skills and increase their understanding of specific concepts. Everything created in this section will be accessible to all students of all institutions, and they can collaborate in learning and tackling the challenges presented to them here.</p>
        </div>
        
    </div> -->
    <?php
        // display login error messages here. 
        if (!empty($view_bag['status'])) {
        echo '<div class="container col-sm-5 mx-auto alert alert-warning" role="alert">';
        echo $view_bag['status'];
        echo '</div>';
        }
    ?>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2>New Challenge</h2>
            <p>
                As a teacher, you can create a new exercise or challenge for students to solve. The challenges are geared towards reinforcing certain concepts so that the students grasp them fully. You can specify the category in which the challenge falls, and add the proposed solution to your challenge. 
            </p>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#newChallengeModal">Create New Challenge +</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>New Tutorial</h2>
            <p>As a teacher, you can also create new posts that act as tutorials that guide students and introduce them to new concepts. These posts will be visible to students on their home page and students can comment on the posts or ask questions.</p>
            <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#newTutorialModal">Create A New Tutorial +</button>
            </div>
        </div>
    </div>
</main>
