
document.addEventListener('DOMContentLoaded',function() {

var pageCounter = 1;
var animalContainer = document.getElementById("set");
var btn = document.getElementById("btn");
var data;

  var themeName = 'sk-rect';
    HoldOn.open({
      theme:themeName,
      message:"<h4>Loading....</h4>"
    });

  var time = Date.now();
  var rand = Math.floor((Math.random() * 10000) + 1);
  var encode = rand + "/contest.hacks?apiKey=df87fc998d9555f10366371f672dc2969d3a21cc&contestId=566&time=" + time + "#c0cf9850388822875c2c0030312dc7bd698f054e";

  var shaObj = new jsSHA("SHA-512", "TEXT");
  shaObj.update(encode);
  var hash = shaObj.getHash("HEX");
  var url = "http://codeforces.com/api/problemset.problems?tags=implementation&api=df87fc998d9555f10366371f672dc2969d3a21cc&time=" + time + "&apiSig="+ rand + hash;
  var demo = 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json';

  var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', url);
  ourRequest.onload = function() {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
      var ourData = JSON.parse(ourRequest.responseText);
      HoldOn.close();
      data = ourData;
      renderHTML(ourData);
    } else {
      console.log("We connected to the server, but it returned an error.");
    }

  };

  ourRequest.onerror = function() {
    console.log("Connection error");
  };

  ourRequest.send();
  pageCounter++;
  if (pageCounter > 3) {
    btn.classList.add("hide-me");
  }

  btn.addEventListener("click", function() {

    var num = document.getElementById('num').value;
    var type = document.getElementById('type').value;
    var tags = document.getElementById('tags').value;

    document.getElementById('set').innerHTML='';

    var length = parseInt(num);
    var types = parseInt(type);

    var html = '';
    var count = 0;
    var count2 = 0;

    if(length == 0)
    {
      length = data['result'].problems.length;
    }

    for (i = 0; i < data['result'].problems.length; i++) {

      if(tags === data['result'].problems[i].tags[0] && count <= length ) {

          html += "<tr>";
          html += "<td>" + count + "</td>";
          html += "<td>" + data['result'].problems[i].contestId + "</td>";
          html += "<td>" + data['result'].problems[i].name + "</td>";
          html += "<td>" + data['result'].problemStatistics[i].solvedCount + "</td>";
          html += "<td>" + data['result'].problems[i].tags[0] + "</td>";
          html += '<td><a href="http://codeforces.com/problemset/problem/'+ data['result'].problems[i].contestId + '/' + data['result'].problems[i].index + '" target="_blank">Solve</a></td>';
          html += '</tr>';
          count++;
        }

        if( tags == 0 && count2 <= length ) {

            html += "<tr>";
            html += "<td>" + count2 + "</td>";
            html += "<td>" + data['result'].problems[i].contestId + "</td>";
            html += "<td>" + data['result'].problems[i].name + "</td>";
            html += "<td>" + data['result'].problemStatistics[i].solvedCount + "</td>";
            html += "<td>" + data['result'].problems[i].tags[0] + "</td>";
            html += '<td><a href="http://codeforces.com/problemset/problem/'+ data['result'].problems[i].contestId + '/' + data['result'].problems[i].index + '" target="_blank">Solve</a></td>';
            count2++;
            html += '</tr>';
          }
  }

    if(html!='')  {
    animalContainer.insertAdjacentHTML('beforeend', html);
  }

});

function renderHTML(data) {
  var htmlString = '';
  for (i = 0; i < data['result'].problems.length; i++) {

    htmlString += "<tr>";
    htmlString += "<td>" + i + "</td>";
    htmlString += "<td>" + data['result'].problems[i].contestId + "</td>";
    htmlString += "<td>" + data['result'].problems[i].name + "</td>";
    htmlString += "<td>" + data['result'].problemStatistics[i].solvedCount + "</td>";
    htmlString += "<td>" + data['result'].problems[i].tags[0] + "</td>";
    htmlString += '<td><a href="http://codeforces.com/problemset/problem/'+ data['result'].problems[i].contestId + '/' + data['result'].problems[i].index + '" target="_blank">Solve</a></td>';
    htmlString += '</tr>';

  }
  animalContainer.insertAdjacentHTML('beforeend', htmlString);
}

});
