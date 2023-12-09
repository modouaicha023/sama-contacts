<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <nav>

        </nav>
    </header>
    <main>
        <section></section>
    </main>
    <aside></aside>

    <footer></footer>


    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    </script>
</body>

</html>