
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-md-8 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <h3 class="text-bold">Data Ikan</h3>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <?php foreach($ikan as $i) : ?>
                                    <li class="list-group-item">
                                        <?= $i['jenis_ikan']; ?>
                                        <a href="<?= base_url('admin/detailIkan/') ?><?=$i['jenis_ikan']; ?>" type="button" class="float-right"><i class="fas fa-eye"></i></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
