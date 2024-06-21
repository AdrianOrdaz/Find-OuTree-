<?php
    require "conexion.php";

    function dbConnect(){
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
        if($mysqli->connect_errno != 0){
            return FALSE;
        }else{
            return $mysqli;
        }
    }

    function getZones(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT DISTINCT zones FROM arboles");
        
        while($row = $result -> fetch_assoc()){
            $zones[] = $row;
        }
        return $zones;
    }

    function getFamilies(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT DISTINCT tree_family FROM arboles");
        
        while($row = $result -> fetch_assoc()){
            $families[] = $row;
        }
        return $families;
    }

    function getPuestos(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT DISTINCT puesto FROM users");
        
        while($row = $result -> fetch_assoc()){
            $puestos[] = $row;
        }
        return $puestos;
    }

    function showTrees(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM arboles JOIN users ON arboles.id_user = users.id_user ORDER BY arboles.tree_name");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function showTreesById($ids){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM arboles WHERE tree_id IN ($ids) ORDER BY arboles.tree_name");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function showNews(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM noticias ORDER BY noticias.id_new");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function showUsers(){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM users WHERE id_user != '0' ORDER BY users.id_user");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function showTreesByZone($zone){
        $mysqli = dbConnect();
        $smtp = $mysqli->prepare("SELECT * FROM arboles WHERE zones = ?");
        $smtp->bind_param("s",$zone);
        $smtp->execute();
        $result = $smtp->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    function showTreeById($id){
        $mysqli = dbConnect();
        $smtp = $mysqli->prepare("SELECT * FROM arboles WHERE tree_id = ?");
        $smtp->bind_param("s",$id);
        $smtp->execute();
        $result = $smtp->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;

    }

    function showSomeTrees($numero,$orden){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM arboles JOIN users ON arboles.id_user = users.id_user ORDER BY $orden LIMIT $numero");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function showSomeNews($numero,$orden){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM noticias ORDER BY $orden LIMIT $numero");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    function showSomeUsers($numero,$orden){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM users WHERE id_user != '0' ORDER BY id_user LIMIT $numero");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }

    function getUserById($id){
        $mysqli = dbConnect();
        $smtp = $mysqli->prepare("SELECT * FROM users WHERE id_user = ?");
        $smtp->bind_param("s",$id);
        $smtp->execute();
        $result = $smtp->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    function getNewById($id){
        $mysqli = dbConnect();
        $smtp = $mysqli->prepare("SELECT * FROM noticias WHERE id_new = ?");
        $smtp->bind_param("s",$id);
        $smtp->execute();
        $result = $smtp->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }