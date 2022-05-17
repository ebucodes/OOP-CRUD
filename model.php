<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "ebucodes_oop_crud";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            //throw $th;
            echo "Database connection" . $e->getMessage();
        }
    }
    // Create new user
    public function insert()
    {
        if (isset($_POST["register"])) {
            $FIRSTNAME = $_POST["FIRSTNAME"];
            $LASTNAME = $_POST["LASTNAME"];
            $USERNAME = $_POST["USERNAME"];
            $EMAIL = $_POST["EMAIL"];
            $PASSWORD = md5($_POST["PASSWORD"]);

            $query = "INSERT INTO records (firstname, lastname, username, email, password) VALUES ('$FIRSTNAME','$LASTNAME','$USERNAME','$EMAIL','$PASSWORD')";
            if ($sql = $this->conn->query($query)) {
?>
                <script>
                    setTimeout(function() {
                            swal({
                                title: 'Congratulations!!!',
                                text: 'Registration was successfully.',
                                icon: 'success',
                                button: 'OK',
                            }).then(function() {
                                window.location = 'read.php';
                            });
                        },
                        100);
                </script>
            <?php

            } else {
            ?>
                <script>
                    setTimeout(function() {
                            swal({
                                title: 'Error!!',
                                text: 'Registration was successfully.',
                                html: true,
                                icon: 'error',
                                button: 'OK',
                            }).then(function() {
                                window.location = 'index.php';
                            });
                        },
                        100);
                </script>
<?php

            }
        }
    }
    // Read user
    public function fetch()
    {
        $data = null;
        $query = "SELECT * FROM records";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                # code...
                $data[] = $row;
            }
        }
        return $data;
    }
}
