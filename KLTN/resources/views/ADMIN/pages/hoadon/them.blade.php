@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-8">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Slide</i></h5>
        </div>
</div>
    
<div class="container">
    <form action="themhoadon" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="ten">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="mk">
            </div>
            <div class="col">
                <input type="submit" class="form-control">
            </div>
        </div>
    </form>
</div>
@endsection