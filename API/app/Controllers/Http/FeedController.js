'use strict'
let rp = require('request-promise');

/** @typedef {import('@adonisjs/framework/src/Request')} Request */
/** @typedef {import('@adonisjs/framework/src/Response')} Response */

/** @typedef {import('@adonisjs/framework/src/View')} View */

/**
 * Resourceful controller for interacting with feeds
 */
class FeedController {

  async servoOnOff(params) {
    const state=params;
    let options = {
      method:'POST',
      uri: 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.servofeed/data',
      headers: {
        'User-Agent': 'Request-Promise',
        'X-AIO-Key': 'aio_HmLc12I257sUDLxLlHHWV9SLYavr'
      },
      body:{
        "datum":{"value":{state}}
      }
    };

    await rp(options)
      .then(function (response) {
          return "Servo "+{state};
      })
      .catch(function (err) {
        return "Error";
      });
  }


  async moveStepmotor(params) {
    const data=params;
    let options = {
      method:'POST',
      uri: 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.stepmotorfeed/data',

      headers: {
        'User-Agent': 'Request-Promise',
        'X-AIO-Key': 'aio_HmLc12I257sUDLxLlHHWV9SLYavr'
      },
      body:{
        "datum":{"value":{data}}
      }
    };

    await rp(options)
      .then(function (response) {
        return "Pasos: "+{data};
      })
      .catch(function (err) {
        return "Error";
      });
  }

  async readLevel() {
    let options = {
      method:'GET',
      uri: 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.levelfeed/data',

      headers: {
        'User-Agent': 'Request-Promise',
        'X-AIO-Key': 'aio_HmLc12I257sUDLxLlHHWV9SLYavr'
      },
      json: true
    };

    await rp(options)
      .then(function (response) {
        return response;
      })
      .catch(function (err) {
        return "Error";
      });
  }

  async readPresence() {
    let options = {
      method:'GET',
      uri: 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.presencefeed/data',

      headers: {
        'User-Agent': 'Request-Promise',
        'X-AIO-Key': 'aio_HmLc12I257sUDLxLlHHWV9SLYavr'
      },
      json: true
    };

    await rp(options)
      .then(function (response) {
        return response;
      })
      .catch(function (err) {
        return "Error";
      });
  }

}

module.exports = FeedController
