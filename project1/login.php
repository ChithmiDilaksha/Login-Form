<?php
include "db_conn.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username))
    {
        header("Location:index.html?error=user name is required");
        exit();
    } else if(empty($password)){
        header("Location:index.html?error=password is required");
        exit();
    } else {
        /*Add to this your table name */
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        /*Change here*/
        if (mysqli_num_rows($result) > 0) {
            // Redirect to dashboard.php with success parameter in the URL
            header("Location: index.html?login=success");
            exit();
        } 
        else 
        {
            header("Location: index.html?error=Incorrect username or password");
            exit();
        }
    }
} 
else {
    header("Location:indexsss.php");
    exit();
}
?>
