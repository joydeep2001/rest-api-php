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
        <input type="text" id="username" name="username" required placeholder="username">
        <br>
        <input type="name" id="password" name="password" required placeholder="password"> 
        <br>
        <button name="btn" id="btn" value="save" type="submit">Submit</button>
        <br>
        
    </form>
    <h1>All Users</h1>
    <script>
        // const userTable = document.querySelector('#userTable');
        // userTable.addEventListener('click', handleClick);
        showUsers();
        async function deleteUser(opr, username) {
            const response = await fetch('/save.php', {
                method: "POST",
                body: {
                    opr,
                    username
                }
            });
        }

        async function saveUser(e) {
            e.preventDefault();

            const username = document.querySelector("#username").value;
            const password = document.querySelector("#password").value;
            const response = await fetch('/dashboard/php/save.php', {
                method: "POST",
                body: {
                    opr: "save",
                    username,
                    password
                }
            });
            const result = await response.json();
            console.log(response); 
        }

        async function showUsers() {
            const response = await fetch("/dashboard/php/save.php", {
                method: "POST",
                body: {
                    opr: "show"
                }
            });
            const result = await response.json();
            console.log(result);
        }


        function handleClick(e) {
            const buttonType = e.target.name;
            const buttonVal = e.target.value;
            
            if(buttonType === 'delete') {
               deleteUser(buttonType, buttonVal);
            } else if(buttonType === 'modify') {
                let newpass = prompt("Enter your new password");
                if(newpass.trim().length > 0)
                    window.location.href = window.location.href + `?btn=modify&username=${buttonVal}&password=${newpass}`;
                
            }
        }
    </script>
</body>
</html>