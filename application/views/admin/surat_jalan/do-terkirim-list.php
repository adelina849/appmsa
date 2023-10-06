

<div class="block full">
    <!-- All Orders Title -->
    <div class="block-title">
        <div class="block-options pull-right" style="margin-right: 15px;">
        </div>
        <h2><i class="fa fa-check-circle-o"></i> <strong><?= $title; ?></strong></h2>
    </div>

    <div class="row">
        <div class='col-lg-12' style="margin-bottom: 5px;">

            <div class="table-responsive">
                <table id="example-datatable" class="display table table-vcenter table-condensed table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr class="themed-color themed-background-spring" style="font-weight: bold;">
                            <td class="text-center text-light" style="width: 3%;">NO</td>
                            <td class="text-light" style="width: 10%;">NO. DO</td>
                            <td class="text-light" style="width: 15%;">NO. SURAT JALAN</td>
                            <td class="text-light" style="width: 30%;">NAMA LEMBAGA</td>
                            <td class="text-light text-center" style="width: 10%;">LHFD</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //$q = $this->db->get_where('surat_jalan_detail', array('status_kirim' => 0));

                            $s = "SELECT 
                                    surat_jalan_detail.id AS id_detail, surat_jalan_detail.surat_jalan_id, 
                                    surat_jalan_detail.nomor_do, surat_jalan_detail.id_lembaga, surat_jalan_detail.status_kirim,
                                    surat_jalan_master.nomor AS nomor_surat_jalan
                                FROM surat_jalan_detail, surat_jalan_master
                                WHERE surat_jalan_detail.surat_jalan_id=surat_jalan_master.id
                                ORDER BY surat_jalan_master.tanggal DESC";
        
                            $q = $this->db->query($s);                            
                            $no = 0;
                            foreach($q->result() as $d)
                            {
                                $id_lembaga = $d->id_lembaga;
                                $qLembaga = $this->db->get_where('lembaga', array('id' => $id_lembaga))->result();
                                $nama_lembaga = strtoupper(isset($qLembaga[0]->nama_lembaga) ? $qLembaga[0]->nama_lembaga : '-');

                                // $qDo = $this->db->get_where('packing_do', array('nomor_do' => $d->nomor_do))->result();
                                // $qoli = (isset($qDo[0]->jumlah_qoli) ? $qDo[0]->jumlah_qoli : '-');
                                // $ikat = (isset($qDo[0]->jumlah_ikat) ? $qDo[0]->jumlah_ikat : '-');
                                //$sj = $this->db->get_where('surat_jalan_master', array('id' => $d->surat_jalan_id))->result();


                            ?>
                                <tr>
                                    <td class="text-center"><?=++$no;?></td>
                                    <td><?=$d->nomor_do;?></td>
                                    <td><?=$d->nomor_surat_jalan;?></td>
                                    <td><?=$nama_lembaga;?></td>
                                    <td class="text-center"><?='0 Hari';?></td>
                                </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END row -->
    <!-- END block-->
</div>

<script src="<?php echo base_url(); ?>assets/proui/js/vendor/jquery.min.js"></script>
<script></script>