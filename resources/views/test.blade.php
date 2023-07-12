<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="submitform()">
    <form name="myForm" action="{{ url('create') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="Email" placeholder="jdoe@mail.com">

        {{-- <button type="submit">Send</button> --}}
    </form>
    <script type="text/javascript" language="javascript">
        document.myForm.submit();
    </script>
</body>
</html>