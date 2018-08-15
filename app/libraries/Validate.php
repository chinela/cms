<?php

    class Validate{

        private $passed = false,
                $error = [];

        public function check($source, $params =[]){
            foreach ($params as $param => $rules){
                foreach ($rules as $rule => $rule_value){

                    $value = sanitize($source[$param]);
                    $param = trim($param);

                    if($rule === 'required' && empty($value)){
                        $this->error[$param] = "Field cannot be empty";
                    } else if(!empty($value)){
                        switch ($rule){
                            case 'min':
                                if($rule_value > strlen($value)){
                                    $this->error[$param] = "$param must be a minimum of $rule_value characters";
                                }
                            break;
                            case 'max';
                                if($rule_value < strlen($value)){
                                    $this->error[$param] = "Maximum of $rule_value characters";
                                }
                            break;
                            case 'filter':
                                if(!filter_var($value, $rule_value)){
                                    $this->error[$param] = "Use correct $param format";
                                }
                            break;
                            case 'matches':
                                if($value !== $source[$rule_value]){
                                    $this->error[$param] = "$rule_value don't match";
                                }
                            break;
                            case 'unique':
                                $check = DB::connect()->checkIfExists($rule_value[0], '=', array($rule_value[1] => $value));
                                if($check->count()){
                                    $this->error[$param] = "$param already exists";
                                }
                            break;
                            case 'select':
                                if($value == $rule_value){
                                    $this->error[$param] = "Choose an option";
                                }
                            break;
                            case 'preg':
                                if(!preg_match($rule_value, $value)){
                                    $this->error[$param] = "Invalid characters used";
                                }
                            break;
                            case 'not_user':
                                $check = DB::connect()->checkIfExists($rule_value[0], '=', array($rule_value[1] => $value));
                                if(!$check->count()){
                                    $this->error[$param] = "$value not registered ";
                                }
                            break;
                        }
                    }
                }
            }
            if(empty($this->error)){
                $this->passed = true;
            }
        }

        public function passed(){
            return $this->passed;
        }

        public function displayValidationError($value){
            if(isset($this->error[$value])){
                return $this->error[$value];
            }
        }
    }
