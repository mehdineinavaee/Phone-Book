@extends('layouts.app')
@section('content')
@section('title','مخاطبین')

@push('css')
    
@endpush

@section('content-title','مخاطبین')

@section('breadcrumb')
    <li class="breadcrumb-item">مخاطبین</li>
@endsection
    
<div class="container-fluid">
    <div class="row">
        <div class="col form-group">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#contactModal">مخاطب جدید</a>
            <br>
            <br>
            <table class="table table-hover centerAlign" id="contactTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>شماره تلفن</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <input type="hidden" class="del-contact-val-id" value="{{ $contact->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->family }}</td>
                            <td>{{ $contact->father_name }}</td>
                            <td>
                                <a href="{{ route('contacts.index',['contact'=>$contact->id]) }}" data-toggle="modal" data-target="#phoneModal">
                                    <i class="fa fa-plus-circle" aria-hidden="true" title="افزودن تلفن" data-toggle="tooltip"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('contacts.show',['contact'=>$contact->id])}}" class="btn btn-primary">
                                    <i class="fa fa-info" title="جزئیات" data-toggle="tooltip"></i>
                                </a>
                                <a href="{{route('contacts.edit',['contact'=>$contact->id])}}" class="btn btn-light mr-2">
                                    <i class="fa fa-pencil text-info" title="ویرایش" data-toggle="tooltip"></i>
                                </a>
                                <button type="button" class="btn btn-danger del-contact"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ContactModal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">مخاطب جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="contactForm">
        @csrf
            <div class="card-body">
                <div class="form-group RightToLeft">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group RightToLeft">
                    <label for="family">نام خانوادگی</label><br>
                    <input type="text" class="form-control" name="family" id="family" value="{{ old('family') }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group RightToLeft">
                    <label for="father_name">نام پدر</label><br>
                    <input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary badge-pill btn-w btn-sm">ثبت اطلاعات</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- PhoneModal -->
<div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">شماره تلفن جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="PhoneForm">
        @csrf
            <div class="card-body">
                <div class="form-group RightToLeft">
                    <label for="phone">شماره تلفن</label>
                    <input type="text" class="form-control" name="phone[]" id="phone" value="{{ old('phone') }}">
                </div>
            </div>
            
            <div class="card-body" style="margin-top:5px;">
                <div class="form-group RightToLeft" id="newPhone">
                    
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary badge-pill btn-w btn-sm">ثبت اطلاعات</button>
                <button type="button" class="btn btn-success incPhone"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger decPhone"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>
        $(function(){
            var $contactForm = $("#contactForm");
            $.validator.addMethod("noSpace", function(value, element){
                return value == '' || value.trim().length !=0
            }, "فاصله مجاز نمی باشد");
            if ($contactForm.length){
                $contactForm.validate({
                    rules:{
                        name:{
                            required:true,
                        },
                        family:{
                            required:true,
                        },
                        father_name:{
                            required:true,
                        },
                    },
                    messages: {
                        name:{
                            required: 'لطفاً نام را وارد کنید',
                        },
                        family:{
                            required: 'لطفاً نام خانوادگی را وارد کنید',
                        },
                        father_name:{
                            required: 'لطفاً نام پدر را وارد کنید',
                        },
                    }
                });
            }
        });

        $("#contactForm").submit(function(e){
            e.preventDefault();
            let name = $('#name').val();
            let family = $('#family').val();
            let father_name = $('#father_name').val();
            let _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('contact.add') }}",
                type:"POST",
                data:{
                    name: name,
                    family: family,
                    father_name: father_name,
                    _token: _token
                },
                success:function(response)
                {
                    if(response){
                        // $("#contactTable tbody").prepend('<tr><td>'+ response.name +'</td><td>'+ response.family +'</td><td>'+ response.father_name +'</td></tr>');
                        $("#contactForm")[0].reset();
                        // $("#contactModal").modal('hide');
                        location.reload();
                    }
                }
            });
        });

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.del-contact').click(function (e) {
                var delete_id = $(this).closest("tr").find('.del-contact-val-id').val();

                Swal.fire({
                    title: 'آیا از حذف اطمینان دارید؟',
                    text: "امکان بازیابی اطلاعات وجود ندارد!",
                    type: 'warning',
                    showCancelButton: true,
                    // confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'موافقم!',
                    cancelButtonText: 'منصرف شدم',
                    onBeforeOpen: function(ele) {
                    $(ele).find('button.swal2-confirm.swal2-styled')
                    .toggleClass('swal2-confirm swal2-styled btn btn-danger badge-pill btn-w btn-sm')
                    $(ele).find('button.swal2-cancel.swal2-styled')
                    .toggleClass('swal2-cancel swal2-styled btn btn-info mr-2 badge-pill btn-w btn-sm')
                    }
                }).then((result) => {
                    if (result) {
                        var data = {
                            "_token": $('input[name=_token]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/contactDel/' + delete_id,
                            data: data,
                            success: function (response){
                                Swal.fire(
                                    'حذف شد!',
                                    response.status,
                                    'success'
                                )
                                .then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
                
            });
        });

    </script>
    
    <script>
        var index = 0;
        $('.incPhone').click(function(){
            if (index == 0) {
                var phone = $('#phone').val();
                if (phone === '') {
                    toastr.options.closeButton = false,
                    toastr.options.progressBar = true,
                    toastr.options.positionClass = "toast-bottom-left",
                    toastr.warning('شماره تلفن نمی تواند خالی باشد');
                }else{
                    $('#newPhone').append('<input type="text" name="phone[' + index + ']" id="opt_' + index + '" class="form-control" style="margin-bottom:5px;">');
                    index = index + 1;
                }
            } else {
                var res = $('#opt_' + (index - 1)).val();
                if (res === '') {
                    toastr.options.closeButton = false,
                    toastr.options.progressBar = true,
                    toastr.options.positionClass = "toast-bottom-left",
                    toastr.warning('شماره تلفن نمی تواند خالی باشد');
                } else {
                    //optArray.push(res);
                    $('#newPhone').append('<input type="text" name="phone[' + index + ']" id="opt_' + index + '" class="form-control" style="margin-bottom:5px;">');
                    index = index + 1;
                }
            }
        });

        $('.decPhone').click(function(){
            var div = document.getElementById('newPhone');
            if (index == 0) {
                toastr.options.closeButton = false,
                toastr.options.progressBar = true,
                toastr.options.positionClass = "toast-bottom-left",
                toastr.error('جعبه متنی برای حذف وجود ندارد');
            } else {
                var myText = document.getElementById('opt_' + (index - 1));
                index = index - 1;
                myText.remove();
                $("br + br", $("#newPhone")).each(function () {
                    if ($(this).prev()[0].nodeName == this.nodeName) {
                        $(this).remove();
                    }
                });
            }
        });

        $(function(){
            var $PhoneForm = $("#PhoneForm");
            $.validator.addMethod("noSpace", function(value, element){
                return value == '' || value.trim().length !=0
            }, "فاصله مجاز نمی باشد");
            if ($PhoneForm.length){
                $PhoneForm.validate({
                    rules:{
                        phone:{
                            required:true,
                            noSpace:true,
                        },
                    },
                    messages: {
                        phone:{
                            required: 'لطفاً نام را وارد کنید',
                        },
                    }
                });
            }
        });

        $("#PhoneForm").submit(function(e){
            e.preventDefault();
            let phone = $('#phone').val();
            let _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('phone.add') }}",
                type:"POST",
                data:{
                    phone: phone,
                    _token: _token,
                },
                success:function(response)
                {
                    if(response){
                        // $("#contactTable tbody").prepend('<tr><td>'+ response.name +'</td><td>'+ response.family +'</td><td>'+ response.father_name +'</td></tr>');
                        $("#PhoneForm")[0].reset();
                        // $("#phoneModal").modal('hide');
                        Swal.fire('شماره تلفن به ثبت رسید')
                        location.reload();
                    }
                }
            });
        });
    </script>
@endpush