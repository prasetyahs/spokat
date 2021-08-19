<?php 


    function cekData($username,$email,$con){
        $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
        $getData = readDataPerRow($con,$query);
        if($getData != null){
            return true;
        }else{
            return false;
        }
    }

    function changePassword($data,$con){
        $username = $data['username'];
        $password = $data['new_pass'];
        $confirmPassword = $data['confirm_pass'];

        if($password == $confirmPassword){
            $data = [
                'password' => md5($password)
            ];
            $where = [
                'username' => $username
            ];
            update($data,$where,'users',$con);
            return true;
        }else{
            return false;
        }
    }