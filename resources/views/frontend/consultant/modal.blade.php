<div class="modal " id="modal-property-languages" data-toggle="modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong class="modal-title"> <span class="font-weight-light">FREE CONSULTATION</span></strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <style>
                .input {
                    margin-bottom: 10px;
                }
                .btn {
                    background-color: #0A74B9;
                    color: white;
                }
            </style>
            <form id="ratingForm">
                <div class="modal-body">
                    <div class="row input mb-0">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your aaaName">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                    </div>
                    <div class="row input mb-0">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter Your Phone Number ">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="last_education" class="form-control" placeholder="Enter Your Last Education">
                    </div>
                    </div>
                    <div class="row input mb-0">
                    <div class="col-md-12">
                        <input type="text" name="apply_for" class="form-control" placeholder="Apply For">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" onclick="FormSubmit(this)">Submit</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="{{asset('assets_frontend/js/jquery.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{asset('assets_frontend/js/axios.js') }}"></script>
<script>
    function FormSubmit(input){
        $(':input').removeClass('has-error');
        $('.error-span').remove();
        axios.post('/free-consulation',$('#ratingForm').serialize()).then(function (response) {
            if (response.data.status == 'success'){
                swal({
                    title: response.data.msg,
                    icon: "success",
                }).then(data =>{
                    window.location.reload()
                });
            }else if(response.data.status == 'error'){
                $(input).attr('disabled',false);
                $('.alert-danger').text(response.data.msg);
                $('.alert-danger').show();
            }
        }).catch(function (error){
            $(input).attr('disabled',false);
            $.each(error.response.data.errors, function (k, v) {
                $('input[name="' + k + '"]').addClass("has-error");
                $('input[name="' + k + '"]').after("<span class='error-span'>" + v[0] + "</span>");
            });
        });
    }
</script>