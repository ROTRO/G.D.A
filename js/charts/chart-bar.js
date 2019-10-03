Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$(document).ready(function() {
  Cause = new Array ("Controle Travail",'Defaut Protection','Protection individuelle non prevue','Defaut Conception','Procedure Inexistante','Outil en Mauvais Etat','Procedure Inadequate',"Equipement Defectueux","Procedure mal utilise","Disposition Dangereuse","Procedure non utilise","Defaut d'eclairage","Preparation Travail","Etat des Sols","Etat de Proprete Lieux","Explications Succinctes","Bruits","Explications ma comprises","Conditions Meteo","Phenomene externe","Distractions","Etat Physique Victime","Action Sans Permis","Incident Voisin","Securite Neutralises","Feu - Fuite avec Feu","Emploi anormal des Equipements","Explosion","Emploi anormal des Produits","Emploi Vehicule","Position de Travail","Tiers Origine","Protection individuelle","Societe");
  nbCause=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)  ;
  nbCausefn=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)  ;
  nCause=new Array()  ;
ch='';

  $('#find').click(function() {
    let year = $('#year').val();
     if($('#year').val()) {
          $.ajax({
            url: '../api/Satis2.php',
            data :{year},
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
        }
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
      }
      j=0;
      for(i=0;i<nbCause.length;i++)
      {if(nbCause[i]>3)
          {
            nbCausefn[j]=nbCause[i];
            nCause[j]=Cause[i];
            j++;
          }
      }
    });   



function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: nCause,
    datasets: [{
      label: "Accident",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: nbCausefn,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
   });
  /*for(i=0;i<nbCausefn.length;i++)
   {if(nbCausefn[i]!=0){nbCausefn[i]=0;}}
   for(i=0;i<nbCause.length;i++)
   {if(nbCause[i]!=0){nbCause[i]=0;}}*/
   
     
});

