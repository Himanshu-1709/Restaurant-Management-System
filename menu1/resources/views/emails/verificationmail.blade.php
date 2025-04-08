<!--<html>-->
<!--<head>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />-->
<!--    <title>Document</title>-->

<!--    <style>-->
    
<!--        .col {-->
<!--  background: #FC8019;-->
<!--  display: grid;-->
<!--  justify-content: center;-->
<!--  align-items: center;-->
<!--  height: 100%;-->
<!--  font-family: "Inter", sans-serif;-->
<!--}-->

<!--.card {-->
<!--  background-color: white;-->
<!--  margin-top: 20%;-->
<!--  margin-bottom: 10%;-->
<!--  border-radius: 10px;-->
<!--  padding: 20px;-->
<!--  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);-->
<!--  display: flex;-->
<!--  flex-direction: column;-->
<!--  align-items: center;-->
<!--  text-align: center;-->
<!--}-->
<!--.card {-->
<!--  max-width: 100%;-->
  <!--height: auto; /* Maintain aspect ratio */-->
<!--  border-radius: 7%;-->
<!--}-->

<!--img {-->
<!--  max-width: 100%;-->
<!--  height: auto;-->
<!--}-->

<!--h1 {-->
<!--  font-size: xxx-large;-->
<!--  margin: 0%;-->
<!--}-->

<!--.a button {-->
<!--  font-size: 20px;-->
<!--  padding: 10px 20px;-->
<!--  border-radius: 50px;-->
<!--  background: #FC8019;-->
<!--  color: white;-->
<!--  border: none;-->
<!--}-->

<!--@media (max-width: 768px) {-->
<!--  .card {-->
<!--    max-width: 90%;-->
<!--    margin: 4%;-->
<!--    padding: 0%;-->
<!--  }-->

<!--  h1 {-->
<!--    font-size: x-large;-->
<!--  }-->

<!--  .button {-->
<!--    margin-bottom: 10%;-->
<!--  }-->

<!--  p {-->
<!--    font-size: 10px;-->
<!--    margin-left: 15px;-->
<!--    margin-right: 15px;-->
<!--  }-->
<!--}-->

<!--    </style>-->
<!--</head>-->

<!--<body>-->
<!--    <div class="row">-->
<!--        <div class="col">-->
<!--            <div class="card">-->
<!--                <img src="Group 1.png" alt="">-->
<!--                <div class="col-1">-->
<!--                    <h1>Verify Your Email</h1>-->
<!--                </div>-->
<!--                <p>-->
<!--                    Almost there! We've send a verification email to , {{ $data['name'] }}@gmail.com. <br> You need to verify your-->
<!--                    email-->
<!--                    address to log into Desiplace for team-->
<!--                </p>-->
<!--                <div class="button">-->
<!--                    <a href="{{ $data['url'] }}">Resend Email</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</body>-->

<!--</html>-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background-color: #FC8019;
    }

    .container {
      background-color: #FFA94D; /* Updated to a lighter shade of orange */
      margin: 10% 5%;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 90%;
      margin: auto;
      text-align: center;
    }

    img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    h1 {
      font-size: 2em;
      margin: 0;
    }

    p {
      font-size: 16px;
      margin: 15px 0;
    }

    .button a {
      display: inline-block;
      font-size: 20px;
      padding: 10px 20px;
      border-radius: 50px;
      background-color: #FC8019; /* Button background color */
      color: white;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <img src="{{asset('user/assets/images/verification.png')}}" alt="Verification Image">
    <div>
      <h1>Verify Your Email</h1>
    </div>
    <p>Almost there! We've sent a verification email to {{ $data['name'] }}@gmail.com. <br> You need to verify your email address to log into Desiplace for the team.</p>
    <div class="button">
      <a href="{{ $data['url'] }}">Verify Your Email</a>
    </div>
  </div>
</body>

</html>



