$(document).ready(function() {
    // afficher la fenêtre modale lorsque l'utilisateur clique sur le bouton de suppression
    $(".add_favori").click(function(e) {
        var del_id = $(this).attr('id');
        e.preventDefault();
        $(this).addClass("text-sand");
        console.log('heartbutton clicked');
        $.ajax({
            type: 'POST',
            url: '../../admin/filter/favori.php',
            data: {delete_id: del_id},
            success: function(data) {
                //traitement en cas de suppression réussie
                console.log("User successfully deleted");
                // cacher la fenêtre modale
                $("#myModal").hide();
            },
            error: function(xhr, status, error) {
                console.log("Error deleting user");
            }
        });
    });
});