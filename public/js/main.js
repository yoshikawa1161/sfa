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
        url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
      }
    });

    $(".table").DataTable({
      // 件数切替機能 無効
      lengthChange: true,
      // 検索機能 無効
      searching: true,
      // ソート機能 無効
      ordering: true,
      // 情報表示 無効
      info: true,
      // ページング機能 無効
      paging: true,
      // 1列目を昇順にする ( [ [ 列番号, 昇順降順 ], ... ] の形式)
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


  //カレンダー処理
    
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      defaultView: 'dayGridMonth',
      //カレンダーを月ごとに表示
      editable: true,

      firstDay : 1,

      eventDurationEditable : false,

      selectLongPressDelay:0,

      events:"/setReports",
 
      initialView: 'dayGridMonth',
      locale: 'ja',
      height: 'auto',
      firstDay: 1,
      headerToolbar: {
        left: "dayGridMonth,listMonth",
        center: "title",
        right: "today prev,next"
      },
      buttonText: {
        today: '今月',
        month: '月',
        list: 'リスト'
      },

    
      selectable: true,
      select: function(info){
        var first=info.startStr;
        document.location.href="/reports/matter_select/?start="+encodeURIComponent(first);
      },


      eventClick:function(info){
        var id=info.event.id;
        document.location.href="/reports/edit/"+encodeURIComponent(id);

      },
  });
  calendar.render();
});






function addEvent(calendar,info){



  $.ajax({
      url: '/reports/matter_select',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      dataTape: 'json',
      data:{
          // 日程取得
          start:info.dateStr

      }
  })
}



function formatDate(date) {
  var year = date.getFullYear();
  var month = date.getMonth() + 1;
  var day = date.getDate();
  var newDate = year + '-' + month + '-' + day;
  return newDate;
}