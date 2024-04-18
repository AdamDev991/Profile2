<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .project {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            width: calc(45% - 20px);
            transition: transform 0.3s ease;
        }

        .project:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .project h2 {
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .project p {
            color: #666;
            font-size: 16px;
            margin-bottom: 15px;
            line-height: 1.5;
            max-height: 90px;
            overflow: hidden;
        }

        .project a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .project a:hover {
            color: #0056b3;
        }

        @media (max-width: 1024px) {
            .project {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .project {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Calculator -->
        <div class="project">
            <h2>Calculator</h2>
            <p>Create a PHP-based calculator application that performs basic arithmetic operations. Users can input mathematical expressions through a user-friendly interface, and the application will evaluate and display the result. Ensure proper validation to handle edge cases and prevent errors, such as division by zero or invalid input.</p>
            <a href="./Calculatrice/index.phpdraggable="true">View Project</a>
        </div>
        <!-- Clear Text from special characters -->
        <div class="project">
            <h2>Clear Text from Special Characters</h2>
            <p>Develop a PHP script that takes input text and removes special characters, leaving only alphanumeric characters and spaces. This script can be useful for sanitizing user input, cleaning up data before storage or processing, or preparing text for display in web applications.</p>
            <a href="./ClearTextExercice/index.php" draggable="true">View Project</a>
        </div>
        <!-- Table Generator -->
        <div class="project">
            <h2>Table Generator</h2>
            <p>Build a PHP-based tool for generating HTML tables dynamically from structured data. Users can input data in a tabular format, and the PHP script will generate corresponding HTML code to display the table. Allow customization options for the table appearance, such as specifying table headers, cell formatting, and styling.</p>
            <a href="./TableInput/index.php" draggable="true">View Project</a>
        </div>
        <!-- CSV Table Generator -->
        <div class="project">
            <h2>CSV Table Generator</h2>
            <p>Develop a PHP web application that allows users to upload CSV files and automatically generates HTML tables from the uploaded data. The PHP script will parse the CSV file, extract the data, and generate an HTML table to display the content. Implement error handling to gracefully manage cases of invalid or corrupted CSV files, ensuring a smooth user experience. Additionally, provide options for customizing the appearance of the generated table before displaying it to the user.</p>
            <a href="./CsvTableau/index.php" draggable="true">View Project</a>
        </div>
        <!-- MovieInfo Lookup -->
        <div class="project">
            <h2>MovieInfo Lookup</h2>
            <p>MovieInfo Lookup is a web-based application that allows users to search for information about movies or TV series. By entering the name of a film or series into the search bar, users can retrieve detailed information such as its rating, genres, and release date. The application utilizes a Movies Database API to fetch accurate and up-to-date information about the specified title. Whether users are looking for the latest blockbuster or a classic favorite, MovieInfo Lookup provides a convenient and efficient way to access essential details about any movie or TV series. With its intuitive interface and comprehensive database integration, MovieInfo Lookup is the go-to tool for cinephiles and TV enthusiasts alike.</p>
            <a href="./moviesLand/index.php" draggable="true">View Project</a>
        </div>
    </div>
</body>
</html>
