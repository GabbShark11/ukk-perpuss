<h1 class="mt-4"> Detail Petugas</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="?page=petugas_tambah" class="btn btn-warning mb-3">+ Tambah Petugas</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM user WHERE level IN ('petugas')");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['no_telepon']; ?></td>
                        <td>
                            <a href="?page=petugas_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-warning mx-2">Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=petugas_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
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