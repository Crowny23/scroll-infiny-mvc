<?php
class ModelPost extends Model
{
    public function listAll()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT * FROM `posts` ORDER BY `id_post` DESC');
        $posts = [];
        while ($p = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($p);
        }
        $req->closeCursor();

        return json_encode($posts);
    }

    public function readPost($id)
    {
        $db  = $this->getdb();
        $req = $db->prepare("SELECT * FROM `posts` WHERE `id_post` = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();

        return json_encode(new Post($req->fetch(PDO::FETCH_ASSOC)));
    }
}
