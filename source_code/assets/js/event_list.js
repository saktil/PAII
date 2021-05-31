var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var lokasi = url.searchParams.get("lokasi");

var list_wisata=[];
var list_recommended_event=[];
var list_recommended_cerita=[];

for(var i=0;i<mapData.length;i++){
	if(lokasi=="all"){
		if((mapData[i]['category']=="Event") ){
			list_wisata.push(mapData[i]);
		}
		if((mapData[i]['category']=="Cerita") ){
			list_recommended_cerita.push(mapData[i]);
		}
		if((mapData[i]['category']=="Pariwisata") ){
			list_recommended_event.push(mapData[i]);
		}
	}else{
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Event") ){
			list_wisata.push(mapData[i]);
		}
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Cerita") ){
			list_recommended_cerita.push(mapData[i]);
		}
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Pariwisata") ){
			list_recommended_event.push(mapData[i]);
		}
	}
}


var content_list="";
var content_recomended_event="";
var content_recomended_cerita="";

for(var i=0;i<list_wisata.length;i++){
	content_list +=	'<div class="item item-row" data-id="'+list_wisata[i]['id']+'" data-latitude="'+list_wisata[i]['latitude']+'" data-longitude="'+list_wisata[i]['longitude']+'"><a href="'+list_wisata[i]['url']+'"><div class="image bg-transfer"><img src="'+list_wisata[i]['gallery'][0]+'" alt=""></div>'+
                    '<div class="map"></div><div class="description"><h3>'+list_wisata[i]['title']+'</h3><h4>'+list_wisata[i]['location']+'</h4><div class="label label-default">'+list_wisata[i]['category']+'</div></div>'+
                    '<div class="additional-info"><div class="rating-passive" data-rating="'+list_wisata[i]['rating']+'"><span class="stars"></span><span class="reviews">'+list_wisata[i]['reviews_number']+'</span></div></div> </a></div>';
}

for(var i=0;i<list_recommended_event.length;i++){
	content_recomended_event += '<div class="item" data-id="'+list_recommended_event[i]['id']+'"><a href="'+list_recommended_event[i]['url']+'"><div class="description"><div class="label label-default">'+list_recommended_event[i]['category']+'</div><h3>'+list_recommended_event[i]['title']+'</h3><h4>'+list_recommended_event[i]['location']+'</h4></div><div class="image bg-transfer"><img src="'+list_recommended_event[i]['gallery'][0]+'" alt=""></div></a></div>';
}

for(var i=0;i<list_recommended_cerita.length;i++){
	content_recomended_cerita += '<div class="item" data-id="'+list_recommended_cerita[i]['id']+'"><a href="'+list_recommended_cerita[i]['url']+'"><div class="description"><div class="label label-default">'+list_recommended_cerita[i]['category']+'</div><h3>'+list_recommended_cerita[i]['title']+'</h3><h4>'+list_recommended_cerita[i]['location']+'</h4></div><div class="image bg-transfer"><img src="'+list_recommended_cerita[i]['gallery'][0]+'" alt=""></div></a></div>';
}

$("#content_list").html(content_list);
$("#content_recomended_event").html(content_recomended_event);
$("#content_recomended_cerita").html(content_recomended_cerita);

 $("#ganti_lokasi").click(function(){
	 window.location.href = "event_list.html?lokasi="+$("#location").val();
}); 