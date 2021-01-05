$(document).ready(function () {
    $('#modifyArticle').on('show.bs.modal', function (e) {

        $("#id-price").val($(e.relatedTarget).data('price'));
        $("#id-copies").val($(e.relatedTarget).data('copies'));
        $("#id-id").val($(e.relatedTarget).data('id'));
        $("#id-image").attr("src",$(e.relatedTarget).data('image'));
    });
});
