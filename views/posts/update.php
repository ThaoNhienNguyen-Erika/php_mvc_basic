<div class="col-xl-12">
    <a href="index.php" type="button" class="btn btn-primary">Back to list</a>
</div>
<div class="col-xl-12">
    <form class="mt-3" action="index.php?controller=posts&action=update&id=<?php echo $post->id ?>" method="POST">
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
        <input type="hidden" name="idPost" value="<?php echo $post->id?>"/>
    <div class="form-group">
        <label for="title-post">Title post</label>
        <input type="text" name="titlePost" class="form-control" value="<?php  if(isset($post->title)) {echo $post->title;} ?>" id="title-post" aria-describedby="emailHelp" placeholder="Enter title post">
    </div>
    <div class="form-group">
        <label for="content-post">Content post</label>
        <input type="text" name="contentPost" class="form-control" value="<?php  if(isset($post->title)) {echo $post->content;} ?>" id="content-post" placeholder="Content...">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>