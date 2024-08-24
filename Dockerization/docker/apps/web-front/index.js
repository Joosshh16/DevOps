const fetch = require('node-fetch');
const express = require('express');
const app = express();

// set the view engine to ejs
app.set('view engine', 'ejs');
app.use(express.static("public"))

// about page
app.get('/about', function(req, res) {
  res.render('pages/about');
});

// index
app.get('/', async(req, res) => {
  let queryLanguage = req.query.language || null
  let jsPIEndpoint = process.env.JS_API_ENDPOINT || "http://localhost:3000/info"
  let pythonAPIEndpoint = process.env.PYTHON_API_ENDPOINT || "http://localhost:3001/info"
  let endpoint = queryLanguage == "js" ? jsPIEndpoint : pythonAPIEndpoint

  let jsonResult = {}
  try {
      const response = await fetch(endpoint)
      jsonResult = await response.json()
      console.log(jsonResult);
    } catch (error) {
      console.log(error);
    }
    await res.render('pages/home', {
      data: jsonResult
  });
});

app.listen(3002);
console.log('Server is listening on port 3002');