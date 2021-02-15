function Invetex_googlemap_init(dom_obj, coords) {
    "use strict";
    if (typeof Invetex_STORAGE['googlemap_init_obj'] == 'undefined') Invetex_googlemap_init_styles();
    Invetex_STORAGE['googlemap_init_obj'].geocoder = '';
    try {
        var id = dom_obj.id;
        Invetex_STORAGE['googlemap_init_obj'][id] = {
            dom: dom_obj,
            markers: coords.markers,
            geocoder_request: false,
            opt: {
                zoom: coords.zoom,
                center: null,
                scrollwheel: false,
                scaleControl: false,
                disableDefaultUI: false,
                panControl: true,
                zoomControl: true, //zoom
                mapTypeControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                styles: Invetex_STORAGE['googlemap_styles'][coords.style ? coords.style : 'default'],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
        };

        Invetex_googlemap_create(id);

    } catch (e) {

        dcl(Invetex_STORAGE['strings']['googlemap_not_avail']);

    };
}

function Invetex_googlemap_create(id) {
    "use strict";

    // Create map
    Invetex_STORAGE['googlemap_init_obj'][id].map = new google.maps.Map(Invetex_STORAGE['googlemap_init_obj'][id].dom, Invetex_STORAGE['googlemap_init_obj'][id].opt);

    // Add markers
    for (var i in Invetex_STORAGE['googlemap_init_obj'][id].markers)
        Invetex_STORAGE['googlemap_init_obj'][id].markers[i].inited = false;
    Invetex_googlemap_add_markers(id);

    // Add resize listener
    jQuery(window).resize(function() {
		"use strict";
        if (Invetex_STORAGE['googlemap_init_obj'][id].map)
            Invetex_STORAGE['googlemap_init_obj'][id].map.setCenter(Invetex_STORAGE['googlemap_init_obj'][id].opt.center);
    });
}

function Invetex_googlemap_add_markers(id) {
    "use strict";
    for (var i in Invetex_STORAGE['googlemap_init_obj'][id].markers) {

        if (Invetex_STORAGE['googlemap_init_obj'][id].markers[i].inited) continue;

        if (Invetex_STORAGE['googlemap_init_obj'][id].markers[i].latlng == '') {

            if (Invetex_STORAGE['googlemap_init_obj'][id].geocoder_request !== false) continue;

            if (Invetex_STORAGE['googlemap_init_obj'].geocoder == '') Invetex_STORAGE['googlemap_init_obj'].geocoder = new google.maps.Geocoder();
            Invetex_STORAGE['googlemap_init_obj'][id].geocoder_request = i;
            Invetex_STORAGE['googlemap_init_obj'].geocoder.geocode({
                address: Invetex_STORAGE['googlemap_init_obj'][id].markers[i].address
            }, function(results, status) {
                "use strict";
                if (status == google.maps.GeocoderStatus.OK) {
                    var idx = Invetex_STORAGE['googlemap_init_obj'][id].geocoder_request;
                    if (results[0].geometry.location.lat && results[0].geometry.location.lng) {
                        Invetex_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = '' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng();
                    } else {
                        Invetex_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = results[0].geometry.location.toString().replace(/\(\)/g, '');
                    }
                    Invetex_STORAGE['googlemap_init_obj'][id].geocoder_request = false;
                    setTimeout(function() {
                        Invetex_googlemap_add_markers(id);
                    }, 200);
                } else
                    dcl(Invetex_STORAGE['strings']['geocode_error'] + ' ' + status);
            });

        } else {

            // Prepare marker object
            var latlngStr = Invetex_STORAGE['googlemap_init_obj'][id].markers[i].latlng.split(',');
            var markerInit = {
                map: Invetex_STORAGE['googlemap_init_obj'][id].map,
                position: new google.maps.LatLng(latlngStr[0], latlngStr[1]),
                clickable: Invetex_STORAGE['googlemap_init_obj'][id].markers[i].description != ''
            };
            if (Invetex_STORAGE['googlemap_init_obj'][id].markers[i].point) markerInit.icon = Invetex_STORAGE['googlemap_init_obj'][id].markers[i].point;
            if (Invetex_STORAGE['googlemap_init_obj'][id].markers[i].title) markerInit.title = Invetex_STORAGE['googlemap_init_obj'][id].markers[i].title;
            Invetex_STORAGE['googlemap_init_obj'][id].markers[i].marker = new google.maps.Marker(markerInit);

            // Set Map center
            if (Invetex_STORAGE['googlemap_init_obj'][id].opt.center == null) {
                Invetex_STORAGE['googlemap_init_obj'][id].opt.center = markerInit.position;
                Invetex_STORAGE['googlemap_init_obj'][id].map.setCenter(Invetex_STORAGE['googlemap_init_obj'][id].opt.center);
            }

            // Add description window
            if (Invetex_STORAGE['googlemap_init_obj'][id].markers[i].description != '') {
                Invetex_STORAGE['googlemap_init_obj'][id].markers[i].infowindow = new google.maps.InfoWindow({
                    content: Invetex_STORAGE['googlemap_init_obj'][id].markers[i].description
                });
                google.maps.event.addListener(Invetex_STORAGE['googlemap_init_obj'][id].markers[i].marker, "click", function(e) {
					"use strict";
                    var latlng = e.latLng.toString().replace("(", '').replace(")", "").replace(" ", "");
                    for (var i in Invetex_STORAGE['googlemap_init_obj'][id].markers) {
                        if (latlng == Invetex_STORAGE['googlemap_init_obj'][id].markers[i].latlng) {
                            Invetex_STORAGE['googlemap_init_obj'][id].markers[i].infowindow.open(
                                Invetex_STORAGE['googlemap_init_obj'][id].map,
                                Invetex_STORAGE['googlemap_init_obj'][id].markers[i].marker
                            );
                            break;
                        }
                    }
                });
            }

            Invetex_STORAGE['googlemap_init_obj'][id].markers[i].inited = true;
        }
    }
}

function Invetex_googlemap_refresh() {
    "use strict";
    for (id in Invetex_STORAGE['googlemap_init_obj']) {
        Invetex_googlemap_create(id);
    }
}

function Invetex_googlemap_init_styles() {
	"use strict";
    // Init Google map
    Invetex_STORAGE['googlemap_init_obj'] = {};
    Invetex_STORAGE['googlemap_styles'] = {
        'default': []
    };
    if (window.Invetex_theme_googlemap_styles !== undefined)
        Invetex_STORAGE['googlemap_styles'] = Invetex_theme_googlemap_styles(Invetex_STORAGE['googlemap_styles']);
}