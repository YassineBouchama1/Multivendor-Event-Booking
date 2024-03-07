<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Reservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            gap: 2px;
            background-color: #fff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container1 {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;

            gap: 2px;
            background-color: #fff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        img {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .code{
            width: 50%;
        }
        h4{
            padding-bottom: 6px
        }
        .info{
            font-weight: 100,
            color:green
        }
    </style>
</head>
<body class="container1">
        <h4>Booking Details </h2>
        <hr>
    <div class="container ">

  <div class="code">

     <p> Id :<span class="info">{{$reservation->event->start_date}}</span></p>
     <p> Price :<span class="info">${{$reservation->event->price}}</span></p>
     <p> Locations :<span class="info">{{$reservation->event->location}}</span></p>

  </div>

    </div>

</body>
</html>
