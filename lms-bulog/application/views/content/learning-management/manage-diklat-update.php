
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                        <div class="col-sm-12">
                                            <?php 
                                                foreach ($diklat->result as $dl){}
                                                ?>
                                            <div class="card">
                                                    <div class="card-header">
                                                        <h5>Update Diklat</h5>
<!--                                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>

                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
                                                            </div>

                                                        </div>
                                                        <div class="card-block">
<!--                                                            <h4 class="sub-title">Basic Inputs</h4>-->
                                                            <form method="post" action="<?=base_url()?>update-diklat">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Kode Diklat</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan kode diklat" name="kode_diklat" value="<?=$dl->kode_diklat?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Nama Diklat</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan nama diklat" name="nama_diklat" value="<?=$dl->nama_diklat?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Kompetensi</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="kompetensi" class="form-control">
                                                                                <option value="">------ pilih kompetensi ------</option>
                                                                                <?php
                                                                                foreach ($kompetensi->result as $kl){
                                                                                    echo'
                                                                                <option value="'.$kl->kode_kompetensi.'">'.$kl->nama_kompetensi.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Materi</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan materi" name="materi" value="<?=$dl->materi?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Master Plan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan master plan" name="master_plan" value="<?=$dl->master_plan?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tujuan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan tujuan" name="tujuan" value="<?=$dl->tujuan?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button name="update" type="submit" class="btn btn-primary">Update Diklat</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                            </div>
                                                                            
                                                                        
                                                                    </div>
                                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>