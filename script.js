$(document).ready(function () {
    const table = $('#contactsTable').DataTable({
        responsive: true,
        columns: [
            { data: 'first_name', title: 'Prénom' },
            { data: 'last_name', title: 'Nom' },
            { data: 'category_name', title: 'Catégorie' },
        ],
        ajax: {
            url: 'ajax.php',
            type: 'GET',
            data: { action: 'getAllContacts' },
            dataSrc: ''
        }
    });

    $.ajax({
        url: 'ajax.php',
        type: 'GET',
        data: { action: 'getCategories' },
        dataType: 'json',
        success: function (categories) {
            const categoryDropdown = $('#category_id');
            categoryDropdown.empty();
            $.each(categories, function (index, category) {
                categoryDropdown.append($('<option>', {
                    value: category.id,
                    text: category.name
                }));
            });
        },
        error: function (error) {
            console.error(error);
        }
    });


    $('#contactsTable tbody').on('click', 'tr', function () {

        const data = table.row(this).data();
        console.log(data);
        displayContactDetails(data);
    });

    $('#add-btn').on('click', function () {
        $('#sec-3').css('display', 'block');
    });
    $('#cancel-btc').on('click', function () {
        $('#addContactForm')[0].reset();
        $('#sec-3').css('display', 'none');
    });
    
    $('#close').on('click', function () {
        $('#sec-3').css('display', 'none');
        $('#addContactForm')[0].reset();
    });

    $('#edit-btc').on('click', function () {
        $('#sec-3').css('display', 'none');
    });

    $('#close-details').on('click', function () {
        $('#sec-4').css('display', 'none');
    });


    $('#addContactForm').on('submit', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#addContactForm')[0].reset();

                    table.ajax.reload();
                    $('#sec-3').css('display', 'none');


                    // alert(response.message);
                } else {
                    // alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });
    });

    function displayContactDetails(contactData) {
        $('#first_name-details').text(contactData.first_name);
        $('#last_name-details').text(contactData.last_name);
        $('#phone-details').text(contactData.phone);
        $('#email-details').text(contactData.email);
        $('#address-details').text(contactData.address);
        $('#category_id-details').text(contactData.category_name);

        $('#edit-btc').on('click', function () {

        });

        $('#sec-4').css('display', 'block');
    }

    
});
