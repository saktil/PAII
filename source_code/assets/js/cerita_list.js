var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var lokasi = url.searchParams.get("lokasi");

var list_cerita=[];
var list_recommended_event=[];
var list_recommended_wisata=[];

for(var i=0;i<mapData.length;i++){
	if(lokasi=="all"){
		if((mapData[i]['category']=="Cerita") ){
			list_cerita.push(mapData[i]);
		}
		if((mapData[i]['category']=="Pariwisata") ){
			list_recommended_wisata.push(mapData[i]);
		}
		if((mapData[i]['category']=="Event") ){
			list_recommended_event.push(mapData[i]);
		}
	}else{
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Cerita") ){
			list_cerita.push(mapData[i]);
		}
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Pariwisata") ){
			list_recommended_wisata.push(mapData[i]);
		}
		if((mapData[i]['city']==lokasi) && (mapData[i]['category']=="Event") ){
			list_recommended_event.push(mapData[i]);
		}
		
	}
}


var content_list="";
var content_recomended_event="";
var content_recomended_wisata="";

for(var i=0;i<list_cerita.length;i++){
	content_list += '<article class="blog-post"><a href="'+list_cerita[i]['url']+'"><img src="'+list_cerita[i]['gallery'][0]+'" alt=""></a><header><a href="'+list_cerita[i]['url']+'"><h2>'+list_cerita[i]['title']+'</h2></a></header>'+
                           '<figure class="meta"><a href="#" class="link icon"><i class="fa fa-map-marker"></i>'+list_cerita[i]['location']+'</a><a href="#" class="link icon"><i class="fa fa-user"></i>10 Komentar</a>'+
                                '<div class="tags"><a href="#" class="tag article">Cerita</a><a href="#" class="tag article">Daerah</a></div>'+
                            '</figure><p>'+list_cerita[i]['description']+' </p><a href="'+list_cerita[i]['url']+'" class="btn btn-rounded btn-primary btn-framed btn-small">Baca Selengkapnya</a></article>';
}

for(var i=0;i<list_recommended_event.length;i++){
	content_recomended_event += '<div class="item" data-id="'+list_recommended_event[i]['id']+'"><a href="'+list_recommended_event[i]['url']+'"><div class="description"><div class="label label-default">'+list_recommended_event[i]['category']+'</div><h3>'+list_recommended_event[i]['title']+'</h3><h4>'+list_recommended_event[i]['location']+'</h4></div><div class="image bg-transfer"><img src="'+list_recommended_event[i]['gallery'][0]+'" alt=""></div></a></div>';
}

for(var i=0;i<list_recommended_wisata.length;i++){
	content_recomended_wisata += '<div class="item" data-id="'+list_recommended_wisata[i]['id']+'"><a href="'+list_recommended_wisata[i]['url']+'"><div class="description"><div class="label label-default">'+list_recommended_wisata[i]['category']+'</div><h3>'+list_recommended_wisata[i]['title']+'</h3><h4>'+list_recommended_wisata[i]['location']+'</h4></div><div class="image bg-transfer"><img src="'+list_recommended_wisata[i]['gallery'][0]+'" alt=""></div></a></div>';
}

$("#content_list").html(content_list);
$("#content_recomended_event").html(content_recomended_event);
$("#content_recomended_wisata").html(content_recomended_wisata);

 $("#ganti_lokasi").click(function(){
	 window.location.href = "cerita_list.html?lokasi="+$("#location").val();
}); 