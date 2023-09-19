
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), { 
        center: { // 地図の中心を指定
              lat: 35.3848928, // 緯度
             lng: 140.1852838 // 経度
          },
         zoom: 10 // 地図のズームを指定
      });
   }
   
   
   
     // DB情報の取得(ajax)
     $(function() {
       $.ajax({
         type: "POST",
         url: "/set_delivery",
         dataType: "json",
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       }).done(function(data) {
           markerlist = data;
           setMarker(markerlist);
         }).fail(function(jqXHR, textStatus, errorThrown) {
           // 通信失敗時の処理
           alert('ファイルの取得に失敗しました。');
           console.log("ajax通信に失敗しました");
           console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
           console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
           console.log("errorThrown    : " + errorThrown.message); // 例外情報
           console.log("URL            : " + url);
       });
     });
   
   
     const marker = [];
     const infoWindow = [];
   
     function setMarker(data) {
      
       // マーカー毎の処理
       for (var i = 0; i < data.length; i++) {
              markerLatLng = new google.maps.LatLng({lat: data[i]['customer']['lat'], lng: data[i]['customer']['lng']}); // 緯度経度のデータ作成
              marker[i] = new google.maps.Marker({ // マーカーの追加
               position: markerLatLng, // マーカーを立てる位置を指定
                  map: map // マーカーを立てる地図を指定
             });
       
           infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
               content: '<h5>'+ data[i]['customer']['name']+'</h5>' +
               '<div class="map"><a href="https://develop-sfa-70c2d1f59f9d.herokuapp.com/reports/'+ 
               data[i]['id'] +'">活動履歴</a></div>' // 吹き出しに表示する内容
             });
           markerEvent(i); // マーカーにクリックイベントを追加
       }
      }
       
      // マーカーにクリックイベントを追加
      function markerEvent(i) {
          marker[i].addListener('click', function() {// マーカーをクリックしたとき
            infoWindow[i].open(map, marker[i]);
            map.setZoom(15);
            map.setCenter(new google.maps.LatLng(markerLatLng)); 
        });
      }
   