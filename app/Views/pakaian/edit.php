<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Pakaian</h2>
            
        <form action="/pakaian/update/<?= $pakaian['id']; ?>" method="post">
            <?= csrf_field();  ?>
            <input type="hidden" name="slug" value="<?= $pakaian['slug']; ?>"> 
                    <div class="form-group row">
                        <label for="nama_pakaian" class="col-sm-2 col-form-label">Nama Pakaian</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_pakaian'))? 'is-invalid' 
                        : ''; ?>" id="nama_pakaian" name="nama_pakaian" autofocus value="<?= (old('nama_pakaian')) ? old('nama_pakaian') : $pakaian['nama_pakaian']; ?>">

                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_pakaian'); ?>
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $pakaian['harga']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_pakaian" class="col-sm-2 col-form-label">Jenis Pakaian</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis_pakaian" name="jenis_pakaian" value="<?= (old('jenis_pakaian')) ? old('jenis_pakaian') : $pakaian['jenis_pakaian']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="sampul" name="sampul" value="<?= (old('sampul')) ? old('sampul') : $pakaian['sampul']; ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </div>

  
        </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

