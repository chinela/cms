<?php

    class Posts extends Controller{

        public function __construct(){
            $this->postModel = $this->model('post');
            $this->categoryModel = $this->model('category');
            $this->userModel = $this->model('user');
            $this->commentModel = $this->model('comment');
        }

        public function index(){

            $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
            if($this->userModel->isAdmin()){
                $fetch_posts = $this->postModel->getAllPostsByOrderAndLimit();
                $data = [
                    'posts' => $fetch_posts,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    'user' => $this->userModel->data()
                ];
                $this->view('posts/index', $data);
            } else {
                $fetch_posts = $this->postModel->getPublishedPost();
                $data = [
                    'posts' => $fetch_posts,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    'user' => $this->userModel->data()
                ];
                $this->view('posts/index', $data);
            }            
        
        }

        public function show($id){
            if(!$id){
                Redirect::to('');
            }
            $fetch_posts = $this->postModel->getOnePost($id);
            $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
            $fetch_comments = $this->commentModel->getAllCommentsByOrder($id);
            $fetch_likes = $this->commentModel->fetchAllLikes();
            // dd($fetch_likes[0]);
            // $result = $fetch_posts[0]->post_views_count + 1;
           
            if(!$fetch_posts){
                Redirect::to('');
            }
            if($this->userModel->isLoggedIn()){
                $data=[
                    'post' => $fetch_posts,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    // 'views' => $result,
                    'comments' => $fetch_comments,
                    'likes' => $fetch_likes,
                    'user' => $this->userModel->data()->user_name
                ];
    
                // $this->postModel->viewsCount($id, $data['views']);
                
                $this->view('posts/show', $data);
            } else {
                $data=[
                    'post' => $fetch_posts,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => '',
                    // 'views' => $result,
                    'comments' => $fetch_comments,
                    'likes' => $fetch_likes,
                    'user' => ''
                ];
    
                // $this->postModel->viewsCount($id, $data['views']);
                
                $this->view('posts/show', $data);
            }
        }

        public function search(){
            if(Input::exists()){

                $validate =  new Validate();

                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true,
                        'preg' => '/^[a-zA-Z ]*$/'
                    )
                ));

                if($validate->passed()){
                    $fetch_posts = $this->postModel->searchPosts(array(
                        'post_tags' => '%'.sanitize(Input::get('name')).'%',
                        'post_author' =>  '%'.sanitize(Input::get('name')).'%',
                        'post_title' =>  '%'.sanitize(Input::get('name')).'%'
                    ));

                    $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                    
                    if($fetch_posts){
                        $data = [
                            'posts' => $fetch_posts,
                            'categories' => $fetch_categories,
                            'name_err' => '',
                            'password_err' => '',
                            'email_err' => '',
                            // 'comments' => $fetch_comments
                        ];
                        $this->view('posts/index', $data);
                    } else {
                        checkAndFlash('search_err', 'Search not found', 'alert alert-danger');
                        Redirect::to('');
                    }
                    
                } else {
                    checkAndFlash('search_err', 'Search not found', 'alert alert-danger');
                    Redirect::to('');
                }
            } else {
                Redirect::to('');
            }
        }

        public function comment($id){
            if(!$id){
                Redirect::to('');
            }
            if(Input::exists()){
                if($this->userModel->isLoggedIn()){
                    $validate = new Validate();

                    $validate->check($_POST, array(
                        'content' => array(
                            'required' => true
                        )
                    ));

                    if($validate->passed()){
                        $add_comment = $this->commentModel->addComment(array(
                            'comment_user' => $this->userModel->data()->user_name,
                            'comment_content' => strtolower(sanitize(Input::get('content'))),
                            'comment_post_id' => $id,
                            'comment_image' => $this->userModel->data()->user_image
                        ));

                        if($add_comment){
                            $fetch_posts = $this->postModel->getOnePost($id);
                            $result = $fetch_posts[0]->post_comments_count + 1;
                            $this->postModel->commentsCount($id, $result);
                            checkAndFlash('comment_alert', 'Success posting comment');
                            Redirect::to("posts/show/".($id));
                        }
                    } else {
                        checkAndFlash('comment_alert', 'Error posting commment', 'alert alert-danger');
                        Redirect::to("posts/show/".($id));
                    }
                } else {
                    checkAndFlash('comment_alert', 'Login before adding comment', 'alert alert-danger');
                    Redirect::to("posts/show/".($id));
                }
            }
        }
    }