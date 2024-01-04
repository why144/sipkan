

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-4">
                        <div class="col-md-6">

                       <!-- Modal -->
                                <div class="modal fade" id="formModalPakan" tabindex="-1" role="dialog" aria-labelledby="modalLabelPakan" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabelPakan">Form Tambah Pakan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/tambahPakan'); ?>" method="POST">
                                            <input type="hidden" name="id" id="id">
                                                <div class="form-group">
                                                    <label for="jenis_pakan">Jenis Pakan</label>
                                                    <input type="text" class="form-control" id="jenis_pakan" name="jenis_pakan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="stock">Stock (kg)</label>
                                                    <input type="text" class="form-control" id="stock" name="stock">
                                                </div>
                                        
                                        </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambah Pakan</button>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    
                    

                    <div class="row">
                        <div class="col-md-8">
                        <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                            <div class="card-header">
                            <h1 class="h3 mb-4 text-gray-800">Data Pakan</h1>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary tombolTambahPakan" data-toggle="modal" data-target="#formModalPakan">
                            Tambah Data Pakan
                            </button>
                            </div>
                              <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Jenis Pakan</th>
                                                <th scope="col">Stock (kg)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pakan as $pk) : ?>
                                            <tr>

                                                <td><?= $pk['jenis_pakan']; ?></td>
                                                <td><?= $pk['stock']; ?></td>
                                                <td>
                                                <a href="#" role="button" id="action" data-toggle="modal" data-target="#formModalPakan" class="tampilModalUbahPakan" data-id="<?=$pk['id']?>"><i class="fas fa-edit"></i></a>

                                                    <a href="<?= base_url('admin/hapusPakan/'); ?><?= $pk['id']; ?>" id="action"  onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i></a>
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
