

<script src="<?= base_url('assets'); ?>/js/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id,
                data: {},
                dataType: "json",
                success: function(data) {
                    var data = data.kota_kabupaten;
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama + '</option>'
                    }
                    $('#kota').html(html);

                },
                error: function(data) {
                    alert("fail");
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kota').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id,
                data: {},
                dataType: "json",
                success: function(data) {
                    var data = data.kecamatan;
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama + '</option>'
                    }
                    $('#kecamatan').html(html);

                },
                error: function(data) {
                    alert("fail");
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id,
                data: {},
                dataType: "json",
                success: function(data) {
                    var data = data.kelurahan;
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama + '</option>'
                    }
                    $('#desa').html(html);

                },
                error: function(data) {
                    alert("fail");
                }
            });
        });
    });
</script>

<script>
    <?php if (session()->getFlashdata('success') == true) : ?>
        swal({
            icon: "success",
            text: "<?= session()->getFlashdata('success'); ?>",
        });
    <?php endif; ?>
    <?php if (session()->getFlashdata('error') == true) : ?>
        swal("Oops", "<?= session()->getFlashdata('error'); ?>!", "error")
    <?php endif; ?>
</script>
</body>

</html>