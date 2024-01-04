

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-3">
                        <div class="col-md-8">

                                        <!-- Modal tambah dan edit -->
                            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formModalLabel">Form Tambah Kolam</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/tambahKolam'); ?>" method="POST">
                                            <input type="hidden" name="id" id="id">
                                                <div class="form-group">
                                                    <label for="nama_kolam">Nama Kolam</label>
                                                    <input type="text" class="form-control" id="nama_kolam" name="nama_kolam">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipe">Tipe Kolam</label>
                                                    <input type="text" class="form-control" id="tipe" name="tipe">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_ikan">Jenis Ikan</label>
                                                    <select class="custom-select" name="jenis_ikan" id="jenis_ikan">
                                                        <?php foreach($jenis_ikan as $ikan) : ?>
                                                            <option value="<?= $ikan['jenis_ikan'] ?>"><?= $ikan['jenis_ikan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah_ikan">Jumlah Ikan</label>
                                                    <input type="text" class="form-control" id="jumlah_ikan" name="jumlah_ikan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_pakan">Jenis Pakan</label>
                                                    <select class="custom-select" name="jenis_pakan" id="jenis_pakan">
                                                        <?php foreach($jenis_pakan as $pakan) : ?>
                                                            <option value="<?= $pakan['jenis_pakan'] ?>"><?= $pakan['jenis_pakan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jml_pakan_hari">Jumlah Pakan Per Hari (Kg)</label>
                                                    <input type="text" class="form-control" id="jml_pakan_hari" name="jml_pakan_hari">
                                                </div>
                                                <div class="form-group">
                                                    <label for="masa_panen">Masa Panen (hari)</label>
                                                    <input type="text" class="form-control" id="masa_panen" name="masa_panen">
                                                </div>
                                            
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8 mb-4">
                        <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-header">
                                <h1 class="h3 mb-4 text-gray-800">Data Kolam</h1>
                                 <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                                    Tambah Kolam
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Kolam</th>
                                                <th scope="col">Jenis Ikan</th>
                                                <th scope="col">Estimasi Panen</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($kolam as $kl) : ?>
                                            <tr>
                                                <td><?= $kl['nama_kolam']; ?></td>
                                                <td><?= $kl['jenis_ikan']; ?></td>
                                                <?php if($kl['estimasi_panen'] == 0) :  ?>
                                                <td></td>
                                                <?php else : ?>
                                                <td><?= date('d-m-Y', $kl['estimasi_panen']); ?></td>
                                                <?php endif; ?>
                                                <td>
                                                    <a href="<?= base_url('admin/detailKolam/') ?><?=$kl['id'];?>" role="button" class="ml-3" data-id="<?=$kl['id']?>" ><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
