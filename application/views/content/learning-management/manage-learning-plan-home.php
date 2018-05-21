
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-table bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Manage Learning Plan</h4>
                                                        <span>LMS Bulog</span>
                                                    </div>
                                                </div>
                                            </div>
<!--
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                   <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.html">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Basic Table</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
-->
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    <div class="col-md-6 col-xl-3">
                                        <a href="<?= base_url() ?>learning-management/manage-learning-plan/add-learning-plan">
                                            <button class="btn btn-primary"><i class="icofont icofont-plus"></i>Add Learning Plan</button>
                                        </a>
                                    </div><br>
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <!-- Hover table card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Hover table</h5>
                                            <span>use class <code>table-hover</code> inside table element</span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Learning Plan</th>
                                                            <th>Tanggal Mulai</th>
                                                            <th>Tanggal Selesai</th>
                                                            <th>Tahun</th>
                                                            <th>Tempat</th>
                                                            <th>Total Anggaran</th>
                                                            <th>Updated at</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no=1;
                                                            foreach ($lplist->result as $lp){
                                                            echo "<tr>
                                                                    <th scope='row'>$no</th>
                                                                    <td>$lp->kode_lp</td>
                                                                    <td>$lp->tgl_mulai</td>
                                                                    <td>$lp->tgl_selesai</td>
                                                                    <td>$lp->tahun</td>
                                                                    <td>$lp->tempat</td>
                                                                    <td>$lp->total_anggaran</td>
                                                                    <td>$lp->updated_at</td>
                                                                    <td><a href='".base_url()."learning-management/manage-learning-plan/detail/$lp->kode_lp'><i class='fa fa-eye'></i></a></td>
                                                                  </tr>";
                                                                $no++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hover table card end -->
                                </div>
                                <!-- Page-body end -->
                            </div>
                            </div>
                        </div>
                    </div>
                </div>