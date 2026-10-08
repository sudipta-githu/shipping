<?php
require_once 'auth.php';
require_once 'db.php';
require_once 'clean.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
        <style>
     body {
      overflow-x: hidden;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background: #212529;
      padding-top: 20px;
    }

    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: #343a40;
      color: #fff;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .sidebar .menu-title {
      color: white;
      font-size: 20px;
      font-weight: bold;
      padding: 0 20px 20px;
    }

    .menus{
      font-weight:600;
      
    }

    .home{
        color: #00ff40;
    }
    .hero{
        color: #d9ff00;
    }
    .company{
        color: #e100ff;
    }
    .blog{
        color: #0099ff;
    }
    .log{
        color: #ff0000;
    }

    .bg-dark {
    background-color: rgb(0, 0, 0) !important;
}
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline menus">Dashboard</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link align-middle px-0 home">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="herobanner.php" class="nav-link px-0 align-middle hero">
                            <i class="fs-4 bi bi-border-all"></i></i> <span class="ms-1 d-none d-sm-inline">Hero Banner</span></a>
                    </li>
                    <li>
                        <a href="company.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle company">
                            <i class="fs-4 bi bi-building"></i></i> <span class="ms-1 d-none d-sm-inline">Company</span></a>                    
                    </li>
                    <li>
                        <a href="blog.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle blog">
                            <i class="fs-4 bi bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Blog</span> </a>
                            
                    </li>
                    <li>
                        <a href="services.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle blog">
                            <i class="fs-4 bi bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Services</span> </a>
                            
                    </li>
                    <li>
                        <a href="logout.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle log">
                            <i class="bi bi-box-arrow-left"></i></i> <span class="ms-1 d-none d-sm-inline">Log Out</span> </a>
                            
                    </li>
                </ul>
                
            </div>
        </div>

        <div class="col py-3">
            Content area...
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
</html>