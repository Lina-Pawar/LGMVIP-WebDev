<!DOCTYPE html>
<head>
    <title>Student results</title>
    <link href="index.css" rel="stylesheet">
</head>
<body align="center">
    <?php
        include 'db.php';
        $conn = OpenCon();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        echo "<table border='1' cellspacing='0' id='table' style='position:absolute;left:50%;top:5%;transform:translate(-50%,-5%);'>
        <tbody>
            <tr>
                <th>Roll number</th>
                <th>Name</th>
                <th>Maths</th>
                <th>English</th>
                <th>Science</th>
                <th>History</th>
                <th>Total</th>
                <th>Grade</th>
            </tr>";
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $total=$row["roll_no"]+$row["name"]+$row["maths"]+$row["english"]+$row["science"]+$row["history"];
            if($total>185){
                $grade='A';
            }else if($total>155){
                $grade='B';
            }else if($total>100){
                $grade='C';
            }else if($total>60){
                $grade='D';
            }else{
                $grade='E';
            }
            echo "<tr><td>". $row["roll_no"]."</td><td>". $row["name"]."</td><td>". $row["maths"]."</td><td>". $row["english"].
            "</td><td>". $row["science"]."</td><td>". $row["history"]."</td><td>".$total."</td><td>".$grade."</td>";
          }
          echo "<tbody></table>";
        } else {
          echo "0 results";
        }
        CloseCon($conn);
    ?>
</body>