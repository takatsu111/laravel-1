$(function () {
    $('.js-form').on('submit', function (e) {
        e.preventDefault();
        const $this = $(this);
        const $button = $this.find('button');
        const $content = $this.find('#content_id');
        const $counter = $this.find('.js-count');

        const func = $button.val();
        const content_id = $content.val();
        const count = Number($counter.text());

        $counter.text("更新中...");
        $button.prop("disabled", true);

        $.ajax({
            type: "post",
            url: "/board/good",
            datatype: "json",
            data: {
                function: func,
                content_id: content_id,
                _token: $('input[name="_token"]').val()
            },
        }).done(function () {
            $button.toggleClass('btn-danger');
            $button.toggleClass('btn-primary');

            if (func === 'insert') {
                $counter.text(1 + count);
                $button.val('delete');
            } else {
                $this.find('.js-count').text((-1) + count);
                $button.val('insert');
            }

            $button.prop("disabled", false);

        }).fail(function () {
            $counter.text(count);
            alert("処理に失敗しました");
            $button.prop("disabled", false);
        });

    });

})
