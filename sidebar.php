
    <div class="sidebar">
        <!-- Search bar -->
        <input type="text" id="sidebar-search" placeholder="<?php echo $languageStrings['search'] ?? 'Search...'; ?>" onkeyup="filterLinks()">
        
        <!-- Sidebar buttons -->
        <a id="check-aadhaar-status" onclick="showContent('create_aadhar.php')">
            <?php echo $languageStrings['check_aadhaar_status'] ?? 'Check Aadhaar Status'; ?>
        </a>
        <a id="link-aadhaar-manual" onclick="showContent('link_aadhar.php')">
            <?php echo $languageStrings['link_aadhaar_manual'] ?? 'Link Aadhaar Manual'; ?>
        </a>
        <a id="check-aadhaar-pan" onclick="showContent('check_aadhar.php')">
            <?php echo $languageStrings['check_aadhaar_pan'] ?? 'Check Aadhaar PAN Link'; ?>
        </a>
        <a id="update-aadhaar" onclick="showContent('update_aadhar.php')">
            <?php echo $languageStrings['update_aadhaar'] ?? 'Update Aadhaar'; ?>
        </a>
        <a id="download-aadhaar" onclick="showContent('download_aadhar.php')">
            <?php echo $languageStrings['download_aadhaar'] ?? 'Download Aadhaar'; ?>
        </a>
        <a id="income-tax-return" onclick="showContent('income-tax-return')">
            <?php echo $languageStrings['income_tax_return'] ?? 'Income Tax Return'; ?>
        </a>
        <a id="verify-pan" onclick="showContent('verify-pan')">
            <?php echo $languageStrings['verify_pan'] ?? 'Verify Your PAN'; ?>
        </a>
        <a id="link-aadhaar" onclick="showContent('Link-adhar')">
            <?php echo $languageStrings['link_aadhaar'] ?? 'Link Aadhaar'; ?>
        </a>
        <a id="pay-tax" onclick="showContent('pay-tax')">
            <?php echo $languageStrings['pay_tax'] ?? 'Pay Tax'; ?>
        </a>
    </div>


    
<style>
        
        

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #002e5b;
            color: #fff;
            padding: 10px;
            text-align: center;
            height: 70px;
        }
        #sidebar-search {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}
        .navbar, .sidebar a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
    
        .sidebar {
            flex: 1;
            background: #002e5b;
            padding: 20px;
            width: 30%;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            color: #fff;
            cursor: pointer;
        }
 
        .content-section {
            /* display: none; Hide all sections initially */
       
            display: none;
        }
        .content-section.active {
            display: block; /*Show active section*/
           
        }
    </style>

 <script>
    // JavaScript function to show the relevant content section
    function showContent(sectionId) {
        // Hide all content sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.remove('active'));
        
        // Show the selected section
        const selectedSection = document.getElementById(sectionId);
        selectedSection.classList.add('active');
    }

    // Filter sidebar links based on the search input
    function filterLinks() {
        const searchInput = document.getElementById('sidebar-search').value.toLowerCase(); // Get the search input
        const links = document.querySelectorAll('.sidebar a'); // Get all the links in the sidebar

        // Loop through all the links and hide those that don't match the search term
        links.forEach(link => {
            const linkText = link.textContent.toLowerCase();
            if (linkText.includes(searchInput)) {
                link.style.display = ''; // Show link if it matches
            } else {
                link.style.display = 'none'; // Hide link if it doesn't match
            }
        });
    }

    // Show default content on page load
    document.addEventListener("DOMContentLoaded", function() {
        showContent('verify-pan'); // Show "Verify Your PAN" section by default
    });
</script> 
