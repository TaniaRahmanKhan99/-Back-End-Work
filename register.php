<?php

include_once 'database.php';



class Register{
    
    
    public $db;
    
    
    public function __construct(){
        $this->db = new Database();
    }
    
    
    
    public function addStudent($data, $file){
        
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $uni = $data['uni'];
        $comment = $data['comment'];
        
        
        $permited = array('jpg', 'jpeg', 'png');
        
        $photo_name = $file['photo']['name'];
        $photo_size = $file['photo']['size'];
        $photo_temp = $file['photo']['tmp_name'];
        
        $div = explode('.', $photo_name);
        
        $file_extension = strtolower(end($div));
        
        $unique_name = substr(md5(time()), 0, 10). '.' . $file_extension;
        
        $upload_photo = "upload/". $unique_name;
        
        
        if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($gender) || empty($birthday) || empty($uni) || empty($comment) || empty($photo_name)){
            $message = "Please Fill Up All The Fields";
            return $message;
            
        }elseif($photo_size > 1048576){
            $message = "File size must be less than 1 MB";
            return $message;
            
        }elseif(in_array($file_extension, $permited) == false){
            $message = "You can upload only jpg, jpeg or png format image";
            return $message;
            
        }else{
            
            move_uploaded_file($photo_temp, $upload_photo);
            
            $sql = "insert into student (name, email, phone, address, photo, gender, birthday, uni, comment) values ('$name', '$email', 
            '$phone', '$address', '$upload_photo', '$gender', '$birthday', '$uni', '$comment')";
            
            
            $result = $this->db->insert($sql);
            
            if($result){
                $message = "Your Information Added SuccessFully!!";
                return $message;
            }else{
                $message = "Registration Failed!!";
                return $message;
            }
            
            
            
            
            
            
        }
                 
        
        
    }



    public function showStudent(){
        $query = "select * from student order by studentID desc";
        
        $result = $this->db->select($query);
        
        return $result;
    }



    public function getStudentById($id){
        $query = "select * from student where studentID = '$id'";
        
        $result = $this->db->select($query);
        
        return $result;
        
    }


    public function updateStudent($data, $file, $id){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $uni = $data['uni'];
        $comment = $data['comment'];
        
        
        $permited = array('jpg', 'jpeg', 'png');
        
        $photo_name = $file['photo']['name'];
        $photo_size = $file['photo']['size'];
        $photo_temp = $file['photo']['tmp_name'];
        
        $div = explode('.', $photo_name);
        
        $file_extension = strtolower(end($div));
        
        $unique_name = substr(md5(time()), 0, 10). '.' . $file_extension;
        
        $upload_photo = "upload/". $unique_name;

        if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($gender) || empty($birthday) || empty($uni) || empty($comment)){
            $message = "Fields must not be empty";
            return $message;
        }
        
        
        if(!empty($photo_name)){
            
            if($photo_size > 1048576){
                $message = "File size must be less than 1 MB";
                return $message;

            }elseif(in_array($file_extension, $permited) == false){
                $message = "You can upload only jpg, jpeg or png format image";
                return $message;

            }else{
                
                move_uploaded_file($photo_temp, $upload_photo);
                
                $sql = "update student set name = '$name', email = '$email', phone = '$phone', address = '$address', gender = '$gender', birthday = '$birthday', uni = '$uni', comment = '$comment', photo = '$upload_photo' where studentID = '$id'";
                
                $result = $this->db->update($sql);
                
                if($result){
                    $message = "Updated Successfully";
                    return $message;
                }else{
                    $message = "Update Failed!!";
                    return $message;
                }
                
 
            } 
            
        }else{
            
            $sql = "update student set name = '$name', email = '$email', phone = '$phone', address = '$address', gender = '$gender', birthday = '$birthday', uni = '$uni', comment = '$comment' where studentID = '$id'";
                
            $result = $this->db->update($sql);

            if($result){
                $message = "Updated Successfully";
                return $message;
            }else{
                $message = "Update Failed!!";
                return $message;
            }
        }
        
        
    
    }    
    
    
    
}




?>