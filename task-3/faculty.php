<!DOCTYPE html>
<head>
    <title>Faculty</title>
    <link href="index.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div id="dashboard">
            <form method="post">
                <input name="rollno" placeholder="Roll number" required><br>
                <input name="name" placeholder="Name" required><br>
                <input name="maths" placeholder="Maths marks" required><br>
                <input name="english" placeholder="English marks" required><br>
                <input name="science" placeholder="Science marks" required><br>
                <input name="history" placeholder="History marks" required><br>
                <button name="add" type="submit">Add Student</button>
            </form><br>
            <form method="post">
                <input name="m_rollno" placeholder="Roll number" required><br>
                <select name="subject">
                    <option>--Select--</option>
                    <option value="maths">Maths</option>
                    <option value="english">English</option>
                    <option value="science">Science</option>
                    <option value="history">History</option>
                </select>
                <input name="marks" placeholder="Marks" required><br>
                <button name="modify" type="submit">Modify Marks</button>
            </form>
    </form>
        </div>
        <div style="position:relative;left:35%;top:5%;">
            <?php
            include 'students.php';
            if(isset($_POST['add'])) {
                $conn = OpenCon();
                $rollno=$_REQUEST['rollno'];
                $name=$_REQUEST['name'];
                $maths=$_REQUEST['maths'];
                $english=$_REQUEST['english'];
                $science=$_REQUEST['science'];
                $history=$_REQUEST['history'];
                $sql = "INSERT INTO students VALUES ('$rollno','$name','$maths','$english','$science','$history')";
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Student added successfully!")</script>';
                    header("Refresh:0");
                } else {
                    echo "Error!";
                }
                unset($_POST['add']);
                CloseCon($conn);
                $conn->close();
            }
            if(isset($_POST['modify'])) {
                $conn = OpenCon();
                $m_rollno=$_REQUEST['m_rollno'];
                $subject=$_REQUEST['subject'];
                $marks=$_REQUEST['marks'];
                $sql = "UPDATE students SET ".$subject."=".$marks." WHERE roll_no=".$m_rollno;
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Marks modified successfully!")</script>';
                    header("Refresh:0");
                } else {
                    echo "Error!";
                }
                unset($_POST['modify']);
                CloseCon($conn);
                $conn->close();
            }
            ?>
        </div>
        <script>
            
        </script>
</body>