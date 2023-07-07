<style>
    .imagePreview {
        margin-left: -12px;
        width: 520px;
        height: 150px;
        object-fit: cover;
        object-position: center;
        margin-bottom: 5px;
        /* display: inline-block; */
        /* box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2); */
    }

    @media (max-width: 750px) {
        .imagePreview {
            width: 130px;
            height: 130px;
            object-fit: cover;
            object-position: center;
            /* display: inline-block; */
            /* box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2); */
        }

        .btn-primary {
            display: block;
            width: 30%;
            border-radius: 50px;
            box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
            margin-top: 6px;
            margin-bottom: 20px;
            /* padding-left: 3.5%; */
            height: 35px;
            padding: 2px auto;
        }
    }
</style>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('delete_success'); ?>
        </div>
        <div class="col-lg-6  pt-4">
            <form action="<?php echo base_url('admin/add_carosel') ?>" enctype="multipart/form-data" method="post">
                <center>
                    <img class="imagePreview " src="<?= base_url('upload/+carosel-01.png') ?>" id="output"></img>
                </center>
                <label class="btn btn-primary mx-auto">
                    <i class="fa-solid fa-pen-to-square  mx-auto"></i> Pilih Gambar
                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)"
                        style="width: 0px;height: 0px;overflow: hidden;">
                </label>
                <input type="submit" value="Simpan" class="btn btn-success" style="margin-top: -9px;">
            </form>
        </div>
        <div class="col-lg-6 bg-white  shadow p-2 rounded" style="overflow: auto;height: 450px;">
            <?php foreach ($carosel->result() as $row) { ?>
                <center>
                    <table>
                        <tr>
                            <td>
                                <img class="card-img-top rounded gambar_delete"
                                    style="height: 160px;width: 100%;object-fit: cover;object-position: center;"
                                    src="<?php echo base_url() . $row->image; ?> ">
                            </td>
                            <td>
                                <a href="<?php echo site_url('admin/delete_carosel/' . $row->id_carosel); ?>"
                                    class="btn btn-danger ml-1 w-100 " style="height: 160px;padding: 70px 10px;">
                                    <i class="fa-solid fa-fw fa-trash" style="color: #ffffff;"></i></a>
                            </td>
                        </tr>
                    </table>

                </center>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
<div class="col-lg-12 mb-4 ">
    <div class="row">

    </div>
</div>