<?php
require_once 'controllers/base_controller.php';
require_once 'models/post.php';
class PostsController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'posts';
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
            $_POST = array();
            $this->render('add', $result);
        } else {
            $this->render('add');
        }
    }
    public function delete()
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['idPost'];
            $titlePost = $_POST['titlePost'];
            $contentPost = $_POST['contentPost'];
            $post = new Post($id, $titlePost, $contentPost);
            $result = Post::delete($post);
            $result = array('result' => $result);
            $_POST = array();
            $this->render('delete', $result);
        } else {
            $post = Post::find($_GET['id']);
            $data = array('post' => $post);
            $this->render('delete', $data);
        }
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
            $_POST = array();
            $this->render('update', $result);
        } else {
            $post = Post::find($_GET['id']);
            $data = array('post' => $post);
            $this->render('update', $data);
        }
    }
}