'use strict'

/** @typedef {import('@adonisjs/framework/src/Request')} Request */
/** @typedef {import('@adonisjs/framework/src/Response')} Response */

/** @typedef {import('@adonisjs/framework/src/View')} View */

/**
 * Resourceful controller for interacting with tokens
 */
class TokenController {
  /**
   * Show a list of all tokens.
   * GET tokens
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   * @param {View} ctx.view
   */
  async index({request, response}) {
    const token = await Token.all()
    response.status(200).json({
      message: 'Here are your Tokens.',
      data: token
    })
  }

  /**
   * Render a form to be used for creating a new token.
   * GET tokens/create
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   * @param {View} ctx.view
   */
  async create({request, response, view}) {
    const {user_id, token, type} = request.post();
    const ntoken = await Token.create({user_id, token, type});
    response.status(201).json({
      message: 'succesfully created a new token',
      data: token
    })
  }

  /**
   * Display a single token.
   * GET tokens/:id
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   * @param {View} ctx.view
   */
  async show({params, request, response, view}) {
    response.status(200).json({
      message: 'Here is your token.',
      data: request.post().token
    })
  }

  /**
   * Render a form to update an existing token.
   * GET tokens/:id/edit
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   * @param {View} ctx.view
   */
  async edit({params, request, response, view}) {
  }

  /**
   * Update token details.
   * PUT or PATCH tokens/:id
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   */
  async update({request, response}) {
    const {name} = request.post()
    await token.save()
    response.status(200).json({
      message: 'Successfully updated this user.',
      data: token
    })
  }

  /**
   * Delete a token with id.
   * DELETE tokens/:id
   *
   * @param {object} ctx
   * @param {Request} ctx.request
   * @param {Response} ctx.response
   */
  async delete({request, response, params: {id}}) {
    const token = request.post().token
    await token.delete()
    response.status(200).json({
      message: 'Successfully deleted this token.',
      id
    })
  }
}

module.exports = TokenController
