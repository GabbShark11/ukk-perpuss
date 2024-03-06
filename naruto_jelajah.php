<style>
  *{
      
  }
  a{
    text-decoration: none;
  }
  .imageWrapper{
    width: 450px;
    height: 450px;
  }
  .penulisWrapper{
    position: relative;
    bottom: 28pc;
    right: 17.4pc;
    font-size: 1.2em;
    color: rgb(162, 162, 162);
  }
  .judulWrapper{
    font-family: 'Poppins', sans-serif; 
    position: relative;
    bottom: 29pc;
    right: 18.2pc;
  }
  .judulDeskripsiWrapper{
    font-family: 'Poppins', sans-serif; 
    position: relative;
    font-size: 1.4em;
    bottom: 26pc;
    right: 16.9pc;
  }
  .isiDeskripsiWrapper{
    position: relative;
    left: -4.7pc;
    bottom: 26.5pc;
  }
  .detailWrapper{
    position: relative;
    bottom: 25pc;
    right: 19.9pc;
    font-size: 2rem;

  }
  .btn-warning{
  position: relative;
  right: 34.4pc;
  bottom: 15.5pc;
  color: #fff;
  border-radius: 50px;
  width: 260px;
  transition: 1s;
}
.btn-warning:hover{
  color: #ffc107;
  background-color: #212529;
  border: none;
}

.bookmarkWrapper{
  position: relative;
  bottom: 15pc;
  right: 33pc;
}
.bookmarkWrapper :hover{
  color: grey;
}

</style>

<div class="card text-center mt-3">
  <div class="card-header">
    <nav class="ms-2 mt-2 fs-5" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=daftar_buku">Daftar Buku</a></li>
      <li class="breadcrumb-item active" aria-current="page">Naruto</li>
    </ol>
    </nav>
  </div>
  <div class="card-body">
    <div class="imageWrapper mt-5 ms-5 d-flex">
      <img class="ms-5"  src="img/naruto.jpg" alt="">
    </div>
    <div class="isiWrapper">
      <p class=" penulisWrapper">Masashi Kishimoto</p>  
      <p class=" judulWrapper text-dark fs-1">Naruto</p>
      <p class=" judulDeskripsiWrapper text-secondary">Deskripsi Buku :</p>
      <p class=" isiDeskripsiWrapper text-dark fs-4">Buku yang bercerita tentang dunia shinobi atau ninja</p>
      <p class="text-secondary detailWrapper fs-4">Detail :</p>  
      <p class="text-secondary detailWrapper fs-5"></p>  
    </div>
    <a href="index_user.php?page=peminjaman_tambah">
      <button class="btn btn-warning fs-5">Pinjam</button>
    </a>

    <a class="bookmarkWrapper" href="">
      <i class="text-dark fs-1 fa-solid fa-bookmark"></i>
    </a>
  </div>
  <!-- footer -->
  <div class="card-footer text-center text-body-secondary">
    <div class="small">
      &copy; 2024 Your<span class="text-warning"> Library.</span></div>
    </div>
</div>