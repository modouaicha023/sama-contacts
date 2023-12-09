let categories;
let formDataUpdate = {};
let contactData;
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
        success: function (response) {
            categories = response;
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

        contactData = table.row(this).data();
        console.log(contactData);
        displayContactDetails(contactData);
    });

    $('#add-btn').on('click', function () {
        $('#sec-3').css('display', 'block');
        $('#sec-4').css('display', 'none');
    });

    $('#cancel-btc').on('click', function () {
        $('#addContactForm')[0].reset();
        $('#sec-3').css('display', 'none');
    });

    $('#close').on('click', function () {
        $('#sec-3').css('display', 'none');
        $('#addContactForm')[0].reset();
    });



    $('#close-details').on('click', function () {
        $('#sec-4').css('display', 'none');
    });
    $("#cancel-btc-details").on('click', function () {
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
                    updateCategoryCounts();
                    $('#sec-3').css('display', 'none');


                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });
    });


    function displayContactDetails(contactData) {
        $('#first_name-details').val(contactData.first_name);
        $('#last_name-details').val(contactData.last_name);
        $('#phone-details').val(contactData.phone);
        $('#email-details').val(contactData.email);
        $('#address-details').val(contactData.address);

        const categoryDropdownDetails = $('#category_id-details');
        categoryDropdownDetails.empty(); // Clear existing options

        $.each(categories, function (index, category) {
            const option = $('<option>', {
                value: category.id,
                text: category.name
            });
            categoryDropdownDetails.append(option);
        });

        categoryDropdownDetails.val(contactData.category_id);
        $('#category_id-details option[value="' + contactData.category_id + '"]').prop('selected', true);

        $('#sec-3').css('display', 'none');
        $('#sec-4').css('display', 'block');
    }

    $('#editContactForm').on('submit', function (e) {
        e.preventDefault();
        const contactId = contactData.id; /* Get the contact ID */
        const formDataArray = $(this).serializeArray();
        // Convert the array to an object

        formDataArray.forEach(function (field) {
            formDataUpdate[field.name] = field.value;
        });
        editContact(contactId);
    });

    function editContact(contactId) {

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {
                contact_id: contactId,
                formData: formDataUpdate,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    table.ajax.reload();
                    updateCategoryCounts();
                    $('#sec-4').css('display', 'none');
                    console.log("atfer");
                    console.log(formDataUpdate);

                } else {
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });

    }
    function updateCategoryCounts() {
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: { action: 'getCategoryCounts' },
            dataType: 'json',
            success: function (counts) {
                const menu = $('#menu');
    
                // Clear existing items
                menu.empty();
    
                counts.forEach(function (category) {
                    const listItem = $('<li>');
                    const link = $('<a>', { href: '#' }).text(category.name);
                    const countSpan = $('<span>').text(category.count + '-contacts');
    
                    listItem.append(link);
                    listItem.append(countSpan);
                    menu.append(listItem);
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    
    updateCategoryCounts();
    


});
