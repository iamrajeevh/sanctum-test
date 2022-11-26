<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Documents</title>
</head>
<body>
<h2>
    Here you can download your full info in pdf
</h2>
<p>
    <a href="{{route('download-pdf-now')}}" >Download Now in PDF</a><br/>
    <a href="{{route('download-excel-now')}}" >Download Now in Excel</a>

    <H4>
        Import data from excel
    </H4>
    <form action="{{url('import-excel')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" name="submit">Import Now</button>
    </form>
</p>
</body>
</html>
