<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload XML File</title>
</head>
<body>
    <h2>Upload XML File</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select XML file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>
<?php
include '../Controller/connect.php'; 

if(isset($_POST["submit"])) {
    $targetDir = "../View/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if($fileType != "xml") {
        echo "Sorry, only XML files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            insertXMLToDatabase($targetFile, $conn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function insertXMLToDatabase($xmlFile, $conn) {
    $xml = simplexml_load_file($xmlFile);

    foreach ($xml->car as $car) {
        $carName = $car->name;
        $price = $car->price;
        $salesPerson = $car->salesPerson;
        $soldTo = $car->soldTo;

        $sql = "INSERT INTO sales (car, price, salesPerson, soldTo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $carName, $price, $salesPerson, $soldTo);
        $stmt->execute();
        $stmt->close();
    }
}
?>
