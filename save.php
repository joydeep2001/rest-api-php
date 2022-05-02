
<?php
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " + $conn);
        return;
    } else {
        //echo "connection success";
    }


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
        $table = "<table id='userTable'><th>Username</th><th>Password</th><th>Delete</th><th>Modify</th>";
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $table .= "<tr>";
            $table .= "<td>". $row['username'] ."</td>";
            $table .= "<td>". $row['password'] ."</td>";
            $table .= "<td><button name=delete value=".$row['username'].">Delete</button></td>";
            $table .= "<td><button name=modify value=".$row['username'].">Modify</button></td>";
            $table .= "</tr>";
        }
        } else {
            echo "0 results";
        }
        $table .= "</table>";
        echo $table;
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

    if(isset( $_GET['btn'])) {
        if($_GET["btn"] == "save") {
            save($conn, $_GET["username"], $_GET["password"]);
        } else if($_GET["btn"] == "show") {
            show($conn);
    
        } else if($_GET["btn"] == "delete") {
            delete($conn, $_GET['username']);
        } else if($_GET["btn"] == "modify") {
            update_pass($conn, $_GET["username"], $_GET["password"]);
        } 
        header('Location: index.php');
    }


    
   
?>