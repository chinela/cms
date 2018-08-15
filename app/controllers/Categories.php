<?php 

    class Categories extends Controller{

        public function __construct(){
            $this->postModel = $this->model('post');
            $this->userModel = $this->model('user');
            $this->categoryModel = $this->model('category');
            $this->eventModel = $this->model('event');
        }

        public function index($id){
            
            if(!$id){
                Redirect::to('posts');
            } else {
                
                $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                $fetch_posts = $this->postModel->fetchCategoryPostsByOrder($id);
                $fetch_events = $this->eventModel->getAllEvents();

                $data = [
                    'posts' => $fetch_posts,
                    'events' => $fetch_events,
                    'categories' => $fetch_categories,
                    'name_err' => '',
                    'password_err' => '',
                    'email_err' => ''
                ];
                $this->view('categories/index', $data);
            }
        }
    }