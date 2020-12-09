var timeoutFunction;
var lastPlayedTime = 0;
getLastPlayedTime();
// var vidurl = document.getElementById("player1").src;
// document.getElementById("player1").src = vidurl + '#t=2m5s';
var supposedCurrentTime = lastPlayedTime;
console.log(supposedCurrentTime)
var canSeek = false;
var iframe = document.querySelector('#player1');
var player = new Vimeo.Player(iframe, {
  autoplay: true,
  muted: true
});


player.on('play', function() {
  console.log('play');
  startTimePersistPolling();
});

player.on('pause', function() {
  console.log('pause');
  stopPolling();
  timePersistOnPause();
});

player.on('ended', function(data) {
  console.log("end");
  stopPolling();

  getPlayed().then(function(totalPlayed) {
    var playedWithOffset = totalPlayed + 10;

    if (playedWithOffset < data.duration) {
      return // end event occured from seeking to it.
      // Don't consider the video as "completed and let it auto seek back
    }
    console.log('can seek now');
    canSeek = true;
    supposedCurrentTime = 0; // reset state in order to allow for rewind
    timePersistOnPause();
  })
});

function log(value) {
  document.getElementById('console').innerHTML += value + '<br>'
  console.log(value);
}

var video = document.getElementById('video');

player.on('timeupdate', function(data) {
  document.getElementById('player-currenttime').innerText = data.seconds;
  getPlayed().then(function(data) {
    document.getElementById('player-played').innerText = data;
  })
  if (canSeek) {
    return
  }
  player.getSeeking().then(function(seeking) {
    // seeking = whether the player is seeking or not
    if (!seeking) {
      supposedCurrentTime = data.seconds;
    }
  })
});
// prevent user from seeking
player.on('seeking', function(data) {
  stopPolling();
  // NB: Uncomment to see the played ranges
  // logPlayedRange();
  if (canSeek) {
    return
  }
  // ?? NB: pause first if the position is near the end,
  // Because in fullscreen it can still continue to the end sometimes
  if (data.duration - data.seconds < 10) {
    player.pause()
  }
  // accept rewind
  if (data.seconds < supposedCurrentTime) {
    return
  }
  // accept seek to already played time
  isPlayed(data.seconds).then(function(played) {
    if (played) {
      return
    }
    // guard agains infinite recursion:
  // user seeks, seeking is fired, currentTime is modified, seeking is fired, current time is modified, ...
  var delta = data.seconds - supposedCurrentTime;
  if (Math.abs(delta) > 0.01) {
    console.log("Seeking is disabled");
    player.setCurrentTime(supposedCurrentTime).then(function(seconds) {
      // seconds = the actual time
    })
  }
  })
});

function isPlayed(time) {
  return player.getPlayed().then(function(played) {
    for (var i = 0; i < played.length; i++) {
      var start = 0, end = 0;
      start = played[i][0];
      end = played[i][1];
      if (end - start < 1) {
        continue;
      }
      if (time >= start && time <= end) {
        return true;
      }
    }
    return false;
  })
}

function logPlayedRange() {
  player.getPlayed().then(function(played) {
    for (var i = 0; i < played.length; i++) {
      console.log(i, 'start:', played[i][0], 'end:', played[i][1]);
    }
  })
}


function getPlayed() {
  return player.getPlayed().then(function(played) {
      // played = array values of the played video time ranges.
      var result = 0;
      for (var i = 0; i < played.length; i++) {
        result += played[i][1] - played[i][0];
      }
      return result
  })
}


function startTimePersistPolling() {
  getPlayed().then(function(data) {
    var videoID = document.getElementById("player1").src;
    $.ajax({
              async: true,
              url: "running.php?playedTime=" + data + "&videoId=" + videoID,
              type: "GET",
              success: function(result) {
                console.log(result);
                timeoutFunction = setTimeout(startTimePersistPolling, 30000);
              }
    });
  });

}

function timePersistOnPause() {
  getPlayed().then(function(data) {
    var videoID = document.getElementById("player1").src;
    $.ajax({
              async: true,
              url: "running.php?playedTime=" + data + "&videoId=" + videoID,
              type: "GET",
              success: function(result) {
                console.log(result);
              }
    });
  });

}

function stopPolling() {
  if(typeof(timeoutFunction) != "undefined") {
    clearTimeout(timeoutFunction);
  }

}


function getLastPlayedTime() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var line = this.responseText;
      var myarray = line.split(' ');
      document.getElementById('player-played').innerText = myarray[0];
      document.getElementById('player-currenttime').innerText = myarray[0];
      lastPlayedTime = myarray[0];
    }
  };
  xhttp.open("GET", "newfile.txt", true);
  xhttp.send();

}

