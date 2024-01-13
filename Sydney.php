<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12676708";
$password = "3ZXpcy2Kn5";
$dbname = "sql12676708";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM leaderboard ORDER BY score DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Sıralama</h2>";
    while ($row = $result->fetch_assoc()) {
        $rankText = "";
        switch ($row["rank"]) {
            case 1:
                $rankText = "1.kişi";
                break;
            case 2:
                $rankText = "2.kişi";
                break;
            case 3:
                $rankText = "3.kişi";
                break;
            case 4:
                $rankText = "4.kişi";
                break;
            case 5:
                $rankText = "5.kişi";
                break;
        }

        $scoreText = "";
        if ($row["score"] === 1) {
            $scoreText = "<span class='correct-answer'>" . $row["score"] . "/1</span>";
        } else {
            $scoreText = "<span class='wrong-answer'>" . $row["score"] . "/1</span>";
        }

        echo "<h3>{$rankText} - {$row["name"]} - Puan: {$scoreText}</h3>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
