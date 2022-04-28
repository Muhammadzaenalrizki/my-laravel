<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
</head>

<body>
    <input type="file" name="" id="">
    <button onclick="upload()">upload</button>
    <div id="myProgressbar" class="progress">
        <div class="progress-bar" id="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0"
            aria-valuemax="100">
            <span class="sr-only">0% Complete</span>
        </div>
    </div>
    <script>
        function upload() {
            let data = new FormData();
            data.append('image', document.querySelector('input[type="file"]').files[0]);
            uploadFile(data, '/upload/postImage')
        }

        function uploadFile(data, url) {
            let request = new XMLHttpRequest();
            request.open('POST', url);
            // upload progress event
            request.upload.addEventListener('progress', function(e) {
                // upload progress as percentage
                let percent_completed = (e.loaded / e.total) * 100;
                console.log('size ' + bytesToSize(e.total));
                console.log(bytesToSize(e.loaded));
                console.log(document.querySelector('#progress'));
                document.querySelector('#progress').style.width = percent_completed + '%';
                console.log(percent_completed + '%');
            });

            // request finished event
            request.addEventListener('load', function(e) {
                // HTTP status message (200, 404 etc)
                console.log(request.status);
                // request.response holds response from the server
                console.log(request.response);
            });
            request.setRequestHeader("Accept", "application/json, text-plain, */*");
            request.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content'));
            request.send(data);

        }

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
    </script>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="js/progressbar.js"></script>
</body>

</html>
