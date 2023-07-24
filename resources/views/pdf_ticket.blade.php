<!DOCTYPE html>
<html>
<head>
    <title>ticket</title>
</head>
<body>
    <h1>Nama : {{ auth()->user()->name}}</h1>
    @foreach (auth()->user()->userTickets()->get() as $t)
     <h1>Kode Antrian : {{ $t->queue_number  }}</h1>   
     <h1>Kode tiket : {{ $t->ticket  }}</h1>   
    @endforeach
</body>
</html>