<?= $this->extend('layout/template');?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2" >Detail Pakaian</h2>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/img/<?= $pakaian['sampul']; ?>" alt="..." width="180">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $pakaian['nama_pakaian'] ?></h5>
                    <p class="card-text"><b>Harga:</b> <?= $pakaian['harga'] ?></p>
                    <p class="card-text"><b>Jenis Pakaian:</b> <?= $pakaian['jenis_pakaian'] ?></p>
                    <p class="card-text"><small class="text-muted"><?= $pakaian['created_at']; ?></small></p>

                    <a href="/pakaian/edit/<?= $pakaian['slug'] ?>" class="btn btn-warning">Edit</a>

                    <form action="/pakaian/<?= $pakaian['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?.');">Delete</button>
                    </form>
                    


                    <a href="/pakaian" class="btn btn-primary">Kembali Ke daftar pakaian</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>