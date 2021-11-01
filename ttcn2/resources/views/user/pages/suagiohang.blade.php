@extends('admin.layout.index')

@section('noidung')
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="err">
                    {{$err}}<br>
                </div>
            @endforeach
        @endif
        @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
        @endif
    <div class="sualoaisach">
    <form action="suagiohang/{{$giohang->id}}" method="post">    
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset>
            <legend><h2 style="color:grey;">Sửa số lượng đặt mua:</h2></legend>
            <label for="">số lượng :</label><br>
            <input type="text" name="soluong" value="{{$giohang->soluong}}"><br>
            <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>
@endsection