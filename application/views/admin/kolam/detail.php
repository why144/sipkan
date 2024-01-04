
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <?= $this->session->flashdata('message'); ?>
                        <div class="card mb-4">
                            <div class="card-header">
                              <h3>Detail <?= $kolam['nama_kolam']; ?></h3>   
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th scope="row">Nama Kolam</th>
                                        <td><?= $kolam['nama_kolam']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tipe Kolam</th>
                                        <td><?= $kolam['tipe']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Ikan</th>
                                        <td><?= $kolam['jenis_ikan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Ikan</th>
                                        <td><?= $kolam['jumlah_ikan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Pakan</th>
                                        <td><?= $kolam['jenis_pakan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Pakan per Hari (Kg)</th>
                                        <td><?= $kolam['jml_pakan_hari']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Tebar</th>
                                        <?php if($kolam['tanggal_tebar'] == 0) : ?>
                                            <td></td>
                                        <?php else : ?>
                                            <td><?= date('d-m-Y', $kolam['tanggal_tebar']); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Umur</th>
                                        <?php if($kolam['tanggal_tebar'] == 0) : ?>
                                        <td>0</td>
                                        <?php else : ?>
                                        <td><?= $umur; ?> hari</td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Masa Panen</th>
                                        <td><?= $kolam['masa_panen']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Estimasi Panen</th>
                                        <?php if($kolam['estimasi_panen'] == 0) : ?>
                                        <td></td>
                                        <?php else : ?>
                                        <td><?= date('d-m-Y', $kolam['estimasi_panen']); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Ikan Mati</th>
                                        <td><?= $kolam['jumlah_ikan_mati'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Action</th>
                                        <?php if($kolam['estimasi_panen'] == 0) : ?>
                                            <td>
                                            <a href="<?= base_url('admin/tebarIkan/'); ?><?= $kolam['id'] ?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTebarIkan">Tebar Ikan</a>
                                            </td>
                                        <?php else : ?>
                                        <td>
                                        <a href="<?= base_url('admin/beriMakan/'); ?><?= $kolam['jenis_pakan']; ?>/<?= $kolam['jml_pakan_hari']; ?>/<?= $kolam['id']; ?>" type="button" id="tombolMakan" class="btn btn-warning" onclick="return confirm('Yakin?')">Beri Makan</a>
                                        
                                         <a href="<?= base_url('admin/kolamPanen/'); ?><?= $kolam['id'] ?>" type="button" class="btn btn-success ml-3" onclick="return confirm('Yakin?')">Panen</a>

                                         <a href="#" type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#formModalEditKolam">Edit</a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                </table>
                                <hr>

                                
                                    <a href="<?= base_url('admin/kolam'); ?>" type="button" class="btn btn-primary">Kembali</a>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit kolam-->
                <div class="modal fade" id="formModalEditKolam" tabindex="-1" role="dialog" aria-labelledby="formModalEditKolamLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalEditKolamLabel">Edit Data Kolam</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                 <div class="modal-body">
                                    <form action="<?= base_url('admin/editKolam/') ?><?= $kolam['id']; ?>" method="POST">
                                    <div class="form-group">
                                                    <label for="jenis_pakan">Jenis Pakan</label>
                                                    <select class="custom-select" name="jenis_pakan" id="jenis_pakan">
                                                        <?php foreach($jenis_pakan as $pakan) : ?>
                                                            <option value="<?= $pakan['jenis_pakan'] ?>"><?= $pakan['jenis_pakan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                    </div>
                                        <div class="form-group">
                                            <label for="jumlah_pakan_hari">Jumlah Pakan/hari (kg)</label>
                                            <input type="text" class="form-control" id="jumlah_pakan_hari" name="jumlah_pakan_hari">
                                        </div>
                                        <div class="form-group">
                                            <label for="masa_panen">Masa Panen</label>
                                            <input type="text" class="form-control" id="masa_panen" name="masa_panen">
                                        </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end Modal edit kolam-->

                <!-- modal tebar ikan -->
                <!-- Modal -->
                        <div class="modal fade" id="modalTebarIkan" tabindex="-1" role="dialog" aria-labelledby="modalTebarIkanLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTebarIkanLabel">Form Tebar Ikan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="<?= base_url('admin/tebarIkan/') ?><?= $kolam['id']; ?>" method="post">
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
                                            <label for="jumlah_pakan_hari">Jumlah Pakan/hari (kg)</label>
                                            <input type="text" class="form-control" id="jumlah_pakan_hari" name="jumlah_pakan_hari">
                                        </div>
                                        <div class="form-group">
                                            <label for="masa_panen">Masa Panen</label>
                                            <input type="text" class="form-control" id="masa_panen" name="masa_panen">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tebar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <!-- end of modal tebar ikan -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->