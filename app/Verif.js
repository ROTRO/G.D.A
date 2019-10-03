$(document).ready(function() {
 
        x=$("#niv").val();
        y=$("#eva").val();
 
        if(x==2)
        {$('#dateAC').prop('disabled', true);
        $('#HeureAC').prop('disabled', true);
        $('#AC').prop('disabled', true);
        $('#AC1').prop('disabled', true);
        $('#TD').prop('disabled', true);
        $('#TD1').prop('disabled', true);
        $('#search').prop('disabled', true);
        if(y==1)
         { $('#LesDes').prop('disabled', true);
         $('#de').prop('disabled', true);
         $('#a').prop('disabled', true);
         $('#DateEm').prop('disabled', true);
         $('#Poste').prop('disabled', true);
         $('#Depuis1').prop('disabled', true);
         $('#Habituel').prop('disabled', true);
         $('#Horaire').prop('disabled', true);
         $('#Depuis2').prop('disabled', true);
         $('#DateRepos').prop('disabled', true);
         $('#DateRepos').prop('disabled', true);
         $('#DescAC').prop('disabled', true);}
      }
        else if (x==1 || x==3)
        {
          $('#LesDes').prop('disabled', true);
          $('#de').prop('disabled', true);
          $('#a').prop('disabled', true);
          $('#DateEm').prop('disabled', true);
          $('#Poste').prop('disabled', true);
          $('#Depuis1').prop('disabled', true);
          $('#Habituel').prop('disabled', true);
          $('#Horaire').prop('disabled', true);
          $('#Depuis2').prop('disabled', true);
          $('#DateRepos').prop('disabled', true);
          $('#DateRepos').prop('disabled', true);
          $('#DescAC').prop('disabled', true);

        }

    $('#Submit').click(function(){
        OK=true;
        x=$("#niv").val();
       if(x==1 || x==3)
        {if($('#search').val()==  '')
          {toastr.error('Champ Matricule Vide', 'Error', {timeOut: 5000});
          //toastr.error(document.getElementById('HeureAC').value+'work', 'Error', {timeOut: 5000});
          OK=false;}
          else if(!document.getElementById('AC').checked && !document.getElementById('AC1').checked)   
         {toastr.error("Selectioner Accident de Travail ou de Trajet", 'Error', {timeOut: 5000});OK=false;}
          else if(!document.getElementById('TD').checked && !document.getElementById('TD1').checked)   
          { toastr.error("Selectioner OUI ou NON dans le Tryptique Délivré", 'Error', {timeOut: 5000});OK=false;}
        else if($('#dateAC').val()==  '')   
        {toastr.error("Veuillez Entrer le date de l'Accident", 'Error', {timeOut: 5000});OK=false;}
         else if($('#HeureAC').val()==  '')   
         {toastr.error("Veuillez Entrer le Temps de l'Accident ", 'Error', {timeOut: 5000});OK=false;}  
         else{$("#form_id").submit();}  
        }
        else if(x==2){
         if($('#LesDes').val()==  '')   
         {toastr.error("Veuillez Entrer Nature et Siege des lésions ", 'Error', {timeOut: 5000}); OK=false;}
         else if($('#de').val()==  '')   
         {toastr.error("Veuillez Entrer L' Arret Probable ", 'Error', {timeOut: 5000});OK=false;}
         else if($('#a').val()==  '')   
         {toastr.error("Veuillez Entrer L' Arret Probable ", 'Error', {timeOut: 5000});OK=false;}
         else if($('#DateEm').val()==  '')   
         {toastr.error("Veuillez Entrer Le Date D'embauche ", 'Error', {timeOut: 5000});OK=false;} 
         else if($('#Poste').val()==  '')   
         {toastr.error("Veuillez Entrer Le Poste lors de L'Accident ", 'Error', {timeOut: 5000});OK=false;} 
         else if($('#Depuis1').val()==  '')   
         {toastr.error("Le Champ 'Depuis' est Vide ", 'Error', {timeOut: 5000});OK=false;}
         else if($('#Habituel').val()==  '')   
         {toastr.error("Le Champ 'Habituel' est Vide ", 'Error', {timeOut: 5000});OK=false;}
         else if($('#Depuis2').val()==  '')   
         {toastr.error("Le Champ 'Depuis' est Vide  ", 'Error', {timeOut: 5000});OK=false;}
         else if($('#DateRepos').val()==  '')   
         {toastr.error("Veuillez Entrer Le Date De Dernier Repos ", 'Error', {timeOut: 5000}); OK=false;}
         else if($('#DateRepos').val()==  '')   
         {toastr.error("Veuillez Entrer Le Date De Dernier Repos ", 'Error', {timeOut: 5000}); OK=false;}
         else if($('#DescAC').val()==  '')   
         {toastr.error("Veuillez Entrer Le Description de L'Accident ", 'Error', {timeOut: 5000});OK=false;}
         else{$("#form_id").submit();}
        } 
    })

});