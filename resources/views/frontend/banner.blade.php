{{-- Banner --}}

    <!-- begin container -->
    {{-- <div class="container">
        <a href="{{route('login')}}">Masuk</a>
        <h3>Lacak Status Laundry</h3>
        <div class="input-group m-b-20">
            <input type="text" class="form-control input-lg" id="search_status" placeholder="Contoh : TR0392928" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-lg" id="search-btn"><i class="fa fa-search"></i></button>
            </span>
        </div>
        @include('frontend.modal')
    </div> --}}
{{-- End Header --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coiny&family=Fredoka+One&family=Gaegu:wght@700&family=Gloock&family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        body{
            background: white;
        }
        * {
            margin:0;
            padding:0;
        }

        nav {
            position: absolute;
            text-align: center;
            width: 1309px;
            font-family: 'Gloock', serif;
        }
        nav ul {
            background:#D3756B;
            padding: 0 20px;
            list-style: none;
            position: relative;
            display: inline-table;
            width: 100%;
        }
        nav ul li{
            float:left;
        }
        nav ul li:hover{
            background:#F8CBA6;
            border-radius: 50px;
        }
        nav ul li:hover a{
            color:#000;
        }
        nav ul li a{
            display: block;
            padding: 25px;
            color: #fff;
            text-decoration: none;
        }
        nav ul button{
            position: absolute;
            background: #FFC3A1;
            border: white;
            border-radius: 5px;
            width: 90px;
            height: 35px;
            top: 18px;
            left: 1255px;
            font-family: 'Gloock', serif;
            filter: drop-shadow(1px 1px 1px grey);

        }
        nav ul button a{
            position: absolute;
            text-align: center;
            font-style: normal;
            font-weight: 145px;
            font-size: 17px;
            line-height: 1px;
            left: 25px;
            text-align: center;
            color: #ffffff;
            text-decoration: none;
        }


        h2{
            position: absolute;
            width: 888px;
            height: 50px;
            left: -130px;
            top: 250px;
            font-family: 'Coiny';
            font-style: normal;
            font-weight: 400;
            font-size: 30px;
            border: none;
            line-height: 53px;
            text-align: center;
            color: #D3756B;
            filter: drop-shadow(1px 1px 1px grey);
        }
        h1{
            position: absolute;
            width: 888px;
            height: 50px;
            left: -130px;
            top: 300px;
            font-family: 'Coiny';
            font-style: normal;
            font-weight: 400;
            font-size: 30px;
            border: none;
            line-height: 53px;
            text-align: center;
            color: #D3756B;
            filter: drop-shadow(1px 1px 1px grey);
        }
        .content input{
            position: absolute;
            width: 450px;
            height: 30px;
            left: 75px;
            top: 370px;
            background: #E1D7C6;
            filter: drop-shadow(1px 1px 1px grey);
            border-radius: 5px;
            border:none;
            text-align: center;
            font-size: 20px;
            color: white;
            font-family: 'Gaegu', cursive;
        }
        .content button{
            position: absolute;
            width: 95px;
            height: 30px;
            left: 250px;
            top: 420px;
            background: #A75D5D;
            filter: drop-shadow(1px 1px 1px grey);
            border-radius: 5px;
            border: none;
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 30px;
            text-align: center;
            color: #FFFFFF;
            border: 1px solid #F8CBA6;
            font-family: 'Gloock', serif;
            text-decoration: none;
        }
        button:hover{
            background-color: #F0997D;
        }
        footer {
            position: relative;
            top:680px;
            text-align: center;
            padding: 60px;
            background-color: grey;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/banner">Home</a></li>
            <li><a href="/tk">Tentang Kami</a></li>
            <li><a href="/contact">Kontak Kami</a></li>
            <button><a href="/login">Login</a></button>
        </ul>
    </nav>
    <div class="content">
        <h2>Selamat Datang</h2>
        <h1>Di Queen Laundry</h1>
        <img src="backend/images/landing/icon1.png" style="position:absolute; width:500px; height:500px; top:120px; left:700px;">
        <input type="text" class="form-control input-lg" id="search_status" placeholder="masukkan nomor resi anda..." />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-lg" id="search-btn"><i class="fa fa-search">Search</i></button>
        </span>
    </div>
    <footer>
        <h3>QUEEN-LAUNDRY</h3><br>
        <p>Laundry kami memakai sabun berkualitas demi menjaga pakaian tetap bersih, harum, dan tidak merusak kain. <br>
            Dijamin tidak mengecewakan!
        </p><br>
        <h6>&copy 2023 QUEEN-LAUNDRY</h6>
    </footer>
    @include('frontend.modal')
</body>
</html>

