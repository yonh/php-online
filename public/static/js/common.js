function run() {
    params = {'code':window.editor.getValue()};

    $.post('/run.php', params, function(data) {
        console.log(data);
        if (data.status == 'success') {
            $("#view").html("<pre>" + data.result + "</pre>");
            $("#view").removeClass("hidden");
            $("#view").removeClass("failed");
        } else {
            $("#view").html("<pre>" + data.result + "</pre>");
            $("#view").removeClass("hidden");
            $("#view").addClass("failed");
        }

    }, 'json');
}