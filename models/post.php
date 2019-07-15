<?php
class Post
{
    public $id;
    public $title;
    public $content;
    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
    public static function all()
    {
        $list = [];
        try {
            $db = DB::getInstance();
            $req = $db->query('SELECT * FROM posts');
            foreach ($req->fetchAll() as $item) {
                $list[] = new Post($item['id'], $item['title'], $item['content']);
            }
            return $list;
        } catch (Exception $e) {
            print("Error: "+$e);
        }
    }
    public static function add($post)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "INSERT INTO POSTS (`title`,`content`)
            VALUES('" . $post->title . "','" . $post->content . "')";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Add success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something's wrong. Please try again!";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }
    public static function delete($post)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "DELETE FROM POSTS WHERE id = " . $post->id . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Delete success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something's wrong. Please try again!";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }
    public static function update($post)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "UPDATE POSTS SET
            title='" . $post->title . "',
            content='" . $post->content . "'
                WHERE id=" . $post->id . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Update success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something's wrong. Please try again!";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }
    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['id'])) {
            return new Post($item['id'], $item['title'], $item['content']);
        }
        return null;
    }
    public static function search($title)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM posts WHERE title LIKE '%title%'');
        $req->execute();
        $item = $req->fetchAll();
        $req->closeCursor(); 
        return $item;
    } 

}