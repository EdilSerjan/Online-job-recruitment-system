<!doctype html>
<html lang="en">
<head>
    <title>Job List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/myStyle.css">
    <?php require_once('../config/db.php') ?>
    <?php
    $query = "select * from jobs order by post_date desc";    
    $result = @mysqli_query($dbc, $query);
    if ($result) {
      $jobs=mysqli_fetch_all($result, MYSQLI_ASSOC);
      mysqli_free_result($result);
    }
    else {
      $error_msg = mysqli_error($dbc);
      echo $error_msg;
    }
    ?>
</head>
<body>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top mb-3">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Best Job</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="jobList.php">Job List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myCV.php">My CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="progress.php">Apply Process</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="btn btn-default btn-rounded " data-toggle="modal" data-target="#exampleModalLong"
                       id="signInLink">Sign in</a></li>
            </ul>
        </div>
    </div>
</nav>

<br>

<!--container-->
<div class="container">

    <!--search form-->
    <div class="row">
        <form class="form-inline col-md-8 offset-2 shadow-lg py-4">
             <input type="text" class="form-control transparent-input text-primary col-md-8 offset-1" placeholder="I am looking for...">
                <button type="submit" class="btn btn-outline-primary text-md-center col-md-1.5 offset-1">Search</button>
        </form>
    </div>

    <br>

    <!--filter options-->
    <form>
        <div class="form-row justify-content-end">
            <div class="form-group col-md-2">
 
                <select class="styled-select blue semi-square">
                    <option selected>Order by</option>
                    <option >By date</option>
                    <option>By salary</option>
                </select>
            </div>
            <div class="form-group col-md-2">

                <select class="styled-select blue semi-square">
                    <option selected>For all time</option>
                    <option >For month</option>
                    <option>For week</option>
                </select>
            </div>
        </div>

    </form>
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        All Jobs:
    </h3>

    <!--job list:-->
    <?php foreach($jobs as $job): ?>
            <!-- job boxes-->
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250 shadow-lg jobBox4">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3><strong class="d-inline-block mb-0 text-primary"><?php echo $job['job_name']?></strong></h3>
                            <p class="mb-0">
                                <a class="text-dark" href="#"><?php echo $job['job_location']?></a>
                            </p>
                            <div class="mb-1 text-muted"><?php echo $job['post_date']?></div>
                            <p class="card-text mb-auto"><?php echo substr($job['job_description'],0,100)."..."?></p>
                            <a href="details.php?id=<?php echo $job['job_id']?>">Continue reading</a>

                        </div>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>

    <hr>
    <!-- Copyright -->

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Yedil, Aigerim</p>
    </footer>

</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</html>