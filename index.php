<?php include 'config.php'?>
<?php include 'header.php'?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gov-app helper Link Aadhaar</title>
</head>
    <body>
    <style>
        

        body {
            font-family: Arial, s ans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        
        .main-content1 {
            display:flex;
            width : 100%;
        }
 
        .content{
            width: 70%;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
    </style>
    <div class = "main-content1">
        <?php include APP_PATH . '/sidebar.php' ?>
        <div class= "content">
            <?php include 'guides/aadhar/create_aadhar.php'?>
            <?php include 'guides/aadhar/link_aadhar.php'?>
            <?php include 'guides/aadhar/check_aadhar.php'?>
            <?php include 'guides/aadhar/update_aadhar.php'?>
            <?php include 'guides/aadhar/download_aadhar.php'?>
        </div>
    </div>
    <?php include "footer.php"?>
    </body>
    </html>
