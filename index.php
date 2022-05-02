<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
   
    <h1>Add New User</h1>
    <form action="save.php">
        <input type="text" name="username" required placeholder="username">
        <br>
        <input type="name" name="password" required placeholder="password"> 
        <br>
        <button name="btn" value="save" type="submit">Submit</button>
        <br>
        
    </form>
    <h1>All Users</h1>
    <?php
        require 'save.php';
        show($conn);
    ?>
    <script>
        const userTable = document.querySelector('#userTable');
        userTable.addEventListener('click', handleClick);
        function handleClick(e) {
            const buttonType = e.target.name;
            const buttonVal = e.target.value;
            if(buttonType === 'delete') {
                window.location.href = window.location.href + `?btn=delete&username=${buttonVal}`;
            } else if(buttonType === 'modify') {
                let newpass = prompt("Enter your new password");
                if(newpass.trim().length > 0)
                    window.location.href = window.location.href + `?btn=modify&username=${buttonVal}&password=${newpass}`;
                
            }
        }
    </script>
</body>
</html>