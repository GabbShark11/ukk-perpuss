<h1 class="mt-4">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $deskripsi = $_POST['deskripsi'];

                        // Memeriksa apakah file telah diunggah
                        if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                            $gambar_path = 'uploads/' . $_FILES['gambar']['name'];
                            move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path);
                        } else {
                            // Jika file tidak diunggah, tetapkan nilai kosong ke $gambar_path
                            $gambar_path = '';
                        }

                        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,gambar,penulis,penerbit,tahun_terbit,deskripsi) values ('$id_kategori','$judul','$gambar_path','$penulis','$penerbit','$tahun_terbit','$deskripsi')");

                        if($query){
                            echo '<script>alert("Data Berhasil Ditambah."); </script>';
                        }else{
                            echo '<script>alert("Data Gagal Ditambah."); </script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Judul</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="judul" id=""></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Penulis</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penulis" id=""></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Gambar</div>
                        <div class="col-md-8"><input type="file" class="form-control" name="gambar" id=""></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Penerbit</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penerbit" id=""></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" id=""></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control"></textarea>            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-warning" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
