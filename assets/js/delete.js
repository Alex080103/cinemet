


$(document).ready(function() {
    // afficher la fenêtre modale lorsque l'utilisateur clique sur le bouton de suppression
    $(".delete_user").click(function() {
        var del_id = $(this).attr('id');
        $("#myModal").show();
        // lorsque l'utilisateur clique sur le bouton "oui"
        $(".btn-yes").click(function() {
            $.ajax({
                type: 'POST',
                url: '../../admin/delete/deleteUser.php',
                data: {delete_id: del_id},
                success: function(data) {
                    //traitement en cas de suppression réussie
                    console.log("User successfully deleted");
                    //supprimer l'élément HTML correspondant
                    $("#"+del_id).remove();
                    // cacher la fenêtre modale
                    $("#myModal").hide();
                },
                error: function(xhr, status, error) {
                    console.log("Error deleting user");
                }
            });
        });
        // lorsque l'utilisateur clique sur le bouton "non"
        $(".btn-no, .close").click(function() {
            // cacher la fenêtre modale
            $("#myModal").hide();
        });
    });
});

$(document).ready(function() {
    // afficher la fenêtre modale lorsque l'utilisateur clique sur le bouton de suppression
    $(".delete_film").click(function() {
        var del_id = $(this).attr('id');
        $("#myModal").show();
        // lorsque l'utilisateur clique sur le bouton "oui"
        $(".btn-yes").click(function() {
            $.ajax({
                type: 'POST',
                url: '../../admin/delete/deleteFilm.php',
                data: {delete_id: del_id},
                success: function(data) {
                    //traitement en cas de suppression réussie
                    console.log("User successfully deleted");
                    //supprimer l'élément HTML correspondant
                    $("#"+del_id).remove();
                    // cacher la fenêtre modale
                    $("#myModal").hide();
                },
                error: function(xhr, status, error) {
                    console.log("Error deleting user");
                }
            });
        });
        // lorsque l'utilisateur clique sur le bouton "non"
        $(".btn-no, .close").click(function() {
            // cacher la fenêtre modale
            $("#myModal").hide();
        });
    });
});
