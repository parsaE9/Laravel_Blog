require('./bootstrap');

$(document).ready(function() {
    $("#add").click(function(){

        let lsthmtl = '<div class="form-group hdtuto">\n' +
            '            <label>\n' +
            '                <input type="file" name="images[]" class="form-control">\n' +
            '            </label>\n' +
            '            <button class="btn btn-danger" id="remove" type="button">Remove</button>\n' +
            '        </div>';

        $("#submit").before(lsthmtl);
    });

    $("body").on("click","#remove",function(){
        $(this).parents(".hdtuto").remove();
    });
});