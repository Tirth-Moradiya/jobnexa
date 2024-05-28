<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" initial-scale="1.0">
    <link rel="stylesheet" href="./css/style.css">

    <title>Document</title>
</head>

<body>
    <?php include "./Client/header.php"; ?>
    <?php include "./Client/hero.php"; ?>
    <section class="search-job">
        <div class="container-job">
            <h2 class="section-title">Search Jobs</h2>
            <form class="job-search-form">
                <div class="form-group">
                    <input type="text" placeholder="Enter keywords, job title, or company name">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Location">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </section>
    <?php include "./Client/category.php"; ?>


    <?php include "./Client/hero2.php"; ?>
    <?php include "./Client/listed-job.php"; ?>
    <?php include "./Client/footer.php"; ?>
</body>

</html>