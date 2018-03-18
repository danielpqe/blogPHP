<?php

$result=false;

if (!empty($_POST)){
    $query=$pdo->prepare('insert into blog_posts (title,content) values (:title,:content)');
   $result= $query->execute([
            'title'=>$_POST['title'],
            'content'=>$_POST['content']
    ]);
}
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
        <h1>blog title</h1>
    </div>
    <div class="row">

        <div class="col-md-8">
            <h2>New Post</h2>
            <a class="btn btn-default" href="post.php">Back</a>
            <form method="post" action="insert-post.php">
                <div class="form-group">
                    <?php
                    if ($result)echo '<div class="alert alert-success">Success!</div>'
                    ?>
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
                <textarea class="form-control" name="content" id="content"></textarea>
                <br>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
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