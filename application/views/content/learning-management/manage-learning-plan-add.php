
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add New Learning Plan</h5>
<!--                                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                        <div class="card-header-right"><i
                                                            class="icofont icofont-spinner-alt-5"></i></div>

                                                            <div class="card-header-right">
                                                                <i class="icofont icofont-spinner-alt-5"></i>
                                                            </div>

                                                        </div>
                                                        <div class="card-block">
<!--                                                            <h4 class="sub-title">Basic Inputs</h4>-->
                                                            <form method="post" action="<?=base_url()?>add-learning-plan">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Kode LP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="masukkan kode learning plan" name="kode_lp">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Diklat</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="diklat" class="form-control">
                                                                                <option value="">------ pilih diklat ------</option>
                                                                                <?php
                                                                                foreach ($diklat->result as $dl){
                                                                                    echo'
                                                                                <option value="'.$dl->kode_diklat.'">'.$dl->nama_diklat.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Akademi</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="akademi" class="form-control">
                                                                                <option value="">------ pilih akademi ------</option>
                                                                                <?php
                                                                                foreach ($akademi->result as $al){
                                                                                    echo'
                                                                                <option value="'.$al->kode_akademi.'">'.$al->nama_akademi.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Performance Issue</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="performance_issue" class="form-control">
                                                                                <option value="">------ pilih performance issue ------</option>
                                                                                <?php
                                                                                foreach ($performance_issue->result as $pil){
                                                                                    echo'
                                                                                <option value="'.$pil->kode_pi.'">'.$pil->nama.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Strategic Innitiative</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="strategic_innitiative" class="form-control">
                                                                                <option value="">------ pilih strategic innitiative ------</option>
                                                                                <?php
                                                                                foreach ($strategic_innitiative->result as $sil){
                                                                                    echo'
                                                                                <option value="'.$sil->kode_si.'">'.$sil->nama.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Business Issue</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="business_issue" class="form-control">
                                                                                <option value="">------ pilih business issue ------</option>
                                                                                <?php
                                                                                foreach ($business_issue->result as $bil){
                                                                                    echo'
                                                                                <option value="'.$bil->kode_bi.'">'.$bil->nama.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Competence Issue</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="competence_issue" class="form-control">
                                                                                <option value="">------ pilih competence issue ------</option>
                                                                                <?php
                                                                                foreach ($competence_issue->result as $cil){
                                                                                    echo'
                                                                                <option value="'.$cil->kode_ci.'">'.$cil->divisi.' ( '.$cil->level.' )</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tgl_mulai">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="tgl_selesai">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tahun</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="tahun">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Pilih Tempat</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="tempat" class="form-control">
                                                                                <option value="">------ pilih tempat ------</option>
                                                                                <?php
                                                                                foreach ($tempat->result as $tl){
                                                                                    echo'
                                                                                <option value="'.$tl->id_tempat.'">'.$tl->nama_tempat.'</option>';
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Total Anggaran</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="total_anggaran" name="total_anggaran">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button onclick="checkNumber()" name="submit" type="submit" class="btn btn-primary">Add Learning Plan</button>
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