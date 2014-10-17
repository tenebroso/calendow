var CE = CE || {};

;(function() {

  CE.temperature = function() {

    $.simpleWeather({
      location: 'Boyle Heights, CA',
      woeid: '',
      unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#weather-boyle-heights").html(html);
    },
    error: function(error) {
      $("#weather-boyle-heights").html('<p>'+error+'</p>');
    }

  });

  };


})();