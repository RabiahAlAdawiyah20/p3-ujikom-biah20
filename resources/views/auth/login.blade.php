<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coiny&family=Fredoka+One&family=Gaegu:wght@700&family=Gloock&family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        body{
            background-image: linear-gradient(to right, #A75D5D , #D3756B , #F0997D);
        }
        a{
            position: absolute;
            background: #FFC3A1;
            width: 70px;
            height: 20px;
            padding: 5px;
            left: 30px;
            color: black;
            text-align: center;
            top: 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            filter: drop-shadow(2px 2px 2px black);
        }
        a:hover{
            background-color: #F0997D;
        }
        section{
            position: absolute;
            width: 900px;
            height: 500px;
            left: 230px;
            top: 80px;
            background: white;
            border-radius: 15px;
        }
        h3{
            position: absolute;
            left: 800px;
            top: 130px;
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
        .content button{
            position: absolute;
            background: #FFC3A1;
            border: white;
            border-radius: 5px;
            width: 90px;
            height: 35px;
            top: 400px;
            left: 800px;
            font-family: 'Gloock', serif;
            filter: drop-shadow(1px 1px 1px grey);
        }
        button:hover{
            background-color: #F0997D;
        }
    </style>
</head>
<body>
    <a href="/banner">Kembali</a>
    <section></section>
    <div class="content">
        <form action="{{ route('login') }}" method="POST">
        @csrf
        <img src="backend/images/landing/icon2.png" style=" position:absolute; width: 300px; height:300px; left: 300px; top: 180px; ">
        <h3>Login</h3>
        <input type="text" name="email" placeholder="Masukkan Username...." style="position: absolute;width: 300px;height: 30px;left: 700px;top: 250px;background: #FFE7CC;filter: drop-shadow(2px 2px 2px grey);border-radius: 2px;border: none;font-family: 'Gloock', serif; text-align: center;">
        <input type="password" name="password" placeholder="Masukkan Password...." style="position: absolute;width: 300px;height: 30px;left: 700px;top: 330px;background: #FFE7CC;filter: drop-shadow(2px 2px 2px grey);border-radius: 2px;border: none;font-family: 'Gloock', serif; text-align: center;">
        <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
