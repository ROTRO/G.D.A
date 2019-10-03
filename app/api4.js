$(document).ready(function() {
    $('.swal2-confirm').click(function(){
        
     $('#searchAC').val($('.Rech1').attr('data-id'));
    
     
    });
   
       $('.swal2-confirm').click(function() {
         if($('#searchAC').val()!='') {
           let search = $('#searchAC').val();
           $.ajax({
             url: '../api/searchAC.php',
             data: {search},
             type: 'POST',
             success: function (response) {
               if(!response.error) {
                 let tasks = JSON.parse(response);
                 tasks.forEach(task => {
                  
                         $("#Fiche").text(`${task.Fiche}`);
                         $("#Mat_emp").text(`${task.Mat_emp}`);
                         $("#Dat_AC").text(`${task.Dat_AC}`);
                         $("#Nom").append(`${task.Nom}`,' ',`${task.Prenom}`);
                         $("#Date_em").text("Date D'embauche : ",`${task.Date_em}`);

                         if(`${task.Accident_Travail}`=='de_Trajet')
                         { $("#Accident_Travail").text('Trajet');}
                         else
                         {$("#Accident_Travail").text('Accident de Travail');}
                        
                         if(`${task.Tryptique}`=='NON')
                         { $("#Tryptique").text('Non');}
                         else
                         {$("#Tryptique").text('Oui');}
                         $("#Heure_AC").text(`${task.Heure_AC}`);
   
                         if(`${task.Evalue}`==1)
                         { $("#Evalue").text('Evalué');}
                         else
                         {$("#Evalue").text('pas Evalué encore');}
                         $("#Nat_sieg").text(`${task.Nat_sieg}`);
                         $("#de").text(`${task.de}`);
                         $("#a").text(`${task.a}`);
                          ch='';
                          if(`${task.tete}`=='True'){ch+='<li> Tete </li>';}
                          if(`${task.MemS}`=='True'){ch+='<li> Membrane Exterieur </li>';}
                          if(`${task.MemI}`=='True'){ch+='<li> Membrane Interieur </li>';}
                          if(`${task.Yeux}`=='True'){ch+='<li> Yeux </li>';}
                          if(`${task.Mains}`=='True'){ch+='<li> Mains </li>';}
                          if(`${task.Tronc}`=='True'){ch+='<li> Tronc </li>';}
                          if(`${task.LocI}`=='True'){ch+='<li>Loc Interieur </li>';}
                          if(`${task.LocM}`=='True'){ch+='<li> Loc Exterieur </li>';}
                          if(`${task.Pieds}`=='True'){ch+='<li> Pieds </li>';}
                          if(`${task.Poly}`=='True'){ $("#Poly").append('Oui');}else{ $("#Poly").append('Non');}
                          if(ch=='')
                          {ch='<li>Aucune Lesion</li>'}
                       $('#Lesions').append(ch);
                       $("#Poste").text(`${task.Poste}`);
                       $("#Depuis").text(`${task.Depuis}`);
                       $("#Habituel").text(`${task.Habituel}`);
                       $("#depuis2").text(`${task.depuis2}`);
                       $("#Date_repos").text(`${task.Date_repos}`);
                       $("#Horaire_Tra").text(`${task.Horaire_Tra}`);
                       $("#Descr").text(`${task.Descr}`);
   
                       $("#ChefVic").text(`${task.ChefVic}`);
                       $("#ChefSec").text(`${task.ChefSec}`);
                       $("#Direction").text(`${task.Direction}`);
                       x=`${task.Causes}`;
                      
                       x=x.split('*');
                      
                       ch1='';
                       for(i=0;i<x.length;i++)
                        {ch1+='<li> '+x[i]+' </li>';} 
                     if(ch1=='')
                     {ch1='Pas Des Causes Declarés'}
                       $('#causes').append(ch1);
                        /* 
                          Date_em
                         */
                 });
                 
               }
             } 
           })
         }
       });
     });
     
   
   
   
   
   
   
   