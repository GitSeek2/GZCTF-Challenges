<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Page</title>
    <link rel="stylesheet" href="assert/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="assert/style.css">
    <link rel="stylesheet" href="assert/logo_style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">成员信息查询系统</a>
</nav>
<div id="matrix-rain"></div>

<div class="search-form mb-2 mt-5">
    <form id="searchForm">
        <div class="form-group">
            <input type="text" class="form-control" id="searchInput"
                   placeholder="Enter id to search, for example, 221103">
        </div>
    </form>
</div>
<div class="container mt-2 ">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-7 p-5">
                        <div class="card-body">
                            <p class="text-white-50 mb-4 md-p">
                                1
                                <?php
                                //                    include "search.php";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assert/code.js"></script>
<script src="assert/search.js"></script>
</body>
</html>