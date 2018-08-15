<?php

    class Comments extends Controller{

        public function __construct(){
            $this->userModel = $this->model('user');
            $this->postModel = $this->model('post');
            $this->commentModel = $this->model('comment');
        }

        public function index(){
            Redirect::to('');
        }

        public function like($id){
            if(!$id){
                Redirect::to('');
            }

            $fetch_comment = $this->commentModel->fetchOneComment($id);
            $like = $this->commentModel->likeComment($this->userModel->data()->user_name, $fetch_comment->comment_post_id, $fetch_comment->comment_id);
            if($this->userModel->isLoggedIn()){

                if($like){
                    $result = $fetch_comment->comment_likes + 1;
                    $this->commentModel->likeCount($id, $result);
                    Redirect::to('posts/show/'. $fetch_comment->comment_post_id);
                }
            } else {
                checkAndFlash('like_alert', 'Please login first', 'alert alert-danger');
                Redirect::to("posts/show/".($fetch_comment->comment_post_id));
            }
            
           
            
        }

        public function dislike($id){
            $dislike = $this->commentModel->dislikeComment($id, $this->userModel->data()->user_name);

            if($dislike){
                $fetch_comment = $this->commentModel->fetchOneComment($id);
                $result = $fetch_comment->comment_likes - 1;
                $this->commentModel->likeCount($id, $result);
            }
            Redirect::to('posts/show/'. $fetch_comment->comment_post_id);
        }
    }