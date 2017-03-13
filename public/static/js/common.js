function run() {
    params = {'code':window.editor.getValue()};

    $.post('/run.php', params, function(data) {
        console.log(data);

        if (data.result) {
            $("#view").html("<pre>" +Base64.decode( data.result )+ "</pre>");
        }

        if (data.status == 'success') {
            $("#view").removeClass("hidden");
            $("#view").removeClass("failed");
        } else {
            $("#view").removeClass("hidden");
            $("#view").addClass("failed");
        }

    }, 'json');
}