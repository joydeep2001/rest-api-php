
<?php
    require("conn.php");

    function save($conn, $username, $password) {
        $sql = "INSERT INTO data (username, password) VALUES('$username','$password');";
        echo $sql;
        if(mysqli_query($conn, $sql)) {
            //echo "Success!!";
        } else {
            echo "Something went wrong." . mysqli_error($conn);
        }
    }

    function show($conn) {
        $sql = "SELECT * FROM data";
        $result = mysqli_query($conn, $sql);
        
        if ($row = mysqli_num_rows($result) > 0) {
            echo "id:".$row['username']."password:".$row['password'];
            
        } else {
            echo "0 results";
        }
        
        
    }

    function delete($conn, $username) {
        $sql = "DELETE FROM data WHERE username='$username'";

        if(mysqli_query($conn, $sql)) {
            echo $username . " deleted successfully";
        } else {
            echo "cannot delete";
        }
    }
    
    function update_pass($conn, $username, $new_pass) {
        $sql = "UPDATE data SET password='$new_pass' WHERE username='$username';";
        if(mysqli_query($conn, $sql)) {
            echo "updated successfully";
        } else {
            echo "cannot update";
        }

    }

    $body = json_decode($_POST['body']);
    echo $body;
    // if($_POST["opr"] == "save") {
    //     save($conn, $_POST["username"], $_POST["password"]);
    // } else if($_POST["opr"] == "show") {
    //     show($conn);

    // } else if($_POST["opr"] == "delete") {
    //     delete($conn, $_POST['username']);
    // } else if($_POST["opr"] == "modify") {
    //     update_pass($conn, $_POST["username"], $_POST["password"]);
    // } else if($_POST["opr"] == "show"){
    //     show($conn);
    // }
    
    


    
   
?>