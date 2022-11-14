<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <script>
        window.opener.postMessage({
            source: 'versite@auth-google-callback',
            payload: @json($payload)
        }, '*');
        window.close();
    </script>
</head>
<body>
</body>
</html>
