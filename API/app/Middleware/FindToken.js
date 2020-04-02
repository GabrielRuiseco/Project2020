'use strict'
const Token = use('App/Models/Token')
/** @typedef {import('@adonisjs/framework/src/Request')} Request */
/** @typedef {import('@adonisjs/framework/src/Response')} Response */
/** @typedef {import('@adonisjs/framework/src/View')} View */

class FindToken {
  /**
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Function} next
   */
  async handle ({ request, response }, next) {
    const id=request.body.id;
    const token = await

    request.body.token = token
    // call next to advance the request
    await next()
  }
}

module.exports = FindToken
