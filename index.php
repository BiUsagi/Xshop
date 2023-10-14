<?php include "/admin/includes/header.php";?>
<?php include "/admin/includes/conncect.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation -->
    <?php include "./includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    $query = "SELECT * FROM posts";
                    $select_all_posts_query = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];                      
                        ?>                     
                    <h1 class="page-header">
                        Page Heading 
                        <small>Secondary Text</small>
                    </h1>
                    <!-- First Blog Post -->
                    <div class="card">
                        <h2 class="card-title">
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="card-text">by <a href="index.php"><?php echo $post_author; ?></a></p>
                        <p><span class="bi bi-clock"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-fluid" src="image/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p class="card-text"><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="bi bi-chevron-right"></span></a>
                        <hr>
                    </div>
                <?php } ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "./includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
    </div>
    
    <!-- /.container -->
    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Footer -->
    <?php include "./includes/footer.php"; ?>

</body>

</html>