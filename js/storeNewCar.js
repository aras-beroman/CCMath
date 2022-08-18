function handleSubmit() {
    $.ajax({
        type: "post",
        url: "http://localhost:8000/store/car",
        data: $("form").serialize(),
        success: function () {
            $("#exampleModal").modal("hide");
            $("#success_message").attr("hidden", false);

            setTimeout(function (){
                barChart.destroy();
                piChart.destroy();

                getDataForBarChart();
                getDataForPiChart();
                renderCarsTable();

                $("form")[0].reset();
                $("#success_message").attr("hidden", false);
            },2000)

        },
        error: function(result, status, error){
            $("#exampleModal").modal("hide");
            $("#error_message").html(result.responseText);
            $("#error_message").attr("hidden", false);

            setTimeout(function (){
                $("#error_message").attr("hidden", true);
            },3000)

            console.log(`Error occurred - ${error}`);
        }
    });
}