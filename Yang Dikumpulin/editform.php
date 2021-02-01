<div class="modal-header">
    <h1>Edit Student</h1>
</div>
<div class="modal-body">
    <div class="form-row">
        <div class="form-group col-12">
            <label>NIM</label>
            <input class="form-control" type="text" name="snim" id="snim" placeholder="NIM Mahasiswa" disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label>First Name</label>
            <input class="form-control" type="text" name="sfirst_name" id="sfirst_name" placeholder="Nama depan mahasiswa">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label>Last Name</label>
            <input class="form-control" type="text" name="slast_name" id="slast_name" placeholder="Nama belakang mahasiswa">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label>Description</label>
            <textarea class="form-control" type="text" name="sdesc" id="sdesc" placeholder="Deskripsi mahasiswa"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="back" class="btn w-50">Back</button>
    <button id="save" class="btn btn-primary w-50"><i class="fas fa-save"></i>&nbsp;Save</button>
</div>

<script>
    var snim = $("#snim");
    var sfname = $("#sfirst_name");
    var slname = $("#slast_name");
    var sdes = $("#sdesc");

    $("#back").on("click",function(){
        mdl.modal("hide");
    })
    $("#save").on("click",function(){
        $.ajax({
            type: "post",
            url: "updatedata.php",
            data: {
                nim: snim.val(),
                firstname: sfname.val(),
                lastname: slname.val(),
                deskripsi: sdes.val()
            },
            beforeSend: function(){
                swal({
                    title: "Loading..",
                    onBeforeOpen: () => {swal.showLoading();}
                })
            },
            success: function(r){
                console.log(r);
                if(r == "true"){
                    swal({
                        type:"success",
                        title:"Success.",
                        html: "<b>" + snim.val() + "</b> has been edited.",
                        showCancelButton: false
                    });
                    mdl.modal("hide");
                    table.ajax.reload();
                }
                else{
                    swal({
                        type: "error",
                        title: "Error.",
                        showCancelButton: false
                    });
                }
            }
        })
    })
</script>
