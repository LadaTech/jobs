
<!-- Preview Popup-->  
<div class="modal fade in" id="preview-popup" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-js">

        <!-- Preview  POPUP  content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>

                <h3><span>Job Seeker Details</span></h3> 
            </div>
            <div class="papersheet-outer" id="resume">    
                <div class="modal-body" id="resume-viewer">
                </div>
                <div class="modal-footer">
                    <div class="action_data col-sm-6 col-sm-offset-3">

                    </div>
                </div>   
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Preview POPUP  content End-->
    </div>
</div>
<!-- Preview Popup End--> 
<script>
    $(".preview").click(function () {
        var ridVal = $(this).data("rid");
        var ridArr = ridVal.split("||");
        $id = ridArr[0];
        $this = $(this);
//alert($id);
        $.ajax({
            type: "get",
            url: "<?php echo $path; ?>/get_js_details.php",
            data: {"id": $id, "utype": "cw","eid":ridArr[1]},
            success: function (data) {
//alert(data);
                $(".modal-body").empty().html(data);
                $(".modal-body").append($this.closest("tr").find(".other-info").html());
                $(".modal-footer .action_data").empty().html($this.closest("tr").find(".clone_data").html());
                $("#preview-popup").modal("show");
            }
        });
//    $(this).closest(".preview_content").html();
//    $(".modal-header").html()
    });
</script>