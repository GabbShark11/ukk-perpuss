<h1 class="mt-4">Ubah Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
            <?php 
            $id = $_GET['id'];
            if(isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $gambar = $_FILES['gambar']; // File upload information
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];
            
                // Check if file is uploaded successfully   
                if($gambar['error'] == UPLOAD_ERR_OK) {
                    // Move uploaded file to desired location
                    $gambar_path = 'uploads/' . $gambar['name'];
                    move_uploaded_file($gambar['tmp_name'], $gambar_path);
                } else {
                    // Handle file upload error
                    echo '<script>alert("Failed to upload file."); </script>';
                }
            
                // Update database with file path (if uploaded successfully)
                $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', gambar='$gambar_path', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku=$id");
            
                if($query){
                    echo '<script>alert("Buku Berhasil Diubah."); </script>';
                } else {
                    echo '<script>alert("Buku Gagal Diubah."); </script>';
                }
            }
            
            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
            $data = mysqli_fetch_array($query);
            ?>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Ketegori</div>
                    <div class="col-md-8">
                        <select name="id_kategori" class="form-control">
                            <?php
                                $kat = mysqli_query($koneksi, "SELECT*FROM  kategori");
                                while($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected';?> value="
                                    <?php 
                                        echo $kategori['id_kategori']; ?>"> <?php echo $kategori['kategori']; ?> 
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Judul</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" id=""></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Penulis</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis" id=""></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Gambar</div>
                    <div class="col-md-8">
                        <input type="file" accept="image/*" value="<?php echo $data['gambar']; ?>" class="form-control" name="gambar" id="" required="required">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Penerbit</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit" id=""></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Tahun Terbit</div>
                    <div class="col-md-8"><input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit" id=""></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi']; ?>" </textarea>            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" href="?page=buku" class="btn btn-warning" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=buku" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    </div>
</div>