<?php

$query=$pdo->prepare('select * from blog_posts');
$query->execute();
$blogposts=$query->fetchAll();

?>

<html>
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1>Blog Title</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
                <ul>
                    <li>
                        <a href="post.php">Manage Post</a>
                    </li>
                </ul>

        </div>
        <div class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dicta error esse eum iure laudantium, molestiae natus perspiciatis placeat praesentium quasi quisquam, recusandae repellat sequi, temporibus ullam voluptatem? Harum, iusto.
        </div>
    </div>
    <div class="row">
        <footer>
            This is the footer
        </footer>
    </div>
</div>


</div>
</body>
</html>