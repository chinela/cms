<?php
class Upload{
    private $fileName = "",
            $fileTmpName = "",
            $fileSize = "",
            $fileError = "";

    private $maxSize,
            $allowedExt = array('jpg', 'jpeg', 'png'),
            $uploadTarget = "../public/uploads/",
            $passed = false,
            $error = "";
    private static $fileNewName;

    public function __construct($name){
        $this->fileName=  $_FILES[$name]['name'];
        $this->fileTmpName= $_FILES[$name]['tmp_name'];
        $this->fileSize= $_FILES[$name]['size'];
        $this->fileError= $_FILES[$name]['error'];
    }
    public function startUpload(){
        if(!$this->checkExt()){
            $this->error = "File format not supported";
        } elseif(!$this->fileError()){
            $this->error = "Error uploading file";
        } elseif($this->fileSize()){
            $this->error = "File too large";
        } else {
            $this->moveUploadedFile();
        }
        
        if(empty($this->error)){
            return $this->passed = true;
        } 
    }

    public function getExt(){
        $fileExt = explode('.', $this->fileName);
        return strtolower(end($fileExt));
    }

    public function checkExt(){
        return (in_array($this->getExt(), $this->allowedExt)) ? true : false;
    }

    public function fileSize(){
        return ($this->fileSize > $this->maxSize(500000)) ? true : false;
    }    

    public function fileError(){
        return ($this->fileError === 0) ? true : false;
    }

    public function fileDes(){
        self::$fileNewName = uniqid('', true)." ". $this->getExt();
        return $this->uploadTarget.self::$fileNewName;
    }

    public function moveUploadedFile(){
        return (move_uploaded_file($this->fileTmpName, $this->fileDes()));
    }
    
    public function maxSize($size){
        return $size;
    }
    
    public static function fileNewName(){
        return self::$fileNewName;
    }

    public function checkEmptyFileName(){
        return ($this->fileName == '') ? true : false;
    }

    public function passed(){
        return $this->passed;
    }

    public function displayError(){
        return $this->error;
    }

    public function target(){
        return $this->uploadTarget;
    }
}

?>
