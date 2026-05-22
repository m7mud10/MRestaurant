<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRestaurant</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f7f7f7;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            position: relative;
            z-index: 100;
        }

        header {
            height: 100vh;
        }

        header::before {
            content: '';
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            background: linear-gradient(0deg, #f7f7f7cf 5%, transparent 30%);
        }

        header::after {
            content: '';
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 100vh;
            right: 0;
            z-index: 2;
            background: linear-gradient(180deg, #f7f7f7cf 30%, transparent 90%);
        }

        nav .nav-bar {
            width: 80%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            padding: 20px 80px;

        }

        .btn {
            font-family: Raleway, serif;
            color: #333;
            cursor: pointer;
            font-size: 20px;
            font-weight: 700;
            line-height: 2;
            position: relative;
            text-align: center;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 5px;
            box-shadow: 1px 1px 0 0 rgba(255, 255, 255, 0.8) inset,
                3px 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-decoration: none;
            will-change: color, text-shadow, font-size;
            transition: ease all 0.3s;
            width: 150px;
            height: 40px;

            &:hover {
                transform: scale(1.05);
                background: rgba(255, 255, 255, 0.8);
            }

            &:active {
                transform: scale(0.95);
            }
        }

        .logo {
            height: 40px;
            text-align: center;
            font-size: 24px;
            margin: 10px 0;
        }

        .main {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            color: #333;
            transition: all 0.2s ease-in-out;
        }

        .main-content {
            position: relative;
            z-index: 10;
            margin-top: 5vw;
            max-width: 70%;
            padding: 0 2rem;
        }
        @keyframes show1 {
            0%{
                opacity: 0;
                transform: translateX(-400px);
            }
            100%{
                opacity: 0.9;
                transform: translateX(0);
            }
        }
        @keyframes show2 {
            0%{
                opacity: 0;
                transform: translateX(400px);
            }
            100%{
                opacity: 0.9;
                transform: translateX(0);
            }
        }
        .main-title {
            font-weight: bold;
            margin-bottom: 1rem;
            font-size: clamp(10px, 8vw, 100px);
            opacity: 0.9;
            text-align: center;
            animation: show1 1.2s ease-in-out;
        }
        
        .main-description {
            font-size: clamp(5px, 3vw, 30px);
            margin-bottom: 2rem;
            opacity: 0.9;
            text-align: center;
            animation: show2 1.7s ease-in-out;
        }
        
        .main-buttons {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            animation: show1 2.2s ease-in-out;

            & .btn {
                width: 80%;
                height: auto;
                padding: 2.5vh 0;

                &:hover {
                    transform: scale(1.1);
                    background: rgba(255, 255, 255, 0.8);
                }
            }
        }

        .container {
            background: #f7f7f7;
            display: flex;
            color: #333;
            /* padding: 30px; */
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: auto;
            z-index: 5;
            position: relative;

            /* & .main-title {
                margin-top: 100vh;
            } */
        }

        .menu {
            display: grid;
            flex-direction: column;
            width: 80%;
            margin: auto;
            grid-template-columns: repeat(3, 1fr);
            position: relative;
            gap: 30px;
            padding: 50px;

            & .glass:hover {
                transform: scale(1.05);
                background: rgba(255, 255, 255, 0.8);
            }

            & .glass:hover .recipe-img {
                transform: scale(1.1);
            }
        }

        .recipe-img {
            width: 100%;
            height: 50%;
            transition: all 200ms ease-in-out;

            & img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }

        .recipe-name {
            color: #a72222;
            font-size: 30px;
        }

        .glass {
            font-family: Raleway, serif;
            color: #333;
            cursor: default;
            font-size: 20px;
            font-weight: 700;
            line-height: 1;
            position: relative;
            text-align: center;
            margin: 1vh auto;
            width: 100%;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(15px);
            border-radius: 10px;
            box-shadow: 1px 1px 0 0 rgba(255, 255, 255, 0.8) inset,
                3px 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-decoration: none;
            will-change: color, text-shadow, font-size;
            transition: ease all 0.3s;
            overflow: hidden;

        }

        .bg {
            width: 100%;
            height: 100vh;
            /* overflow: hidden; */
            position: relative;
        }

        .wrapper-images {
            display: flex;
            flex-direction: column;
            height: 150vh;
            justify-content: center;
            left: 50%;
            position: absolute;
            top: 50%;
            opacity: 0.6;
            transform: translate3d(-50%, -50%, 0) rotate(22.5deg);
        }


        .images-line {
            animation: runner 30s linear infinite;
            display: flex;
            transform: translateX(25%);

            .line {
                --tile-margin: 3vw;
                background-position: 50% 50%;
                background-size: cover;
                border-radius: 50%;
                flex: none;
                height: 30vh;
                margin: 3vw;
                width: 30vh;
                position: relative;
                object-fit: cover;

                &:after {
                    content: "";
                    background: inherit;
                    display: block;
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                    top: 3vh;
                    position: absolute;
                    background-size: cover;
                    z-index: -1;
                    filter: blur(25px) opacity(0.8);
                }

                &.large {
                    border-radius: 20vh;
                    width: 100vh;
                }
            }
        }

        @keyframes runner {
            to {
                transform: translateX(-25%);
            }
        }

        /* /////////////////////////////Login///////////////////////////// */
        .login {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: transparent;
        }

        .login-form {
            height: 420px;
            width: 400px;
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #333;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 700;
            line-height: 42px;
            text-align: center;
            color: #a72222;
            opacity: 0.9;
        }
        
        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
            text-align: left;
            color: #a72222;
            opacity: 0.9;
        }

        input {
            display: block;
            height: 50px;
            width: 95%;
            background-color: #33333318;
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        input[type=submit] {
            margin-top: 50px;
            width: 100%;
            color: #080710;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: #ff0000ff;
            padding: 5px 0;
            font-size: 18px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="wrapper-images">
            <div class="images-line">
                <img class="line" src="{{asset('imgs/images.jpeg')}}">
                <img class="line large" src="{{asset('imgs/BURGER_1728535808672_1741771655971.jpg')}}">
                <img class="line" src="{{asset('imgs/percision-blog-header-junk-food-102323.jpg')}}">
                <img class="line large" src="{{asset('imgs/chorizo-mozarella-gnocchi-bake-cropped-9ab73a3.jpg')}}">
                <img class="line" src="{{asset('imgs/download.jpeg')}}">
                <img class="line" src="{{asset('imgs/istockphoto-1407832840-612x612.jpg')}}">
            </div>
            <div class="images-line">
                <img class="line large" src="{{asset('imgs/BURGER_1728535808672_1741771655971.jpg')}}">
                <img class="line" src="{{asset('imgs/istockphoto-1407832840-612x612.jpg')}}">
                <img class="line" src="{{asset('imgs/download.jpeg')}}">
                <img class="line" src="{{asset('imgs/percision-blog-header-junk-food-102323.jpg')}}">
                <img class="line" src="{{asset('imgs/images.jpeg')}}">
                <img class="line large" src="{{asset('imgs/chorizo-mozarella-gnocchi-bake-cropped-9ab73a3.jpg')}}">
            </div>
            <div class="images-line">
                <img class="line" src="{{asset('imgs/percision-blog-header-junk-food-102323.jpg')}}">
                <img class="line" src="{{asset('imgs/istockphoto-1407832840-612x612.jpg')}}">
                <img class="line large" src="{{asset('imgs/chorizo-mozarella-gnocchi-bake-cropped-9ab73a3.jpg')}}">
                <img class="line large" src="{{asset('imgs/BURGER_1728535808672_1741771655971.jpg')}}">
                <img class="line" src="{{asset('imgs/download.jpeg')}}">
                <img class="line" src="{{asset('imgs/images.jpeg')}}">
            </div>
        </div>
        {{$slot}}
    </div>
</body>

</html>