<h1 class="mt-4">Stok Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="?page=buku_tambah" class="btn btn-warning mb-3">+ Tambah Buku</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>Nama Kategori</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>

            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $data['kategori']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td>
                            <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-warning mx-2">Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                        
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
