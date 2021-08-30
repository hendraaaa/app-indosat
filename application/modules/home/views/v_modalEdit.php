<!-- Modal -->

<div class="modal fade" style="color: #000;" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo  form_open('home/updateData', ['class' => 'formsimpan']) ?>
            <div class="modal-body">
                <div class="alert alert-danger pesan" style="display: none;" role="alert">
                    This is a danger alert—check it out!
                </div>
                <input type="text" hidden class="form-control" value="<?php echo $id; ?>" name="id" id="id" placeholder="id">

                <div class="form-group row  align-items-center">
                    <label for="site" class="col-sm-2 font-weight-bold">Site</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $site; ?>" name="site" id="site" placeholder="site">
                    </div>
                </div>
                <div class="form-group row  align-items-center">
                    <label class="col-sm-2 font-weight-bold">Jenis Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $jenis_barang; ?>" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang">
                    </div>
                </div>
                <div class="form-group row  align-items-center">
                    <label class="col-sm-2 font-weight-bold">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $brand; ?>" name="brand" id="brand" placeholder="Brand">
                    </div>
                </div>
                <div class="form-group row  align-items-center">
                    <label class="col-sm-2 font-weight-bold">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" placeholder="Deskripsi" rows="3"><?php echo $deskripsi; ?></textarea>
                    </div>
                </div>
                <div class="form-group row  align-items-center">
                    <label class="col-sm-2 font-weight-bold">SN</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="<?php echo $sn; ?>" name="sn" id="sn" placeholder="SN">
                    </div>
                </div>
                <div class="form-group row  align-items-center">
                    <label class="col-sm-2 font-weight-bold">Kondisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $kondisi; ?>" name="kondisi" id="kondisi" placeholder="Kondisi">
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="formsimpanEdit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#formsimpanEdit').click(function(e) {
            var id = $("input[name='id']").val();
            var site = $("input[name='site']").val();
            var jenis_barang = $("input[name='jenis_barang']").val();
            var brand = $("input[name='brand']").val();
            var deskripsi = $("textarea[name='deskripsi']").val();
            var sn = $("input[name='sn']").val();
            var kondisi = $("input[name='kondisi']").val();

            if (site.length == 0) {
                $('.pesan').text('site tidak boleh kosong').show()
            } else if (jenis_barang.length == 0) {
                $('.pesan').text('Jenis Barang tidak boleh kosong').show()

            } else if (site.length == 0) {
                $('.pesan').text('Site Barang tidak boleh kosong').show()

            } else if (brand.length == 0) {
                $('.pesan').text('Brand Barang tidak boleh kosong').show()

            } else if (deskripsi.length == 0) {
                $('.pesan').text('Deskripsi Barang tidak boleh kosong').show()

            } else if (sn.length == 0) {
                $('.pesan').text('SN Barang tidak boleh kosong').show()

            } else if (kondisi.length == 0) {
                $('.pesan').text('Kondisi Barang tidak boleh kosong').show()

            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('home/updateData') ?>",
                    data: {
                        "id": id,
                        "site": site,
                        "jenis_barang": jenis_barang,
                        "brand": brand,
                        "deskripsi": deskripsi,
                        "sn": sn,
                        "kondisi": kondisi,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil di Edit',
                                confirmButtonColor: '#3085d6',


                            })
                            $('#exampleModalEdit').modal('hide')
                            reload_table()


                        }

                    },

                })

            }


            return false
        });
    });
</script>