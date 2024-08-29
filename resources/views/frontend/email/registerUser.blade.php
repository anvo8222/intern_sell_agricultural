<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        a {
            width: 200px;
            height: 200px;
            box-shadow: 16px 14px 20px #0000008c;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a::before {
            content: "";
            background-image: conic-gradient(#ff0052 20deg,
                    transparent 120deg);
            width: 150%;
            height: 150%;
            position: absolute;
            animation: rotate 2s linear infinite;
        }

        a::after {
            content: "Animation";
            width: 190px;
            height: 190px;
            background: #101010;
            position: absolute;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ff0052;
            font-size: larger;
            letter-spacing: 5px;
            box-shadow: inset 20px 20px 20px #0000008c;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }
    </style>
</head>

<body>
    <h2>Xin chào {{ $name }}</h2>
    <p>Bạn đã đăng ký tài khoản thành công tại Nông Trại Organic</p>
    <p>Để sử dụng tài khoản, vui lòng nhấn vào link bên dưới để kích hoạt tài khoản!</p>
    <a href="{{ route('user-active-account', ['id' => $userId, 'token' => $token]) }}">Nhấn vào đây để kích hoạt tài
        khoản!</a>
</body>

</html>
