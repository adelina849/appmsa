<!-- Quick Stats -->
<link href="<?php echo base_url('assets/plugins/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">

<div class="block full">
    <!-- All Orders Title -->
    <div class="block-title">
        <div class="block-options pull-right" style="margin-right: 15px;">
        </div>
        <h2><i class="fa fa-list-alt"></i> <strong><?= $title; ?></strong></h2>
    </div>


    <div class="row">
        <div class='col-sm-4' style="margin-bottom: 5px;">
            <div class="btn-group btn-group-lg">
                <?php echo form_open('admin/packing/surat_pesanan', array('class' => '"', 'id' => '')); ?>
                <input type="hidden" name="judul" value="<?= $title; ?>">
                <input type="hidden" name="sp_bulan_ini" id="sp_bulan_ini" value="<?= $sp_bulan_ini; ?>">
                <input type="hidden" name="tAwal" id="tAwal" value="<?= $tAwal; ?>">
                <input type="hidden" name="tAkhir" id="tAkhir" value="<?= $tAkhir; ?>">
                <input type="hidden" name="id_lembaga" id="id_lembaga" value="<?= $id_lembaga; ?>">
                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $id_pelanggan; ?>">

                <a href="#" data_id_barang="<?= 1; ?>" data-toggle="tooltip" title="Filter Surat Pesanan" class="btn btn-alt btn-sm btn-warning" onclick="$('#modal-filter').modal('show');">
                    <i class="fa fa-search"></i> Filter Surat Pesanan
                </a>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class='col-sm-8'>
            <p class="text-info"><i class='fa fa-info-circle fa-fw animation-pulse'></i> <b>Packig Barang : </b></p>
            <ul class="fa-ul list-li-push">
                <li>
                    <i class="fa fa-li fa-truck text-success"></i> Delivery Order &nbsp;&nbsp;
                    <i class="gi gi-package text-info"></i> Form Packing &nbsp;&nbsp;
                    <i class="fa fa-print text-warning"></i> Cetak Form Packing &nbsp;&nbsp;
                    <i class="fa fa-file-pdf-o text-danger"></i> Cetak SP 
                </li>
            </ul>
        </div>

    </div>
    <!-- END row -->

    <div class="row">
        <div class='col-lg-12' style="margin-bottom: 5px;">
            <div class="table-responsive">
                <table id="sp_unpacking" class="display table table-vcenter table-condensed table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr class="themed-color themed-background" style="font-weight: bold;">
                            <td class="text-center text-light" style="width: 3%;">NO</td>
                            <td class="text-light" style="width: 10%;">NOMOR SP</td>
                            <td class="text-light" style="width: 10%;">JENIS SP</td>
                            <td class="text-light">PELANGGAN</td>
                            <td class="text-light">LEMBAGA</td>
                            <td class="text-light" style="width: 10%;">JENJANG</td>
                            <td class="text-light" style="width: 10%;">STATUS</td>
                            <td class="text-light" style="width: 10%;">NILAI (Rp.)</td>
                            <td class="text-center no-sort text-light" style="width: 15%;"><i class="fa fa-cog"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- END row -->
    <!-- END block-->
</div>


<!-- Modal Filter-->
<div class="modal fade" id="modal-filter"  role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title text-center text-primary"><i class="fa fa-search"></i> Filter Data</h2>
            </div>
            <!-- END Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body">
                <?php echo form_open($action_filter, array('class' => 'form-horizontal form-bordered', 'id' => '')); ?>
                <input type="hidden" name="filter" value="filter">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-select">Lembaga</label>
                        <div class="col-md-8">
                            <select id="lembaga" name="lembaga" class="option-line-break chosen" style="width:100%;" placeholder="Nama Lembaga">
                                <option value="">-- Pilih Lembaga --</option>
                                <?php
                                $lembaga = $this->db->get_where('lembaga', array('dihapus' => 'tidak'))->result();
                                foreach ($lembaga as $lembagas) {
                                ?>
                                    <option data-description="<?= 'Kode: ' . $lembagas->kode .
                                                                    '<br>Alamat: ' . $lembagas->alamat .
                                                                    '<br>Jenjang: ' . $lembagas->jenjang .
                                                                    '<br>Status: ' . $lembagas->status .
                                                                    '<br>Klasifikasi: ' . $lembagas->klasifikasi; ?>" value="<?= $lembagas->id; ?>">
                                        <?= $lembagas->nama_lembaga; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-select">Pelanggan</label>
                        <div class="col-md-8">
                            <select id="pelanggan" name="pelanggan" class="option-line-break" style="width:100%;" placeholder="Nama Lembaga">
                                <option value="">-- Pilih Pelanggan --</option>
                                <?php
                                $pelanggan = $this->db->get_where('pelanggan', array('dihapus' => 'tidak'))->result();
                                foreach ($pelanggan as $pelanggans) {
                                ?>
                                    <option data-description="<?= 'Kode: ' . $pelanggans->kode .
                                                                    '<br>Jabatan: ' . $pelanggans->jabatan .
                                                                    '<br>Kontak: ' . $pelanggans->kontak; ?>" value="<?= $pelanggans->id; ?>">
                                        <?= $pelanggans->nama_pelanggan; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-daterange1">Masukan Tanggal</label>
                        <div class="col-md-8">
                            <div class="input-group input-daterange" data-date-format="yyyy-mm-dd">
                                <input type="text" id="tanggal1" name="awal" class="form-control text-center" placeholder="Awal" autocomplete="off" required>
                                <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                <input type="text" id="tanggal2" name="akhir" class="form-control text-center" placeholder="Akhir" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4 text-right">
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- END Form Validation Example Content -->
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Modal Filter-->

<!--Cetak sp  -->
<div id="FormCetak" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title text-center text-primary"><i class="fa fa-file-pdf-o"></i> Cetak Surat Pesanan</h2>
            </div>

            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <?php echo form_open($action_cetak, array('class' => 'form-horizontal form-bordered"', 'id' => 'form', 'target' => '_blank')); ?>
                <input type="hidden" name="id_pesanan_m" class="id_pesanan_m">
                <fieldset>
                    <div class="form-group" style="margin:0 20px 0 20px">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-info-circle"></i> Info!</h4>
                            Anda akan mencetak surat pesanan dalam format file PDF
                        </div>
                    </div>
                </fieldset>
                <div class="form-group form-actions">
                    <div class="col-xs-12 text-center">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Lanjutkan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END cetak sp -->

<script src="<?php echo base_url(); ?>assets/proui/js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var sp_bulan_ini = $("#sp_bulan_ini").val();
        var tAwal = $("#tAwal").val();
        var tAkhir = $("#tAkhir").val();
        var id_lembaga = $("#id_lembaga").val();
        var id_pelanggan = $("#id_pelanggan").val();

        $('#sp_unpacking').dataTable( {
            "bpagingType": "bs_two_button",
            "bProcessing": true,
            //"bServerSide": true,	
            //"sAjaxSource": "<?php echo base_url();?>admin/packing/all_unpacking",
            "ajax": {
                url: "<?php echo site_url('admin/packing/all_unpacking') ?>",
                data: {
                    sp_bulanini: sp_bulan_ini,
                    tAwal: tAwal,
                    tAkhir: tAkhir,
                    id_pelanggan: id_pelanggan,
                    id_lembaga: id_lembaga
                },
                type: "POST"
            },                
            "lengthMenu": [[25,100, 200, 100, -1], [25,100, 200, 100, 100, "All"]],
            "aoColumns": [
                { "mData": "no" },
                { "mData": "nomor_sp" },
                { "mData": "jenis_sp" },
                { "mData": "pelanggan" },
                { "mData": "lembaga" },
                { "mData": "jenjang" },
                { "mData": "status" },
                { "mData": "nilai_sp" },
                { "mData": "aksi" }
            ],
            "lengthMenu": [
				[25, 50, 100, -1],
				[25, 50, 100, "All"],
            ],            
        } );
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]'
        });
    });
</script>         


<script type="text/javascript">
    var table;

    $(document).ready(function() {
        //select 2 line break option
        function formatResult(result) {
            if (!result.id) return result.text;

            var myElement = $(result.element);

            var markup = '<div class="clearfix">' +
                '<p style="margin-bottom: 0px">' + result.text + '</p>' +
                '<p>' + $(myElement).data('description') + '</p>' +
                '</div>';

            return markup;
        }

        function formatSelection(result) {
            return result.full_name || result.text;
        }

        $(".option-line-break").select2({
            escapeMarkup: function(m) {
                return m;
            },
            closeOnSelect: false,
            templateResult: formatResult,
            templateSelection: formatSelection
        });

    });

    function form_cektak(id_pesanan_m) {
        $(".id_pesanan_m").val(id_pesanan_m);
        $('#FormCetak').modal('show'); // show bootstrap modal when complete loaded
    }
</script>