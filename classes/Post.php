<?php 
class Post implements JsonSerializable {
    private $_id_post;
    private $_title_post;
    private $_content_post;

    public function __construct (array $datas) {
        $this->hydrate($datas); 
    }

    private function hydrate(array $datas) {
        foreach ($datas as $key => $value){
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId_post(){
        return $this->_id_post;
    }

    public function getTitle_post(){
        return $this->_title_post;
    }

    public function getContent_post(){
        return $this->_content_post;
    }


    public function setId_post($id_post){
        $this->_id_post = $id_post;
    }

    public function setTitle_post($title){
        $this->_title_post = $title;
    }

    public function setContent_post($content){
        $this->_content_post = $content;
    }

    public function jsonSerialize(){
        return 
        [
            'id' => $this->_id_post,
            'title' => $this->_title_post,
            'content' => $this->_content_post
        ];
    }

}