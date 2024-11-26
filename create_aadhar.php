<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Aadhaar Status</title>
     <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .main-content {
            max-width: 1000px;
            margin: 0px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }

        .content-section ul {
            padding: 0;
            list-style: none;
        }

        .content-section ul li {
            margin: 10px 0;
        }

        .content-section ul li strong {
            color: #28527a;
        }

        .content-section img {
            display: block;
            margin: 20px 0;
            width: 800px;
            height: auto;
        } 
    </style>
</head>
<body>
    
        <!-- Content for Aadhaar Section -->
        <div id="create_aadhar.php" class="content-section">
            <h1><?php echo $languageStrings['check_aadhaar_status']; ?></h1>
            <h2><?php echo $languageStrings['Online Method via UIDAI Website']?></h2>
            <ul>
                <li><strong><?php echo $languageStrings['step']?> 1:</strong><?php echo $languageStrings['visit_uidai']?><a href="https://uidai.gov.in" target="_blank"></a></li>
                <li><strong><?php echo $languageStrings['step']?> 2:</strong> <?php echo $languageStrings['navigate_my_aadhaar']?></li>
                <li><strong><?php echo $languageStrings['step']?> 3:</strong> <?php echo $languageStrings['click_status']?></li>
                <img src="http://localhost/govapphelper/guides/aadhar/_images/pic.png" alt="Screenshot of the UIDAI website showing Aadhaar status check page"/>
                <li><strong><?php echo $languageStrings['step']?>4:</strong> <?php echo $languageStrings['enter_details']?></li>
                <li><strong><?php echo $languageStrings['step']?>5:</strong> <?php echo $languageStrings['captcha']?></li>
                <img src="http://localhost/govapphelper/guides/aadhar/_images/picc.png" alt="Screenshot of the UIDAI website showing Aadhaar status check page"/>
                <li><strong><?php echo $languageStrings['step']?>6:</strong> <?php echo $languageStrings['check_status']?></li>
            </ul>
        </div>
    
</body>
</html>
