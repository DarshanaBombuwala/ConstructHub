
<!DOCTYPE html>
<html>
<head>
    <title>Open PHP File on Button Click</title>
</head>
<body>
    <h1>this is the leave view</h1>
    
    <button type="button" onclick="openPhpFileAdd()">request a leave</button>
    <script>
        function openPhpFileAdd() {
            window.location.href = "http://localhost/MVC/Public/Leave/add";
        }
    </script>
    <button type="button" onclick="openPhpFileRetrieve()">My Requests</button>
    <script>
        function openPhpFileRetrieve() {
            window.location.href = "http://localhost/MVC/Public/Leave/retrieve";
        }
    </script>
</body>
</html>


