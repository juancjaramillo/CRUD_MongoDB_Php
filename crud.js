$(document).ready(function() {
    // Función para cargar usuarios al cargar la página
    function loadUsers() {
        $.ajax({
            url: 'crud_backend.php',
            type: 'GET',
            success: function(response) {
                $('#userTable').html(response);
            }
        });
    }

    loadUsers(); // Cargar usuarios al cargar la página

    // Función para agregar o actualizar un usuario
    $('#userForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'crud_backend.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                loadUsers();
                $('#userForm')[0].reset();
            }
        });
    });

    // Función para eliminar un usuario
    $(document).on('click', '.deleteUser', function() {
        var userId = $(this).data('userid');
        $.ajax({
            url: 'crud_backend.php',
            type: 'POST',
            data: { deleteId: userId },
            success: function(response) {
                loadUsers();
            }
        });
    });

    // Función para cargar datos de un usuario al formulario para actualizar
    $(document).on('click', '.editUser', function() {
        var userId = $(this).data('userid');
        $.ajax({
            url: 'crud_backend.php',
            type: 'POST',
            data: { editId: userId },
            success: function(response) {
                var data = JSON.parse(response);
                $('#userId').val(data._id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            }
        });
    });
});
