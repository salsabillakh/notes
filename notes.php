<?php
require_once('database.php');
$data=tampildata('notes');
$nomor=0;
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:login.php?msg=belum_login");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">User</a>
            </li>
            </li>
          </ul>
          <a href="logout.php"><button class="btn btn-outline-success">Logout</button></a>
        
        </div>
      </nav>
      <div class="container">
        <center><h1>DAFTAR CATATAN</h1></center>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID</th>
      <th scope="col">Created at</th>
      <th scope="col">Notes</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($data as $item) : ?>
        <?php $nomor++; ?>
        <tr>
            <th scope="row"><?php echo "$nomor"; ?></th>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['created_at']; ?></td>
            <td><?php echo $item['note']; ?></td>
            <td><?php echo "<a href='edit.php?id=$item[id]'>Edit</a> | <a href='javascript:hapusData(".$item['id'].")'>Delete</a>"; ?></td>
            <tr>
    <?php endforeach ?>
    
  </tbody>
</table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script languange="JavaScript" type="text/javascript">
      function hapusData(id){
        if(confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'delete.php?id=' + id;
        }
      }
    </script>
  </body>
  </html>