$(document).ready(function () {
    $('#modifyArticle').on('show.bs.modal', function (e) {

        $("#id-price").val($(e.relatedTarget).data('price'));
        $("#id-copies").val($(e.relatedTarget).data('copies'));
        $("#id-id").val($(e.relatedTarget).data('id'));
        $("#id-image").attr("src",$(e.relatedTarget).data('image'));
    });

    $('#btn-number').click(function (e){

        let current = $("#id-copies").val();
        let add = $(e.relatedTarget).data('val');
        console.log(add);
        console.log(current);
        current += add;
        $("#id-copies").val(current);
    });
});
