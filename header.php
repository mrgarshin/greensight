<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Тестовое задание. Гринсайт!</title>
        <style>
        form input {
            margin: 4px;
        }
        .modal-container {
            display: none;
        }
        .modal-window {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 50%;
            z-index: 1000;
            opacity: 0;
            transition: all 1s ease;
        }
        .modal-dialog {
            box-shadow: 0 0 15px 0;
        }
        .modal-background {
            z-index: 100;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 0;
            background-color: rgba(0, 0, 0, .7);
            transition: all 1s ease;
        }
        </style>
    </head>
    <body>