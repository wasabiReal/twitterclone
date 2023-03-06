<!doctype html>
<html>
<head>
    <meta content="UTF-8">
    <title>Error</title>
</head>
<style>
    h1{
        color: lightcoral;
    }
</style>
<body>

<div class="contaiter">
    <h1>An error was received!</h1>
    <p>Error code: <b><?= $errno; ?></b></p>
    <p>Text: <b><?= $errstr; ?></b></p>
    <p>File: <b><?= $errfile; ?></b> on line <b><?= $errline;?></b></p>
</div>

</body>
</html>