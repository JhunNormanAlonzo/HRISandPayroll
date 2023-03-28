<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Employee Report</h1>

<table>
    <th style="font-size: 8px;">Name</th>
    <th style="font-size: 8px;">EmpCtrl</th>
    @foreach($employees as $emp)
        <tr>
            <td style="font-size: 8px;">{{$emp->emp_name}}</td>
            <td style="font-size: 8px;">{{$emp->emp_ctrl}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
