$(document).ready(function() {
    $('#body').mouseenter(function() {
        if($('#search').val()) {
            $('#search').hide();
          let search = $('#search').val();
          $.ajax({
            url: '../api/search.php',
            data: {search},
            type: 'POST',
            success: function (response) {
              if(!response.error) {
                let tasks = JSON.parse(response);
                tasks.forEach(task => {
                 
                        $("#Nom").text(`${task.Nom}`);
                        $("#Prenom").text(`${task.Prenom}`);
                        $("#Age").text(`${task.Age}`);
                        $("#Fonc").text(`${task.Fonction}`);
                        $("#Adr").text(`${task.Adresse}`);
                        $("#Date_em").text(`${task.Date_em}`);
                        $("#Code").text(`${task.Code}`);
                });
                
              }
            } 
          })
        }
      });
    });
    