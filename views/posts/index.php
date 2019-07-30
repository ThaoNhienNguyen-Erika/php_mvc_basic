<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="col-xl-12">
<a href="index.php?controller=posts&action=add" type="button" class="btn btn-primary">Create new post</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<form class="searchbar" action="" method="GET">
  <input type="hidden" name="controller" value="posts">
  <input type="hidden" name="action" value="search">
  <input type="text" class="search-box" id="myInput" name="input" placeholder="Search for titles.." title="Type in a title">
  <i class="fa fa-search"></i> 
  <button type="submit" class="submit" onclick="Validate()" data-toggle="modal" data-target="#Modal">Tìm kiếm</button>
</form>

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

          <!-- Modal -->
          <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body"> 
                  <div class="alert alert-warning" id="result-search"> Không nhập các kí tự đặc biệt. Mời bạn nhập lại. </div>
                </div>
                <div class="modal-footer">
                  <button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
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

  <script>
    function Validate()
    {
      //Regex for Valid Characters i.e. Alphabets, Numbers and Space.
      var regex = /^[A-Za-z0-9 ]/

      //Validate TextBox value against the Regex.
      var isValid = regex.test(document.getElementById("myInput").value);
      if (!isValid) 
      {
        $result['status'] = false;
        $result['message'] = "Something's wrong. Please try again!";
      }
      else{
        $result['status'] = true;
        $result['message'] = "Delete success";
      } 
      //alert("Không nhập các kí tự đặc biệt. Mời bạn nhập lại.");
    }

    function search(input){
      $.ajax({
          url : "/index.php?controller=posts&action=search",
          type : "post",
          data : {
               input:input
          },
          success : function (response){
            console.log("response>>>>",response)
						const result = $.parseJSON(response)
						// Case Delete Success ->>>
              if(result.status)
							{
								// Show message lên popup
								$(`#result-search`).html();
								$(`#result-search`).html(result.message);
								// Chỉnh style message
								$(`#result-search`).removeClass("alert-warning");
								$(`#result-search`).addClass("alert-success");
								//Bỏ nút xóa --- thay nút Cancel = OK
								$(`#btn-cancel`).html("OK");
							}
							//Case delete fail ->>>
							else {
								//Show message
								$(`#result-search`).html();
								$(`#result-search`).html(result.message);
								// Chỉnh style message
								$(`#result-search`).removeClass("alert-warning")
								$(`#result-search`).addClass("alert-danger")
							}
          }
      });
    }
  </script>

</div>


