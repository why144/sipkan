

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                                <!-- Modal -->
                                <div class="modal fade" id="formModalIkanMati" tabindex="-1" role="dialog" aria-labelledby="formModalIkanMatiLabel"  aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formModalIkanMatiLabel">Form Ikan Mati</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('admin/tambahIkanMati'); ?>" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama_kolam">Nama Kolam</label>
                                                            <select class="custom-select" id="nama_kolam" name="nama_kolam">
                                                            <?php foreach($kolam as $klm) : ?>
                                                                <option value="<?= $klm['nama_kolam']; ?>"><?= $klm['nama_kolam']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penyebab">Penyebab</label>
                                                        <input type="text" class="form-control" id="penyebab" name="penyebab">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah_ikan_mati">Jumlah Ikan Mati</label>
                                                        <input type="text" class="form-control" id="jumlah_ikan_mati" name="jumlah_ikan_mati">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
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

                    <div class="row">
                        <div class="col-md-8 mb-4">
                        <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-header">
                                <h1 class="h3 mb-4 text-gray-800">Data Ikan Mati</h1>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModalIkanMati">
                                Tambah Data Ikan Mati
                                </button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Kolam</th>
                                                <th scope="col">Jenis Ikan</th>
                                                <th scope="col">Penyebab</th>
                                                <th scope="col">Jumlah Ikan Mati</th>
                                                <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ikan_mati as $im) : ?>
                                            <tr>
                                                <td><?= $im['nama_kolam']; ?></td>
                                                <td><?= $im['jenis_ikan']; ?></td>
                                                <td><?= $im['penyebab']; ?></td>
                                                <td><?= $im['jumlah_ikan_mati']; ?></td>
                                                <td><?= $im['tanggal']; ?></td>
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
