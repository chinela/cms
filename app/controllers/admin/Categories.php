<?php

    class Categories extends Controller{

        public function __construct(){
            $this->categoryModel = $this->model('category');
            $this->userModel = $this->model('user');
            $this->eventModel = $this->model('event');
            if(!$this->userModel->isAdmin()){
                Redirect::to('users/account');
            }
        }

        public function index(){

            if(Input::exists()){
                $validate = new Validate();

                $validate->check($_POST, array(
                    'name' => array(
                        'required' => true
                    )
                ));

                if($validate->passed()){

                    $add_category = $this->categoryModel->addCategory(array(
                        'cat_title' => sanitize(Input::get('name')),
                        'cat_unique' => uniqid(md5())
                    ));

                    if($add_category){
                        checkAndFlash('cat_added', "A new category was just added");
                        Redirect::to('admin/categories');
                    }
                } else {
                    $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                    $data = [
                        'name_err' => $validate->displayValidationError('name'),
                        'categories' => $fetch_categories,
                        'edit' => ''
                    ];

                    $this->view('admin/categories', $data);
                }
            } else {

                $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                $data = [
                    'name_err' => '',
                    'categories' => $fetch_categories,
                    'edit' => ''
                ];
                $this->view('admin/categories', $data);
            }
        }

        public function edit($id){
            if(Input::exists()){
                
                $validate = new Validate();

                $validate->check($_POST, array(
                    'edit_name' => array(
                        'required' => true
                    )
                ));

                if($validate->passed()){

                    $edit_category = $this->categoryModel->editCategory($id, array(
                        'cat_title' => sanitize(Input::get('edit_name'))
                    ));

                    if($edit_category){
                        checkAndFlash('cat_edit', "The category name has been changed");
                        Redirect::to('admin/categories');
                    }
                } else {
                    $get_title = $this->categoryModel->getOneCategory($id);
                    $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                    $data = [
                        'edit_name_err' => $validate->displayValidationError('edit_name'),
                        'categories' => $fetch_categories,
                        'edit' => $id,
                        'cat_title' => $get_title->cat_title,
                        'name_err' => ''
                    ];

                    $this->view('admin/categories', $data);
                }
            } else {
                $get_title = $this->categoryModel->getOneCategory($id);
                $fetch_categories = $this->categoryModel->getAllCategoriesByOrder();
                $data = [
                    'edit' => $id,
                    'name_err' => '',
                    'categories' => $fetch_categories,
                    'cat_title' => $get_title->cat_title,
                    'edit_name_err' => ''
                ];
                $this->view('admin/categories', $data);
            }
        }

        public function delete($id){
            $this->categoryModel->deleteCategory($id);
            checkAndFlash('cat_del', 'The category deleted successfully', 'alert alert-danger');
            Redirect::to('admin/categories');
        }
    }