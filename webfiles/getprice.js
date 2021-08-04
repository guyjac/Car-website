var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "gj17980",
  password: "IxlCmG9Nh2T5O",
  database: "ce29x_gj17980"
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM car_colours", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});					