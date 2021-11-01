<base href="{{asset('')}}">
<style>
    .header{
        height: 100px;
        width:100%;
        display: inline-block;
        position: relative;
        background-color: white;
    }
    .header a{
        color: black;
        text-decoration: none;
    }
    .header_logo{
        width: 20%;
        position: absolute;
        top:20%;left: 7%;
    }

    .header_form{
        position: absolute;
        display: inline-block;
        top:32%;left: 30%;
        width:40%;
        

    }
    .header_form input[type=text]{
        width:73%;height: 10px;
        padding:2%;
        border:1px solid #026e36;
        border-radius: 3px;
        outline: none;
    }
    .header_form input[type=submit]{
        width: 20%;height: 34px;
        background-color: #026e36;
        color:white;
        border: none;
        border-radius: 3px;
    }
    .header_giohang{
        position: absolute;
        left:73%;bottom: 30%;
    }
    .header_dangnhap{
        position: absolute;
        left:80%;bottom: 30%;
    }
    .header_dangki{
        position: absolute;
        left:88%;bottom: 30%;
    }
    .header_form input[type=text]:focus{

        box-shadow: 0 0px 5px 0 rgb(24, 162, 180);
    }

    .thanhquanli{
    
        font-family: arial;
        width: 100%;height: 40px;
        background-color: #026e36;
        color: white;
    }
    .dulieu{
        background-color: #026e36;
        color: white;
        border: none;
    
    }

    .div1_dulieu {
        position: relative;
        float: left;
        display: inline-block;
        margin-left: 7%;
    }
    .div1_dulieu1 {
        display: none;
        position: absolute;
        min-width: 250px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 2;
    }


    .div1_dulieu1 a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;

    }


    .div1_dulieu:hover .div1_dulieu1 {
        display: block;
        }

    .div1_dulieu:hover, .thanhquanli a:hover {
            background-color:#479c70;
            color: white;
    }
    .thanhquanli a{
                text-decoration:none; 
                padding:9px;
                color:white;
                font-weight:bold;
                z-index:1;
                border: 1px solid #026e36;
    }
    .div-body{
        width: 50%;
        height: 400px;
        text-align: center;
        padding: 3%;
        color:white;
        background-color: brown;
        font-family:arial;
        opacity: 0.8;
        border:1px solid grey;
    }
    .div-body h2{
        color: white;
        font-weight: bold;
    }
    .ten
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/email-open.png);
    }
    .div-body input[type=text]{
        background-color: transparent; /* make the button transparent */
        background-repeat: no-repeat;  /* make the background image appear only once */
        background-position: 20px 5px;  /* equivalent to 'top left' */
        cursor: pointer;        /* make the cursor like hovering over an <a> element */
        height: 50px;           /* make this the size of your image */
        padding-left: 20px;     /* make text start to the right of the image */
        vertical-align: middle; /* align the text vertically centered */
        width: 65%;
        padding:0px 60px;
        font-size: larger;
        margin-top:5%;
        border:1px solid #bbb;
        outline:none;
    }
    .div-body input[type=text]:focus{
        box-shadow: 0 0px 5px 0 rgb(24, 162, 180);
        background-color:white;

    }
    .div-body input[type=submit]{
        width: 65%;
        padding:0px 60px;
        font-size: larger;
        height: 50px;           /* make this the size of your image */
        margin-top:5%;
        border:1px solid #bbb;
    }
    .div-body input[type=submit]:hover{
        background-color: #026e36;
    color: white;
    }
    .matkhau
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/forgot-password.png);
    }
    
</style>
    @if(count($errors) > 0)
            <script>
                alert("<?php foreach($errors->all() as $err){echo $err;?>\n <?php } ?>\nVui lòng nhập lại !");
            </script>
    @endif
    <div style="padding:7% 0px 6% 26%; background: url(admin_asset/img/body/dangnhap.jpg);background-size:100% 100%;margin-top:0px;" >
    <div class="div-body">
        <h2  >ĐĂNG NHẬP</h2>
        <form action="dangnhap" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input class="ten" type="text" name="email" placeholder="Email">
            <input class="matkhau" type="text" name="password" placeholder="Password">
            <input type="submit" value="Đăng nhập">
            <h4><a href="dangki" style="color:white;" href="">Bạn chưa có tài khoản ?</a></h4>
        </form>
    </div>
</div>
   