//テーブル選択時の処理
jQuery(function($) {
    $('tbody tr[data-href]').addClass('clickable').click(function() {
        window.location = $(this).attr('data-href');
    }).find('a').hover(function() {
        $(this).parents('tr').unbind('click');
    }, function() {
        $(this).parents('tr').click(function() {
            window.location = $(this).attr('data-href');
        });
    });
});

jQuery(function($) {
    // デフォルトの設定を変更
    $.extend($.fn.dataTable.defaults, {
      language: {
        url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
      }
    });

    $(".table").DataTable({
      order: [
        [1, "asc"]
      ]
    });
  });
  

  // 名刺画像プレビュー処理
    // 画像が選択される度に、この中の処理が走る
    $('#name_card').on('change', function (ev) {
        const reader = new FileReader();
        // ファイル名を取得
        const fileName = ev.target.files[0].name;
        // 画像が読み込まれた時の動作を記述
        reader.onload = function (ev) {
            $('#name_card_img_prv').attr('src', ev.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    })
  


  //活動日付などのinputカレンダー
  flatpickr(document.getElementsByClassName('calendar'), {
    locale: 'ja',
    dateFormat: "Y-m-d H:i",
    enableTime: true
  });


  //受注予定日のinputカレンダー
  flatpickr(document.getElementsByClassName('calendar_date'), {
  locale: 'ja',
  dateFormat: "Y-m-d",
  });

  



function formatDate(date) {
  var year = date.getFullYear();
  var month = date.getMonth() + 1;
  var day = date.getDate();
  var newDate = year + '-' + month + '-' + day;
  return newDate;
}