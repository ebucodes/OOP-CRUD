<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ebucodes_oop');
class User
{

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->link = $conn;
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    // to check if username is available
    public function usernameAvailability($USERNAME)
    {
        $result = mysqli_query($this->link, "SELECT email FROM users WHERE username='$USERNAME'");
        return $result;
    }
    // check if email is available
    public function emailAvailability($EMAIL)
    {
        $result = mysqli_query($this->link, "SELECT email FROM users WHERE email='$EMAIL'");
        return $result;
    }
    // Function for registration
    public function registration($FIRSTNAME, $LASTNAME, $USERNAME, $EMAIL, $PASSWORD)
    {
        $regResult = mysqli_query($this->link, "INSERT INTO users(firstname, lastname, username, email, password) VALUES ('$FIRSTNAME','$LASTNAME','$USERNAME','$EMAIL','$PASSWORD')");
        return $regResult;
    }
    // Function for signin
    public function login($USER, $PASSWORD)
    {
        $result = mysqli_query($this->link, "SELECT * from users where username='$USER' OR email='$USER' AND password='$PASSWORD'");
        return $result;
    }
    // Fetch All Users
    public function fetch()
    {
        $data = null;
        $query = "SELECT * FROM users";
        if ($sql = $this->link->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                # code...
                $data[] = $row;
            }
        }
        return $data;
    }
    // Create new user
    public function create()
    {
        if (isset($_POST["create"])) {
            $FIRSTNAME = $_POST["FIRSTNAME"];
            $LASTNAME = $_POST["LASTNAME"];
            $USERNAME = $_POST["USERNAME"];
            $EMAIL = $_POST["EMAIL"];
            $PASSWORD = md5($_POST["PASSWORD"]);

            $query = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$FIRSTNAME','$LASTNAME','$USERNAME','$EMAIL','$PASSWORD')";
            if ($sql = $this->link->query($query)) {
                echo "<script>alert('New user created');</script>";
                echo "<script>window.location.href = 'records.php';</script>";
            } else {
                echo "<script>alert('User not created');</script>";
                echo "<script>window.location.href = 'create.php';</script>";
            }
        }
    }
    // Update user data
    public function edit($id)
    {
        $data = null;

        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->link->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                # code...
                $data = $row;
            }
        }
        return $data;
    }
    public function update($data)
    {
        $query = "UPDATE users SET firstname='$data[firstname]',lastname='$data[lastname]',username='$data[username]',email='$data[email]' WHERE id='$data[id]'";
        if ($sql = $this->link->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    // Read individual data
    public function fetch_single($id)
    {
        $data = null;

        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->link->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                # code...
                $data = $row;
            }
        }
        return $data;
    }
    // Delete user
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";
        if ($sql = $this->link->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
