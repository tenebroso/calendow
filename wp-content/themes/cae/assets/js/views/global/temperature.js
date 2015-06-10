var CE = CE || {};

;(function() {

  CE.temperature = function() {

  $.simpleWeather({
    location: 'Boyle Heights, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#bh").html(html);
    },
    error: function(error) {
      $("#bh").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'City Heights, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#ch").html(html);
    },
    error: function(error) {
      $("#ch").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Coachella Valley, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#cv").html(html);
    },
    error: function(error) {
      $("#cv").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Del Norte, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#dnatl").html(html);
    },
    error: function(error) {
      $("#dnatl").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Oakland, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#oak").html(html);
    },
    error: function(error) {
      $("#oak").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'East Salinas, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sns").html(html);
    },
    error: function(error) {
      $("#sns").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Fresno, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#fno").html(html);
    },
    error: function(error) {
      $("#fno").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Long Beach, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#lb").html(html);
    },
    error: function(error) {
      $("#lb").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Merced, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#mcd").html(html);
    },
    error: function(error) {
      $("#mcd").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Richmond, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#rmd").html(html);
    },
    error: function(error) {
      $("#rmd").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Sacramento, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sac").html(html);
    },
    error: function(error) {
      $("#sac").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Santa Ana, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sna").html(html);
    },
    error: function(error) {
      $("#sna").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'South Kern, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#krn").html(html);
    },
    error: function(error) {
      $("#krn").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'South Los Angeles, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#sla").html(html);
    },
    error: function(error) {
      $("#sla").html('78&deg;');
    }
  });

  $.simpleWeather({
    location: 'Tribal Lands, CA',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = weather.temp+'&deg;';
      $("#tbl").html(html);
    },
    error: function(error) {
      $("#tbl").html('78&deg;');
    }
  });

};


})();