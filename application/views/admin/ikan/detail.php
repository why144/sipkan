

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Detail Data Ikan</h1>
                    <div class="row">
                        <div class="col-md-8">
                            <?php foreach($ikan as $ikn) : ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Ikan <?= $ikn['jenis_ikan']; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $ikn['nama_kolam']; ?></h6>
                                        <table class="table table-hover">
                                            <tr>
                                                <th scope="row">Jumlah Ikan</th>
                                                <td><?= $ikn['jumlah_ikan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Tebar</th>
                                                <td><?= date('d-m-Y', $ikn['tanggal_tebar']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Estimasi Panen</th>
                                                <td><?= date('d-m-Y', $ikn['estimasi_panen']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
