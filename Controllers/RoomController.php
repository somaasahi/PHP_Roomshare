<?php

require_once(ROOT_PATH .'/Models/View_user.php');
require_once(ROOT_PATH .'/Models/Post_user.php');
require_once(ROOT_PATH .'/Models/Admin_user.php');
require_once(ROOT_PATH .'/Models/Contact.php');

class RoomController {
  private $request;


      public function __construct() {
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        $this->View_user = new View_user();
        $this->Post_user = new Post_user();
        $this->Admin_user = new Admin_user();
        $this->Contact = new Contact();
      }


      public function post_register(){
        $this->Post_user->post_register($this->request['post']);
      }

      public function post_login(){
        $result = $this->Post_user->post_login($this->request['post']);
        return $result;
      }

      public function mypost(){
        $result = $this->Post_user->mypost($this->request['post']['id']);
        return $result;
      }

      public function post_forget(){
        $result = $this->Post_user->post_forget($this->request['post']);
        return $result;
      }

      public function post_my_update(){
        $this->Post_user->post_my_update($this->request['post']);
      }

      public function post_pass_update(){
        $this->Post_user->post_pass_update($this->request['post']['form']);
      }

      public function post(){
        $this->Post_user->post($this->request['post']);
      }

      public function post_view(){
        $result = $this->Post_user->post_view($this->request['get']['id']);
        return $result;
      }

      public function re_post(){
        $this->Post_user->re_post($this->request['post']);
      }

      public function post_delete(){
        $this->Post_user->post_delete($this->request['get']['id']);
      }


      ////////////////////////////////////////////////////


      public function view_register(){
        $this->View_user->view_register($this->request['post']);
      }

      public function view_login(){
        $result = $this->View_user->view_login($this->request['post']);
        return $result;
      }

      public function mylikes(){
        $result = $this->View_user->mylikes($this->request['post']['id']);
        return $result;
      }

      public function view_pass_forget(){
        $result = $this->View_user->view_pass_forget($this->request['post']);
        return $result;
      }

      public function view_pass_update(){
        $this->View_user->view_pass_update($this->request['post']['form']);
      }

      public function view_my_update(){
        $this->View_user->view_my_update($this->request['post']);
      }

      public function view_area_index() {
        $page = 0;
        if(isset($this->request['get']['page'])){
          $page = $this->request['get']['page'];
        }

        $posts = $this->View_user->area_findall($this->request['post']['area_id'],$page);
        $posts_count = $this->View_user->area_countALl();
        $params = [
          'posts' => $posts,
          'pages' => $posts_count / 7
        ];
        return $params;
      }

      public function view_key_index() {
        $page = 0;
        if(isset($this->request['get']['page'])){
          $page = $this->request['get']['page'];
        }

        $posts = $this->View_user->key_findall($this->request['post']['key'],$page);
        $posts_count = $this->View_user->key_countALl();
        $params = [
          'posts' => $posts,
          'pages' => $posts_count / 7
        ];
        return $params;
      }

      public function view_view(){
        $result = $this->View_user->view_view($this->request['get']['id']);
        return $result;
      }

      public function isGood($post_id,$view_user_id){
        $result = $this->View_user->checkGood($post_id,$view_user_id);
        return $result;
      }

      public function checkGood($post_id,$view_user_id){
        $result = $this->View_user->checkGood($post_id,$view_user_id);
        if($result == 0){
          $this->View_user->saveGood($post_id,$view_user_id);
        }else{
        $this->View_user->deleteGood($post_id,$view_user_id);
        }
      }


      ///////////////////////////////////////////////////////////////////////////

      public function poster_index() {
        $page = 0;
        if(isset($this->request['get']['page'])){
          $page = $this->request['get']['page'];
        }

        $users = $this->Admin_user->poster_findall($page);
        $posts_count = $this->Admin_user->poster_countALl();
        $params = [
          'users' => $users,
          'pages' => $posts_count / 7
        ];
        return $params;
      }

      public function viewer_index() {
        $page = 0;
        if(isset($this->request['get']['page'])){
          $page = $this->request['get']['page'];
        }

        $users = $this->Admin_user->viewer_findall($page);
        $posts_count = $this->Admin_user->viewer_countALl();
        $params = [
          'users' => $users,
          'pages' => $posts_count / 7
        ];
        return $params;
      }
      public function post_index() {
        $page = 0;
        if(isset($this->request['get']['page'])){
          $page = $this->request['get']['page'];
        }

        $posts = $this->Admin_user->post_findall($page);
        $posts_count = $this->Admin_user->post_countALl();
        $params = [
          'posts' => $posts,
          'pages' => $posts_count / 7
        ];
        return $params;
      }


      public function poster_delete(){
        $this->Admin_user->poster_delete($this->request['get']['id']);
      }

      public function viewer_delete(){
        $this->Admin_user->viewer_delete($this->request['get']['id']);
      }

      public function admin_post_delete(){
        $this->Admin_user->admin_post_delete($this->request['get']['id']);
      }

      ////////////////////////////////////////////////////////////////////


      public function get_contact_data(){
        $result = $this->Contact->get_contact_data($this->request['post']);
        return $result;
      }

      public function contact_submit($contact){
        $this->Contact->contact_submit($contact);
      }

}
