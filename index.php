<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sama-Contacts</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="./css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
        <div class="logo">Sama<span id="text-contacts">Contacts</span></div>
        <nav>
            <ul>
                <li><a href="index.php">Contacts</a></li>
                <li><a href="#">Others</a></li>
            </ul>
        </nav>
    </header>
    <main id="main">
        <section id="sec-1">
            <h1>Listes of Contacts</h1>
            <div class="container-add-filter">
                <!-- <form action="">
                    <select name="filter" id="filter">
                        <option value="last_name">Nom</option>
                        <option value="first_name">Prénom</option>
                        <option value="category">Catégorie</option>
                    </select>
                </form> -->
                <button type="button" id="add-btn">
                    <span class="material-symbols-outlined">person_add</span>
                    Ajouter Contact
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
                <tbody></tbody>
            </table>
        </section>
        <section id="sec-3">
            <span class="material-symbols-outlined" id="close">close</span>
            <h1>Ajouter Nouveau Contact</h1>
            <form id="addContactForm" method="POST">
                <label for="first_name">Prénom:
                    <input type="text" id="first_name" name="first_name" required>
                </label>

                <label for="last_name">Nom:
                    <input type="text" id="last_name" name="last_name" required>
                </label>

                <label for="phone">Téléphone:
                    <input type="text" id="phone" name="phone" required>
                </label>

                <label for="email">Email:
                    <input type="email" id="email" name="email" required>
                </label>

                <label for="address">Addresse:
                    <input type="text" id="address" name="address" required>
                </label>

                <label for="category_id">Categorie:
                    <select id="category_id" name="category_id" required></select>
                </label>
                <div class="button">
                    <button type="submit" id="sumbit-btc">Enregistrer Contact</button>
                    <button type="button" id="cancel-btc">Annuler</button>
                </div>
            </form>
        </section>
        <section id="sec-4">
            <span class="material-symbols-outlined" id="close-details">close</span>
            <h1>Détails du Contact</h1>
            <form id="editContactForm" method="POST">
                <label class=".contact-details-item" for="first_name">
                    <p>
                        Prénom:
                    </p>
                    <input type="text" id="first_name-details" name="first_name-details" required>
                </label>

                <label class=".contact-details-item" for="last_name">
                    <p>
                        Nom:
                    </p>
                    <input type="text" id="last_name-details" name="last_name-details" required>
                </label>

                <label class=".contact-details-item" for="phone">
                    <p>
                        Téléphone:
                    </p>
                    <input type="text" id="phone-details" name="phone-details" required>
                </label>

                <label class=".contact-details-item" for="email">
                    <p>
                        Email:
                    </p>
                    <input type="email" id="email-details" name="email-details" required>
                </label>

                <label class=".contact-details-item" for="address">
                    <p>
                        Addresse:
                    </p>
                    <input type="text" id="address-details" name="address-details" required>
                </label>

                <label class=".contact-details-item" for="category_id">
                    <p>
                        Categorie:
                    </p>
                    <select id="category_id-details" name="category_id-details" required></select>
                </label>
                <div class="button">
                    <button type="submit" id="edit-btc">Editer Contact</button>
                    <button type="button" id="cancel-btc-details">Annuler</button>
                </div>

            </form>
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

    <script src="script.js"></script>

</body>

</html>