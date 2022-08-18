
const handleDelete = (id) => {
    $.ajax({
        url: "http://localhost:8000/delete/car",
        type: 'POST',
        data: {"id": id},
        dataType: 'json',
        success: function(result) {
            setTimeout(function (){
                barChart.destroy();
                piChart.destroy();
                getDataForBarChart();
                getDataForPiChart();
                renderCarsTable();
                $("#success_message").attr("hidden", false);
            },2000)

        },
        error: function(result, status, error){
            console.log(`Error occurred - ${error}`)
        }
    });
}

function renderCarsTable() {
    $.ajax({
        url: "http://localhost:8000/cars",
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            if (result['data'].length > 0) {
                $("#cars-table > tbody"). empty();
                $('#cars-table').attr('hidden', false);
                $("#no-records-found").attr("hidden", true);
                $.each(result['data'],function (key, value){
                    $('<tr>').append(
                        $('<td>').html(value.brand),
                        $('<td>').html(value.model),
                        $('<td>').html(value.year),
                        $('<td>').html('<a href="#" onclick="handleDelete('+value.id+')">Delete</a>')
                    ).appendTo('#cars-table');
                });
            } else {
                $("#no-records-found").attr("hidden", false);
            }
        },
        error: function(result, status, error){
            console.log(`Error occurred - ${error}`)
        }
    });
}