$(document).ready(function() {
  Cause = new Array ("Controle Travail",'Defaut Protection','Protection individuelle non prevue','Defaut Conception','Procedure Inexistante','Outil en Mauvais Etat','Procedure Inadequate',"Equipement Defectueux","Procedure mal utilise","Disposition Dangereuse","Procedure non utilise","Defaut d'eclairage","Preparation Travail","Etat des Sols","Etat de Proprete Lieux","Explications Succinctes","Bruits","Explications ma comprises","Conditions Meteo","Phenomene externe","Distractions","Etat Physique Victime","Action Sans Permis","Incident Voisin","Securite Neutralises","Feu - Fuite avec Feu","Emploi anormal des Equipements","Explosion","Emploi anormal des Produits","Emploi Vehicule","Position de Travail","Tiers Origine","Protection individuelle","Societe");
  nbCause=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)  ;
  nbCausefn=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)  ;
  nCause=new Array()  ;
ch='';
  $('body').click(function() {
          $.ajax({
            url: '../api/Satis2.php',

            type: 'POST',
            success: function (response) {
              if(!response.error) {
                let tasks = JSON.parse(response);
                tasks.forEach(task => {
                ch = `${task.Causes}`;
                });
                
              }
            } 
          })
      if(ch!='')
       {  ch=ch.split('*');
       for(i=0;i<ch.length;i++)
        {ch[i]=ch[i].trim();}
      for(i=0;i<ch.length;i++)
       {
         for(j=0;j<Cause.length;j++)
         {
           if(ch[i]==Cause[j])
           {nbCause[j]+=1;}
         }
         
       }
       //alert(ch[1]);
       
      }
      j=0;
      for(i=0;i<nbCause.length;i++)
      {if(nbCause[i]>2)
          {
            nbCausefn[j]=nbCause[i];
            nCause[j]=Cause[i];
            j++;
          }
      }
     /* for(j=0;j<nCause.length;j++)
       {alert("Cause = "+nCause[j]+'Nombre des Cause = '+nbCausefn[j]);
        }*/
      });
     
    });
    