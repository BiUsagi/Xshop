<?php include "header.php";?>
<?php include "db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    <?php
        echo "<br> <br> <br>";
    ?>

    <!-- Page Content -->
    <div class="container">
        

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8"> 
                <?php
                    $thongBao = "";
                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];

                        $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
                        $search_query = mysqli_query($conn, $query);

                        if(!$search_query){
                            $thongBao = die("Chả có gì cả" . mysqli_error($conn));
                        } else {
                            $count = mysqli_num_rows($search_query);
                            if($count == 0){
                                $thongBao = "<h1> Dell có kết quả </h1>";
                            } else {
                                while($row = mysqli_fetch_assoc($search_query)){
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
                                        <img class="img-fluid" src="/image/<?php echo $post_image; ?>" alt="">
                                        <hr>
                                        <p class="card-text"><?php echo $post_content; ?></p>
                                        <a class="btn btn-primary" href="#">Read More <span class="bi bi-chevron-right"></span></a>
                                        <hr>
                                    </div>

                                <?php
                                }
                            }
                        }
                    }
                ?>




                <?php
                    echo $thongBao;
                ?>



        


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <?php include "footer.php"; ?>

</body>
</html>
