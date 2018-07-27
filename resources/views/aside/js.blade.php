<script>
$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });


  local= ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado' ];
    $('#date').datepicker().on("changeDate ", function (){

       var today= new Date($('#date').datepicker('getDate'));
       var dia = $("#date").datepicker('getDate').getDate();                 
       var mes = $("#date").datepicker('getDate').getMonth() + 1;             
       var año = $("#date").datepicker('getDate').getFullYear();
       var fecha = año + "-0" + mes + "-" + dia;
       var dia=local[today.getDay()];
       if(dia=='Sabado' || dia=='Domingo')
       {
        
        $('#info-dia').append('No hay horarios para este dia');
       }
       else
       {
        $('#info-dia').empty();
        $.get('/ajax_fecha?fecha='+fecha, function(data){
          if(data=="no")
          {
            $('#info-dia').empty();
            $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>08:00</th><td><div class="radio"><label><input type="radio" name="hora" value="08:00" required></label></div></td></tr><tr><th>10:00</th><td><div class="radio"><label><input type="radio" name="hora" value="10:00" required></label></div></td></tr><tr><th>12:00</th><td><div class="radio"><label><input type="radio" name="hora" value="12:00" required></label></div></td></tr></tbody></table>');
          }
          else
          {
            var valores = [];
            for(i = 0; i < data.length; i++)
            {
              if(data[i].hora=='08:00:00')
              {
                valores.push("1");
              }
              if(data[i].hora=='10:00:00')
              {
                valores.push("2");
              }
              if(data[i].hora=='12:00:00')
              {
                valores.push("3");
              }
            }
            if(valores.includes("1"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>10:00</th><td><div class="radio"><label><input type="radio" name="hora" value="10:00" required></label></div></td></tr><tr><th>12:00</th><td><div class="radio"><label><input type="radio" name="hora" value="12:00" required></label></div></td></tr></tbody></table>');
            }
            if(valores.includes("1") && valores.includes("2"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>12:00</th><td><div class="radio"><label><input type="radio" name="hora" value="12:00" required></label></div></td></tr></tbody></table>');
            }
            if(valores.includes("3"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>08:00</th><td><div class="radio"><label><input type="radio" name="hora" value="08:00" required></label></div></td></tr><tr><th>10:00</th><td><div class="radio"><label><input type="radio" name="hora" value="10:00" required></label></div></td></tr></tbody></table>');
            }
            if(valores.includes("3") && valores.includes("2"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>08:00</th><td><div class="radio"><label><input type="radio" name="hora" value="08:00" required></label></div></td></tr></tbody></table>');
            }
            if(valores.includes("2"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('<table class="table table-hover"><thead><tr><th scope="col">Horario</th><th scope="col">Tomar</th></tr></thead><tbody><tr><th>08:00</th><td><div class="radio"><label><input type="radio" name="hora" value="08:00" required></label></div></td></tr><tr><th>12:00</th><td><div class="radio"><label><input type="radio" name="hora" value="12:00" required></label></div></td></tr></tbody></table>');
            }
            if(valores.includes("1") && valores.includes("2") && valores.includes("3"))
            {
                $('#info-dia').empty();
                $('#info-dia').append('No hay horarios para este dia');
            }
          }
        });
       }
    });
</script>