var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var id = url.searchParams.get("id");
var detail = mapData[id-1];


if (detail === undefined || detail === null) {
     window.location.href = "404.html";
}

var _latitude = detail['latitude'];
var _longitude = detail['longitude'];

var top_title='<h1>'+detail['title']+'</h1><div class="rating-passive" data-rating="'+detail['rating']+'"></div>';
var image_detail="";
var review_detail="";
var features_detail="";
var recommendation_detail="";

for(var i=0;i<detail['gallery'].length;i++){
	image_detail += '<div class="image"><div class="bg-transfer"><img src="'+detail['gallery'][i]+'" alt=""></div></div>';
}

for(var i=0;i<detail['reviews'].length;i++){
	review_detail += '<div class="review"><div class="image"><div class="bg-transfer"><img src="'+detail['reviews'][i]['author_image']+'" alt=""></div></div>'+
                            '<div class="description"><figure><div class="rating-passive" data-rating="'+detail['reviews'][i]['rating']+'"><span class="stars"></span><span class="reviews">'+detail['reviews'].length+'</span></div><span class="date">'+detail['reviews'][i]['date']+'</span></figure>'+
                                '<p>'+detail['reviews'][i]['review_text']+'</p></div></div>';
}

for(var i=0;i<detail['tags'].length;i++){
	features_detail += '<li>'+detail['tags'][i]+'</li>';
}

$("#top_title").html(top_title);
$("#image_detail").html(image_detail);
$("#main_content").html(detail['content']);
$("#review_detail").html(review_detail);
$("#features_detail").html('<h2>Features</h2><ul class="tags">'+features_detail+'</ul>');
$("#address_detail").html('<figure><i class="fa fa-map-marker"></i>'+detail['address']+'</figure>');
$("#rating_detail").html('Rating '+detail['rating']+' berdasarkan '+detail['reviews'].length+' review');

rating(".visitor-rating");
var element = "map-detail";
simpleMap(_latitude,_longitude, element);

var others_recommend=[];
for(var i=0;i<mapData.length;i++){
	if((mapData[i]['city']==detail['city']) && (mapData[i]['category']==detail['category']) ){
		others_recommend.push(mapData[i]);
	}
}


for(var i=0;i<others_recommend.length;i++){
	recommendation_detail += '<div class="col-md-4 col-sm-4"><div class="item" data-id="'+others_recommend[i]["id"]+'"><a href="'+others_recommend[i]["url"]+'"><div class="description"><div class="label label-default">'+others_recommend[i]["category"]+'</div><h3>'+others_recommend[i]["title"]+'</h3><h4>'+others_recommend[i]["location"]+'</h4></div>'+
                                    '<div class="image bg-transfer" style="background-image: url(&quot;assets/img/items/1.jpg&quot;);"><img src="'+others_recommend[i]["gallery"][0]+'" alt=""></div></a>'+
                                        '<div class="additional-info"><div class="rating-passive" data-rating="'+others_recommend[i]["rating"]+'"><span class="stars"></span>'+
                                                '<span class="reviews">'+others_recommend[i]["reviews_number"]+'</span></div>  </div> </div></div>';
}


$("#recommendation_detail").html(recommendation_detail);