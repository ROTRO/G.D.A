$(document).ready(function() {
  x=$('#niv').val();
 
  if(x==2)
  {
    $('#SCE').prop('disabled', true);
    $('#ChefVic').prop('disabled', true);
    $('#ChefSec').prop('disabled', true);
    $('#Direction').prop('disabled', true);
    $('#causes').prop('disabled', true);
    $('#tete').prop('disabled', true);
    $('#MemS').prop('disabled', true);
    $('#Yeux').prop('disabled', true);
    $('#MemI').prop('disabled', true);
    $('#Mains').prop('disabled', true);
    $('#LocI').prop('disabled', true);
    $('#Tronc').prop('disabled', true);
    $('#LocM').prop('disabled', true);
    $('#Pieds').prop('disabled', true);
    $('#Poly').prop('disabled', true);
    $('#Poly1').prop('disabled', true);
    $('#AJ').prop('disabled', true);
    
  }
      $('#Submit').click(function(){
        OK=true;
        if($('#SCE').val()==  '')
          {toastr.error('Champ Code Sécurité Sociale Vide', 'Error', {timeOut: 5000});OK=false;}
        else if (!document.getElementById('Poly').checked && !document.getElementById('Poly1').checked)
        {toastr.error('Veuillez selectionner OUI ou Non Dans le champ Polyaccidenté ', 'Error', {timeOut: 5000});OK=false;}
        else if($('#ChefVic').val()==  '')
          {toastr.error('Champ des Remarques de Chef Service de Victime est Vide ', 'Error', {timeOut: 5000});OK=false;}
        else if($('#ChefSec').val()==  '')
          {toastr.error('Champ des Remarques de Chef Service de Victime est Vide ', 'Error', {timeOut: 5000});OK=false;}
        else if($('#Direction').val()==  '')
          {toastr.error('Champ de la Direction est Vide ', 'Error', {timeOut: 5000});OK=false;}
        else{$("#form_id").submit();}
    });
});
