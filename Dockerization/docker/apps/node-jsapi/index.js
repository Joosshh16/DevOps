const express = require('express')
const app = express()
const port = 3000

const logger = (data) => {
  console.log("[INFO]: ", new Date(), data)
}

app.get('/health', (req, res) => {
  logger("/health : " + JSON.stringify(req.headers))
  res.json({ status: 'healthy' });
})

app.get('/info', (req, res) => {
  logger("/info : " + JSON.stringify(req.headers))
  res.json({ language: 'js', version: process.env.NODE_VERSION, host: process.env.HOSTNAME });
})

app.get('/', (req, res) => {
  logger("/ : " + JSON.stringify(req.headers))
  res.send('Hello, from ' + (process.env.HOSTNAME ? process.env.HOSTNAME : "NodeJS") + " !")
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})