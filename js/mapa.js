/**
 * Referências: 
 * http://blog.thulioph.com/post/72436969224/api-google-maps-v3
 * https://developers.google.com/maps/documentation/javascript/tutorial?hl=pt-br
 **/

function initialize() {

	// Exibir mapa;
	var myLatlng   = new google.maps.LatLng(-20.315950, -40.293235);
	var mapOptions = {
		zoom: 17,
		draggable: false,
		scrollwheel: false,
		center: myLatlng,
		panControl: true, 							// false  (controle panorâmico);
		zoomControl: true, 							// false  (controle de zoom);
		mapTypeControl: true, 						// false  (controle do tipo de mapa);
		scaleControl: true, 						// false  (controle de escala);
		streetViewControl: true, 					// false  (controle do street view);
		overviewMapControl: true, 					// false  (controle de visão geral do mapa);
		disableDefaultUI: false, 					// true   (desabilita os controles)
		mapTypeId: google.maps.MapTypeId.ROADMAP 	// opções (SATELLITE - HYBRID - TERRAIN)
	}

	// Parâmetros do texto que será exibido no clique;
  	var contentString = '<h3 style="width: 200px; text-align: center;">Perenzin, Porto e Amorim</h3>';
  	var infowindow = new google.maps.InfoWindow({
      	content: contentString,
      	maxWidth: 700
  	});

	// Exibir o mapa na div #mapa;
	var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

	// Marcador personalizado;
	var image = 'data:image/png;base64,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';
	var marcadorPersonalizado = new google.maps.Marker({
		position: myLatlng,
		map: map,
		icon: image,
		title: 'Vitória - ES',
		animation: google.maps.Animation.DROP // BOUNCE 
	});

	// Exibir texto ao clicar no pin;
	google.maps.event.addListener(marcadorPersonalizado, 'click', function() {
  		infowindow.open(map,marcadorPersonalizado);
	});

	// Estilizando o mapa;
	// Criando um array com os estilos
	var styles = [
		{
			stylers: [
				{ hue: "#41a7d5" },
				{ saturation: 0 },
				{ lightness: 0 },
				{ gamma: 0 }
			]
		},
		{
			featureType: "road",
			elementType: "geometry.stroke", // opções: geometry.fill(seleciona apenas o preenchimento da geometria) geometry.stroke(seleciona apenas a textura da geometria), labels(seleciona apenas rótulos textuais), labels.icon(seleciona apenas o ícone do rótulo), labels.text(seleciona apenas o texto do rótulo), labels.text.fill(seleciona apenas o preenchimento do rótulo), labels.text.stroke(seleciona apenas a textura do texto);
			stylers: [
				{ lightness: 100 },
				{ visibility: "simplified" }
			]
		},
		{
			featureType: "road",
			elementType: "labels"
		}
	];

	// crio um objeto passando o array de estilos (styles) e definindo um nome para ele;
	var styledMap = new google.maps.StyledMapType(styles, {
		name: "Mapa Style"
	});

	// Aplicando as configurações do mapa
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');

}

// Função para carregamento assíncrono
function loadScript() {
	var script  = document.createElement("script");
	script.type = "text/javascript";
	script.src  = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBx0rAX8w87Ii7hBMItVnyXmcVP23w5dQw&sensor=true&callback=initialize";

	document.body.appendChild(script);
}

window.onload = loadScript;