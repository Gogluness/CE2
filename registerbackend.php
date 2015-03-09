<?php
    echo(include "header.php"); // Includes Login Script
    $error=''; // Variable To Store Error Message

            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $loginuser = $_POST["email"];
            $loginpassword = $_POST["password"];
            $confirmpassword = $_POST["confirmPassword"];

            $servername = "localhost";
            $username = "root";
            $password = "admin123";
            $dbname = "CE2";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO Users (Prenom, Nom, Username, Password) VALUES ('$prenom', '$nom', '$loginuser', '$loginpassword')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);

    echo($error);
    echo(include "footer.php");
?>