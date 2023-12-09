<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="./css/style.css">

    <!-- Include jQuery only once -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include DataTables and Responsive extension -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.5.0/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.5.0/dataTables.responsive.js"></script>


</head>

<body>
    <header id="header">
        <div class="logo">My<span id="text-contacts">Contacts</span></div>
        <nav>
            <ul>
                <li><a href="index.php">Contacts</a></li>
                <li><a href="index.php">Messages</a></li>
            </ul>
        </nav>
    </header>
    <main id="main">
        <section id="sec-1">
            <h1>Listes of Contacts</h1>
            <div class="container-add-filter">
                <form action="">
                    <select name="filter" id="filter">
                        <option value="last_name">Nom</option>
                        <option value="first_name">Prénom</option>
                        <option value="category">Category</option>
                    </select>
                </form>
                <button type="button" id="add-btn">
                    <span class="material-symbols-outlined">person_add</span>
                    Add new contact
                </button>

            </div>
        </section>
        <section id="sec-2">
            <table id="contactsTable" class="display">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </section>

    </main>
    <aside id="aside">
        <h2>
            Category
        </h2>
        <nav>
            <ul>
                <li>
                    <a href="#">Tout les Contacts</a>
                    <span>0-contacts</span>
                </li>
                <li><a href="#">Clients</a>
                    <span>0-contacts</span>
                </li>
                <li><a href="#">Companies</a>
                    <span>0-contacts</span>
                </li>
                <li><a href="#">Personals</a>
                    <span>0-contacts</span>
                </li>
                <li><a href="#">Autres</a>
                    <span>0-contacts</span>
                </li>
            </ul>
        </nav>
    </aside>
    <section id="sec-3">
        <button id="btn-close">
            <span class="material-symbols-outlined close">
                close
            </span>
        </button>
        <h1>Add New Contact</h1>
        <form id="addContactForm" action="your_php_file.php" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <!-- Add more options as needed -->
            </select>

            <button type="submit">Add Contact</button>
        </form>
    </section>

    <script>
        $(document).ready(function () {
            const table = $('#contactsTable').DataTable({
                responsive: true,
                data: [],
                columns: [
                    { data: 'first_name', title: 'Prénom' },
                    { data: 'last_name', title: 'Nom' },
                    { data: 'category_id', title: 'Catégorie' },
                ]
            });

            $('#contactsTable tbody').on('click', 'tr', function () {
                const data = table.row(this).data();
                displayContactDetails(data);
            });

            $('#add-btn').on('click', function () {


            });

            function displayContactDetails(contactData) {
            }

            // Ajax pour récupérer les données
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    table.clear().rows.add(data).draw();
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