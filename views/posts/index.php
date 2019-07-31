<!-- Tất cả các file css or library của JS thì nên import trong layout ---  -->

<div class="col-xl-12">
<a href="index.php?controller=posts&action=add" type="button" class="btn btn-primary">Create new post</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- Ở đây e dùng form --- nên default khi click button nó sẽ call action của form -->
<!-- <form class="searchbar" action="" method="GET"> -->
  <!-- <input type="hidden" name="controller" value="posts"> -->
  <!-- <input type="hidden" name="action" value="search"> -->
  <input type="text" class="search-box" id="myInput" name="input" placeholder="Search for titles.." title="Type in a title">
  <i class="fa fa-search"></i> 
  <button type="submit" class="submit" onclick="handleClick();">Tìm kiếm</button>
<!-- </form> -->

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

  <script>
    function Validate(keySearch)
    {
      //Regex for Valid Characters i.e. Alphabets, Numbers and Space.
      var regex = /^[A-Za-z0-9 ]/
      let result = {
        status:false,
      };
      //Validate TextBox value against the Regex.
      var isValid = regex.test(keySearch);
      if (isValid) 
      {
        // Sai cú pháp --- cái này là cú pháp của PHP ---- copy nhiệt tình vậy em @@~ 
        result.status = true;
      }
      else{
        result.status = false;
      } 
      return result;
      
    }

    function search(input){
      // ???? ???? input của em là cái gì vậy @@~ 
      $.ajax({
          url : "/index.php?controller=posts&action=search",
          type : "POST",
          data : {
               input:input
          },
          success : function (response){
            console.log("response>>>>",response)
						// const result = $.parseJSON(response)
						// // Case Success ->>>
            //   if(result.status)
						// 	{
						// 		alert(response.status);
						// 	}
          }
      });
    }
    
    function handleClick()
    {
      //Bước 1: lấy value -- key search 
      //Bước 2: Gọi hàm validate ---> để check key search hợp lệ hay k
      // Bước 3 call Ajax search ==> 
      // Hiện tại đang bug vì Controller e viết sai ... 

      const keySearch = document.getElementById("myInput").value;
      // e.preventDefault();
      let checkString = Validate(keySearch);
      if(checkString.status === true)
      {
        console.log("keyseach>>>",keySearch)
        search(keySearch) 
      }        
    }
  </script>

</div>


