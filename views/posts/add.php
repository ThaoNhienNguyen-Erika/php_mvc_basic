<div class="col-xl-12">
    <a href="index.php" type="button" class="btn btn-primary">Back to list</a>
</div>
<div class="col-xl-12">
    <form action="index.php?controller=posts&action=add" method="POST" class="mt-3">
        <?php 
            if (isset($result)){
                if($result['status'] === true) {
                    echo '<div class="alert alert-success" role="alert">
                    ' .$result['message']. '
                </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    ' .$result['message']. '
                </div>';
            }
        }
        ?>
    <div class="form-group">
        <label for="title-post">Title post</label>
        <input type="text" name="titlePost" class="form-control" id="title-post" aria-describedby="emailHelp" placeholder="Enter title post">
    </div>
    <div class="form-group">
        <label for="content-post">Content post</label>
        <input type="text" name="contentPost" class="form-control" id="content-post" placeholder="Content...">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>