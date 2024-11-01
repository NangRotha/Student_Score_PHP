<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Exam Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Content:wght@400;700&family=Metal&display=swap" rel="stylesheet">
    <style>
        body {
           
            color: white;
            font-family: Arial, sans-serif;
        }

        .card {
            max-width: 700px;
            margin: 60px auto;
            padding: 20px;
            background-color:#94bbe9;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .card h2 {
            font-family: "Content", system-ui;
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            transition: transform 0.3s ease;
        }

        .form-control:focus {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }

        .btn-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            width: 120px;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-danger:hover {
            background-color: #ff5050;
            transform: scale(1.05);
        }

        .btn-success:hover {
            background-color: #66ff66;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <?php
    $total = $average = $result = $mention = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $html = (int)$_POST['html'];
        $css = (int)$_POST['css'];
        $js = (int)$_POST['js'];
        $php = (int)$_POST['php'];

        $total = $html + $css + $js + $php;
        $average = $total / 4;
        $result = ($average >= 50) ? "Pass" : "Fail";

        if ($average >= 90) {
            $mention = "A";
        } elseif ($average >= 80) {
            $mention = "B";
        } elseif ($average >= 70) {
            $mention = "C";
        } elseif ($average >= 60) {
            $mention = "D";
        } elseif ($average >= 50) {
            $mention = "E";
        } else {
            $mention = "F";
        }
    }
    ?>

    <div class="container">
        <div class="card">
            <h2>កញ្ចប់ស្វ័យការវិជ្ជាលទ្ធផលប្រឡង</h2>
            <form action="" method="post" id="resultForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="html">HTML Language</label>
                            <input type="number" class="form-control" name="html" id="html" required value="<?= isset($_POST['html']) ? $_POST['html'] : '' ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="css">CSS Language</label>
                            <input type="number" class="form-control" name="css" id="css" required value="<?= isset($_POST['css']) ? $_POST['css'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="js">Js Language</label>
                            <input type="number" class="form-control" name="js" id="js" required value="<?= isset($_POST['js']) ? $_POST['js'] : '' ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="php">PHP Language</label>
                            <input type="number" class="form-control" name="php" id="php" required value="<?= isset($_POST['php']) ? $_POST['php'] : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="result">
                    <div class="form-group mb-3">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" value="<?= htmlspecialchars($total) ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="average">Average</label>
                        <input type="text" class="form-control" id="average" value="<?= htmlspecialchars($average) ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="result">Result</label>
                        <input type="text" class="form-control" id="result" value="<?= htmlspecialchars($result) ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mention">Mention</label>
                        <input type="text" class="form-control" id="mention" value="<?= htmlspecialchars($mention) ?>" readonly>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="submit" name="submit" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-success" onclick="clearForm()">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function clearForm() {
            document.getElementById('resultForm').reset();
            document.getElementById('total').value = '';
            document.getElementById('average').value = '';
            document.getElementById('result').value = '';
            document.getElementById('mention').value = '';
            document.getElementById('css').value = '';
            document.getElementById('php').value = '';
            document.getElementById('js').value = '';
            document.getElementById('html').value = '';
        }
    </script>
</body>
</html>
