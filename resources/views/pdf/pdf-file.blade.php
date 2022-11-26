<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>download view as pdf</title>
</head>
<body>
    <h1>Hello Rajeev </h1>
    <p>I am trying to convert view to pdf document </p>
    <table>
            <tr>
                <th>Name</th><td>{{$userInfo->name}}</td>
            </tr>
            <tr>
                <th>Email</th><td>{{$userInfo->email}}</td>
            </tr>
            <tr>
                <th>Mobile No.</th><td>{{$userInfo->mobile}}</td>
            </tr>
            <tr>
                <th>Address</th><td>{{$userInfo->address}}</td>
            </tr>
    </table>
</body>
</html>
