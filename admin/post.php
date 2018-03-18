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
                <h2>List Posts</h2>
                <a class="btn btn-primary" href="insert-post.php">New post</a>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    <?php
                    foreach ($blogposts as $blogpost){
                        echo '<tr>';
                        echo '<td>'.$blogpost['title'].'</td>';
                        echo '<td>Edit</td>';
                        echo '<td>Delete</td>';
                        echo '<tr>';

                    }

                    ?>
                </table>


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