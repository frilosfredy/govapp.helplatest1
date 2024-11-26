
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Switcher</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #072139;
            border-bottom: 1px solid #ddd;
        }

        .left-section {
            display: flex;
            align-items: center;
            color: white;
        }

        .left-section img {
            height: 40px;
            margin-right: 10px;
        }

        .right-section {
            display: flex;
            align-items: center;
        }

        .right-section a {
            margin-left: 15px;
            text-decoration: none;
            color: #fff;
            font-size: 14px;
        }

        .right-section a:hover {
            text-decoration: underline;
        }

        .language-selector {
            margin-left: 15px;
        }

        select {
            padding: 5px;
            font-size: 14px;
            background-color: #fff;
            color: #000;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="left-section">
            <img src="india.jpg" alt="India Emblem">
            <div>
                <small><?php echo $languageStrings['gov_of_india'];?></small>
            </div>
        </div>
        
        <div class="right-section">
            <a href="#"><?php echo $languageStrings['login']; ?></a>
            <a href="#"><?php echo $languageStrings['signup']; ?></a>
            
            <div class="language-selector">
                <form action="" method="get">
                    <select name="lang" onchange="this.form.submit()">
                        <option value="en" <?php echo $currentLanguage == 'en' ? 'selected' : ''; ?>>English</option>
                        <option value="ml" <?php echo $currentLanguage == 'ml' ? 'selected' : ''; ?>>Malayalam</option>
                        <option value="hi" <?php echo $currentLanguage == 'hi' ? 'selected' : ''; ?>>hindi</option>
                    </select>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
