<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Results</title>
</head>
<body>
    <div class="container">
        <?php
        // Sample data
        $data = [
            "Result 1",
            "Result 2",
            "Result 3",
            // Add more data as needed
        ];

        // Get search term from the form
        $searchTerm = isset($_GET['searchInput']) ? strtolower($_GET['searchInput']) : '';

        // Filter data based on search term
        $searchResults = array_filter($data, function ($result) use ($searchTerm) {
            return stripos($result, $searchTerm) !== false;
        });

        // Generate a new HTML page for results
        $resultPage = "<div class='container'>";
        foreach ($searchResults as $result) {
            $resultPage .= "<div class='resultItem'>$result</div>";
        }
        $resultPage .= "</div>";

        // Save the generated content to a new file (you may need to adjust file permissions)
        file_put_contents('search_results_page.html', $resultPage);

        // Provide a link to the generated results page
        echo "<p>Search results have been saved. <a href='search_results_page.html'>View Results</a></p>";
        ?>
    </div>
</body>
</html>
