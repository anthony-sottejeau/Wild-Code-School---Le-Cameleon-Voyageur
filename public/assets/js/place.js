$(document).ready(function($){

    //Map definition
    var mymap = L.map('map').setView([47.89339675,1.8941864],13);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    //pins definition
    var variableHolder = {};
    $('.marker').each(function (){  //for each adress
        if ($(this).attr('data') != ''){  //if coordinates are set
            coordonees = $(this).attr('data').split(',');
            day = $(this).attr('id').substr(0,$(this).attr('id').indexOf('_'));
            hour = $(this).attr('id').substr($(this).attr('id').indexOf('_')+1);

            //setting marker
            variableHolder["marker-"+$(this).attr('id')] = L.marker([coordonees[0],coordonees[1]]).addTo(mymap);

            //setting pin popup
            variableHolder["marker-"+$(this).attr('id')].bindPopup("<h5>" + day + ' ' + hour + "</h5>" + $(this).html());
        }});
    });


