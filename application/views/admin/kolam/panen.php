

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <div class="row">
                        <div class="col-md-8 mb-4">
                        <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-header">
                                <h1 class="h3 text-bold">Data Hasil Panen</h1>
                                </div>
                                <div class="card-body">
                                     <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Kolam</th>
                                                <th scope="col">Jenis Ikan</th>
                                                <th scope="col">Jumlah Ikan Hidup</th>
                                                <th scope="col">Jumlah Ikan Mati</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($panen as $pn): ?>
                                            <tr>
                                                <td><?= date('d-m-Y', $pn['tanggal']); ?></td>
                                                <td><?= $pn['nama_kolam']; ?></td>
                                                <td><?= $pn['jenis_ikan']; ?></td>
                                                <td><?= $pn['jumlah_ikan']; ?></td>
                                                <td><?= $pn['jumlah_ikan_mati']; ?></td>
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
