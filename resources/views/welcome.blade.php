<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EducaImpulso</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <div id="app">
            <welcome :user-name='@json(auth()->user()->name)'
                :user-id='@json(auth()->user()->id)'></welcome>
        </div>
        
        
    </body>
</html>
