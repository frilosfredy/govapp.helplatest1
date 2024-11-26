<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Footer</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }


        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #262826;
            color: white;
            text-align: center;
            padding: 0px 0;
        }
    </style>
</head>
<body>
    
    <footer>
        <p><?php echo $languageStrings['footer'];?></p>
    </footer>
</body>
</html>
