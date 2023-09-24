  //カレンダー処理
    
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  
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
  
        eventStartEditable: false,
      
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
  
  
  