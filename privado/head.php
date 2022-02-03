<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" content="Control de Ocupaci&oacute;n | Biblioteca de Ingenieria " />
<meta name="author" content="Jose Maria Vidal Vidal"/>
<?php echo '<base href="'.DIRBASE.'" />'?>

<?php echo '<base href="';
echo DIRBASE;
echo '" />';
echo "\n";
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="./publico/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="./publico/css/estilo.css" rel="stylesheet">
<link href="./publico/css/bic_calendar.css" rel="stylesheet">
<link href="./publico/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="./publico/js/jquery-1.9.1.min.js"></script>
<script src="./publico/js/bootstrap.js"></script>
<script src="./publico/js/jquery.validate.js"></script>
<script src="./publico/js/bic_calendar.js"></script>
<script src="./publico/js/moment.js"></script>
<script src="./publico/js/bootstrap-datetimepicker.js"></script>
<script>
$(document).ready(function() {
    var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var dayNames = ["L", "M", "M", "J", "V", "S", "D"];
    var date = '<?php echo  (int)$a_fecha[2].'/'.(int)$a_fecha[1].'/'.$a_fecha[0]?>';
    var events = [
{
    date: date,
    class: 'event_hoy',
    displayMonthController: true,
    displayYearController: true,
}];

$('#calendari_lateral1').bic_calendar({
    //list of events in array
    events: events,
    //enable select
    enableSelect: true,
    //enable multi-select
    multiSelect: true,
    //set day names
    dayNames: dayNames,
    //set month names
    monthNames: monthNames,
    date: date,
    //show dayNames
    showDays: true,
    //show month controller
    displayMonthController: true,
    //show year controller
    displayYearController: true,
    });
});


$(document).ready(function() {
    document.addEventListener('bicCalendarSelect', function(e) {
    moment.lang('es'); // default the language to English
    var dateFirst = new moment(e.detail.dateFirst);
    var dateLast = new moment(e.detail.dateLast);
    $('#from-day').val(dateFirst.format('LL'));
    $('#to-day').val(dateLast.format('LL'));
/*
* more about moment.js
* http://momentjs.com/docs/#/displaying/
*/
});
});

</script>