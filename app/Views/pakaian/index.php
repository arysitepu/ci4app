<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
      <div class="col">
          <a href="/Pakaian/create" class="btn btn-primary mt-3">Tambah Data Pakaian</a>
            <h1 class="mt-2">Daftar Pakaian</h1>
          <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Pakaian</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>

    <?php foreach($pakaian as $p): ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><img src="/img/<?= $p['sampul']; ?>" alt="" class="sampul"></td>
      <td><?= $p['nama_pakaian']; ?></td>
      <td>
          <a href="/pakaian/<?= $p['slug']; ?>" class="btn btn-success">Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
 
</table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>