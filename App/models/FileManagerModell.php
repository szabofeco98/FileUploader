<?php


class FileManagerModell{
    private $db;
    private $user_name;

    function __construct(){
        $this->db=Datebase::getDatabase();
        Session::init();
        $this->user_name=Session::get("user_name");
    }

    public function insert($fileName,$fileSize,$fileType,$filetmp){
        $user_id=$this->getUserId();
        $date =  date("Y-m-d H:i:s");
        if (strlen(trim($fileName))==0){
            return "shortFile";
        }
        try {
            $stmt = $this->db->prepare('INSERT INTO files(file_name,file_size,file_type,user_id,modifi_date)
                                                                    VALUES(:filename,:filesize,:filetype,:userid,:date)');
            $stmt->execute(["filename" => $fileName, "filesize" => $fileSize, "filetype" => $fileType, "userid" => $user_id,"date"=>$date]);
            $this->upload($filetmp,$fileName);
        }catch (Exception $ex) {
            echo $ex;
        }

    }

    private function upload($filetmp,$filename){
        $newPath="/var/tmp/".$this->user_name;
        if(!file_exists($newPath)){
            echo "mkdir";
            mkdir($newPath);
        }
        move_uploaded_file($filetmp,$newPath);
    }

    private function getUserId(){
        Session::init();
        $stmt=$this->db->prepare("select ID from users where user_name=:userName");
        $stmt->execute(["userName"=>$this->user_name]);
        $select=$stmt->fetch(PDO::FETCH_ASSOC);

        return $select['ID'];
    }

}