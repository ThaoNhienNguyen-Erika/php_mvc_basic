<?php
require_once 'controllers/base_controller.php';
require_once 'models/post.php';
class PostsController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'posts';
    }
    public function error()
    {
        $this->render('error');
    }
    public function index()
    {
        $posts = Post::all();
        $data = array('posts' => $posts);
        $this->render('index', $data);
    }
    public function add()
    {
        if (isset($_POST['submit'])) {
            $titlePost = $_POST['titlePost'];
            $contentPost = $_POST['contentPost'];
            $post = new Post(-1, $titlePost, $contentPost);
            $result = Post::add($post);
            $result = array('result' => $result);
            $this->render('add', $result);
        } else {
            $this->render('add');
        }
    }
    public function delete()
    {
         # Tìm kiếm post ->
         $post = Post::find($_GET['id']);
         $result = Post::delete($post);
         # Delete xong thì query lại data 
         # Rồi render lại home  
         $posts = Post::all();
         $data = array('posts' => $posts);
         $this->render('index', $data);    
    }
    public function update()
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['idPost'];
            $titlePost = $_POST['titlePost'];
            $contentPost = $_POST['contentPost'];
            $post = new Post($id, $titlePost, $contentPost);
            $result = Post::update($post);
            $result = array('result' => $result);
            $this->render('update', $result);
        } else {
            $post = Post::find($_GET['id']);
            $data = array('post' => $post);
            $this->render('update', $data);
        }
    }
    public function search()
    {
        // $_POST là biến để lấy dữ liệu --- key search 
        // Ở dưới mình dùng Ajax bắn data: {  
        // input:input
        //}
        // Tức là cái field truyền lên là input --> 
       
        if (isset($_POST['input'])) {
            # Get id từ URL
            $id = $_POST['input'];
            $status = Post::search($id);
            echo json_encode($status);
            die();
        }
        /*if(isset($_GET['input'])) {
        $input = $_GET['input'];
        }
        $posts = Post::search($input);
        $data = array('posts' => $posts);
        $this->render('search', $data);*/
    }
    // # example AJAX delete -----
    // public function searchAjax()
    // {
    //     if (isset($_POST['id'])) {
    //         # Get id từ URL
    //         $id = $_POST['id'];
    //         $status = Post::deleteAjax($id);
    //         echo json_encode($status);
    //         die();
    //     }
    // }
    // public function searchold()
    // {
    //     if (isset($_GET['input_title']))
    //     {
    //         $result = Post::search($post);
    //         $result = array('result' => $result);
    //         $_GET = array();
    //         $this->render('index', $result);
    //     }
    //     else{
    //         $posts = Post::all();
    //         $data = array('posts' => $posts);
    //         $this->render('index', $data);  
    //     }

    //     // Retrieve the posted search term.
    //    # $search_term = $this->title->post('search');

    //     // Use a model to retrieve the results.
    //     # $data['results'] = $this->search_model->get_results($search_term);

    //     // Pass the results to the view.
    //     # $this->load->view('search_results',$data);
    // }
}