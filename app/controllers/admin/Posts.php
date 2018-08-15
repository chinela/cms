<?php

    class Posts extends Controller{

        public function __construct(){
            $this->postModel = $this->model('post');
            $this->categoryModel= $this->model('category');
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){
            if((Input::get('singleCheck'))){
                foreach(Input::get('singleCheck') as $id){
                    $get_action = Input::get('action');
                    switch ($get_action){
                        case 'publish':
                            $this->postModel->publish($id);
                            Redirect::to('admin/posts');
                        break;
                        case 'draft':
                            $this->postModel->draft($id);
                            Redirect::to('admin/posts');
                        break;
                        case 'delete':
                            $this->postModel->delete($id);
                            Redirect::to('admin/posts');
                        break;
                        case 'clone':
                        $fetch_posts = $this->postModel->getOnePost($id);
                        $this->postModel->addPost(array(
                            'post_title' => $fetch_posts[0]->post_title,
                            'post_content' => $fetch_posts[0]->post_content,
                            'post_status' => $fetch_posts[0]->post_status,
                            'post_category_id' => $fetch_posts[0]->post_category_id,
                            'post_tags' => $fetch_posts[0]->post_tags,
                            'post_image' => $fetch_posts[0]->post_image,
                            'post_author' => $fetch_posts[0]->post_author,
                        ));
                        Redirect::to('admin/posts');
                    }
                }
                
            }
            $fetch_posts = $this->postModel->getAllPosts();

            $data = [
                'posts' => $fetch_posts
            ];
            $this->view('admin/posts', $data);
        }

        public function add(){
            

            if(Input::exists()){

                $validate = new Validate();

                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true
                    ),
                    'post_tags' => array(
                        'required' => true
                    ),
                    'post_category' => array(
                        'select' => 'select'
                    ),
                    'content' => array(
                        'required' => true
                    )
                ));

                if($validate->passed()){

                    $upload = new Upload('image');
                    $upload->startUpload();
                    if($upload->passed()){
                        $add_post = $this->postModel->addPost(array(
                            'post_title' => strtolower(sanitize(Input::get('name'))),
                            'post_content' => strtolower(sanitize(Input::get('content'))),
                            'post_status' => strtolower(sanitize(Input::get('post_status'))),
                            'post_category_id' => strtolower(sanitize(Input::get('post_category'))),
                            'post_tags' => strtolower(sanitize(Input::get('post_tags'))),
                            'post_image' => $upload::fileNewName(),
                            'post_author' => $this->userModel->data()->user_name
                        ));

                        if($add_post){
                            checkAndFlash('post_added', "Your post was created successfully");
                            Redirect::to('admin/posts/add');
                        }
                    } else {
                        $fetch_category = $this->categoryModel->getAllCategoriesByOrder();
                        $data = [
                            'categories' => $fetch_category,
                            'name_err' => '',
                            'content_err' => '',
                            'post_category_err' => '',
                            'post_tags_err' =>'',
                            'image_err' => $upload->displayError()
                        ];

                        $this->view('admin/posts_add', $data);
                    }
                } else {
                    $fetch_category = $this->categoryModel->getAllCategoriesByOrder();
                    $data = [
                        'categories' => $fetch_category,
                        'name_err' => $validate->displayValidationError('name'),
                        'content_err' => $validate->displayValidationError('content'),
                        'post_category_err' => $validate->displayValidationError('post_category'),
                        'post_tags_err' => $validate->displayValidationError('post_tags'),
                        'image_err' => '',
                    ];

                    $this->view('admin/posts_add', $data);
                }

            } else {
                $fetch_category = $this->categoryModel->getAllCategoriesByOrder();
                $data = [
                    'categories' => $fetch_category,
                    'name_err' => '',
                    'content_err' => '',
                    'post_tags_err' => '',
                    'post_category_err' => '',
                    'image_err' => ''
                ];
                $this->view('admin/posts_add', $data);
            }
        }

        public function draft($id){
            $this->postModel->draft($id);
            Redirect::to('admin/posts');
        }

        public function publish($id){
            $this->postModel->publish($id);
            Redirect::to('admin/posts');
        }

        public function delete($id){
            $this->postModel->delete($id);
            Redirect::to('admin/posts');
        }      
    }