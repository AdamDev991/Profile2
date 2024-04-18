<!DOCTYPE html>
<?php
    function slugifier($entry)
    {
        $transformText = strtolower($entry);
        $transformText = str_replace(array("/","<",">","$","-","*",";","!","?",":",",","#",'"',"'"),"", $transformText);
        $transformText = str_replace(array("%"),"percent",$transformText);
        $transformText = str_replace(array(" "),"-",$transformText);
        $transformText = str_replace(array("á","à","â","ä","å","ã"),"a",$transformText);
        $transformText = str_replace(array("æ"),"ae",$transformText);
        $transformText = str_replace(array("ç"),"c",$transformText);
        $transformText = str_replace(array("é","è","ê","ë"),"e",$transformText);
        $transformText = str_replace(array("í","ì","î","ï"),"i",$transformText);
        $transformText = str_replace(array("ó","ò","ô","ö","õ","ø"),"o",$transformText);
        $transformText = str_replace(array("ç"),"c",$transformText);
        $transformText = str_replace(array("ñ"),"n",$transformText);
        $transformText = str_replace(array("œ"),"oe",$transformText);
        $transformText = str_replace(array("š"),"s",$transformText);
        $transformText = str_replace(array("ú","ù","û","ü"),"u",$transformText);
        $transformText = str_replace(array("ý","ÿ"),"y",$transformText);
        $transformText = str_replace(array("ž"),"z",$transformText);
        return $transformText;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Movies Land</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 50px;
        }

        #FilmName {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        #FilmName:focus {
            outline: none;
        }

        #SubmitBtn {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        #SubmitBtn:focus {
            outline: none;
        }

        #SubmitBtn:hover {
            background-color: #0056b3;
        }

        .card {
            background-color: #fff;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 400px;
            object-fit: cover;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .card-text::first-letter {
            text-transform: capitalize;
        }

        @media (max-width: 768px) {
            .card-img-top {
                height: 250px; /* Adjust height for mobile devices */
            }

            .card-title {
                font-size: 1.2rem; /* Adjust font size for mobile devices */
            }
        }
    </style>
<body>
    <!-- Form Beggin -->
    <form action="index.php" method="POST">
        <input type="text" name="filmName" id="FilmName" placeholder="Enter Film Name">
        <button type="submit" id="SubmitBtn" name="Butt">Search</button>
        

        
    </form>
    <!-- Form End -->

</body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            // Get the film name from the form
            $filmName = $_POST["filmName"];

            // Your TMDb API key
            $apiKey = 'db8023704ba8fbf3caf0a6b8c6ac4cff';

            // Your TMDb API endpoint for searching movies by title
            $apiUrl = 'https://api.themoviedb.org/3/search/movie?api_key=' . $apiKey . '&query=' . urlencode($filmName);
            // Make API request using cURL
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            // Decode JSON response
            $data = json_decode($response, true);
            // $data2 = json_encode($data, JSON_PRETTY_PRINT);
            // echo '<pre>' . $data2 . '</pre>';

            // Display movie information
            if ($data && isset($data['results']) && !empty($data['results'])) {
                
                echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                foreach ($data['results'] as $movie) {
                    $movietitle = $movie['title'];
                    $moviedesc = $movie['overview'];
                    $movieimg = "https://image.tmdb.org/t/p/original/".$movie['poster_path'];
                    $moviedate = $movie['release_date'];
                    $movievote = $movie['vote_average'];
                    $movieadult = $movie['adult'] ? '18+' : '17';
                    // Inside the loop where you're iterating through each movie
                    $genreIds = $movie['genre_ids']; // Get the genre IDs for the current movie
                    $genres = array(
                        28 => "Action", 
                        12 => "Adventure", 
                        16 => "Animation", 
                        35 => "Comedy", 
                        80 => "Crime", 
                        99 => "Documentary", 
                        18 => "Drama", 
                        10751 => "Family", 
                        14 => "Fantasy", 
                        36 => "History", 
                        27 => "Horror", 
                        10402 => "Music", 
                        9648 => "Mystery", 
                        10749 => "Romance", 
                        878 => "Science Fiction", 
                        10770 => "TV Movie", 
                        53 => "Thriller", 
                        10752 => "War", 
                        37 => "Western"
                    ); // Array mapping genre IDs to their names

                    $moviegenres = ''; // Initialize an empty string to store genre names
                    foreach ($genreIds as $genreId) {
                    $moviegenres .= $genres[$genreId] . ', '; // Fetch the genre name from the array and append it to the string
                    }
                    $moviegenres = rtrim($moviegenres, ', ');
                                    // Add more information as needed
            ?>

            <div class="col" style ="width:20%;">
                <div class="card h-100">
                <img src="<?php echo $movieimg; ?>" class="card-img-top" alt="<?php echo $movietitle ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $movietitle; ?></h5>
                    <?php 
                    for( $i = 0; $i < $movievote; $i++)
                    {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/></svg>';
                    }
                    ?>
                    <p class="card-text"><?php echo $moviedesc; ?></p>
                    <br> 
                    <p class="card-text"><?php echo $moviedate;?></p>
                    <br>
                    <p class="card-text"><?php echo $moviegenres;?></p>
                    <br>
                    <p class="card-text"><?php echo $movieadult;?></p>
                </div>
                </div>
            </div>

            <?php
                }
            } else {
                echo '<p>No results found.</p>';
            }
                echo'</div>';
        }
    ?>
</html>