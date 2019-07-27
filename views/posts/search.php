<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="col-xl-12">
<a href="index.php?controller=posts&action=add" type="button" class="btn btn-primary">Create new post</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="index.php?controller=posts" type="button" class="btn btn-primary">Back to list</a>

  <table class="table mt-3" id="myTable">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title post</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($posts as $post) {
        echo '<tr>';
        echo '<td scope="row">
                ' . $post->id . '
              </td>';
        echo '<td scope="row">
              ' . $post->title . '
          </td>';
        echo '<td scope="row">
          ' . $post->content . '
        </td>';
        # Ở đây thêm cái Id model Post để bật đúng POPUP nhé "> 
        echo '<td scope="row">
          <a class="btn btn-warning" href="index.php?controller=posts&action=update&id=' .$post->id. '">Update</a>
          

          <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal' .$post->id. '" href="index.php?controller=posts&action=delete&id=' .$post->id. '"> DELETE </a>
        
          <!-- Modal -->
          <div class="modal fade" id="exampleModal' .$post->id. '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body"> Do you want to delete this? </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                  <a class="btn btn-primary" href="index.php?controller=posts&action=delete&id='.$post->id.'" >YES</a>
                </div>
              </div>
            </div>
          </div>
        </td>';
        echo '</tr>';
    }
    ?>
    </tbody>
  </table>
</div>


