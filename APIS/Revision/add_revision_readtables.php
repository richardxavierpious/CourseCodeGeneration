<?php

header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eric_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tablename = $_GET['tablename'] ?? null;

switch ($tablename) {

    case "common": {
        $sql = "SELECT * FROM common";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }

    case "common_dept":    {
        $sql = "SELECT * FROM common_dept";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "course": {
        $sql = "SELECT * FROM course";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "courseoutcome": {
        $sql = "SELECT * FROM courseoutcome";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "coursetype": {
        $sql = "SELECT * FROM coursetype";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        echo json_encode($data);
        break;
    }


    case "curriculum": {
        $sql = "SELECT * FROM curriculum";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "degree": {
        $sql = "SELECT * FROM degree";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        echo json_encode($data);
        break;
    }


    case "dept": {
        $sql = "SELECT * FROM dept";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        echo json_encode($data);
        break;
    }


    case "faculty": {
        $sql = "SELECT * FROM faculty";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "ffmaxvalues": {
        $sql = "SELECT * FROM ffmaxvalues";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "programme": {
        $sql = "SELECT * FROM programme";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        echo json_encode($data);
        break;
    }


    case "programmeoutcome": {
        $sql = "SELECT * FROM programmeoutcome";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "revision": {
        $sql = "SELECT * FROM revision";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "selected_programs": {
        $sql = "SELECT * FROM selected_programs";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }


    case "user": {
        $sql = "SELECT * FROM user";
        $data=[];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
            }
        } 
        else {
            echo "0 results";
        }
        return json_encode($data);
        break;
    }

}


// Close the connection
mysqli_close($conn);

?>