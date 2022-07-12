<?php
class ControllerPost extends Controller{
    public function listPosts(){
        $manager = new ModelPost();
        echo $manager->listAll();
    }
    public function post(array $data){
        $manager = new ModelPost();
        echo $manager->readPost($data['id']);
    }
    public function homepage(){
        $twig = Controller::twigControl();
        echo $twig->render('homepage.html.twig');
    }
}
