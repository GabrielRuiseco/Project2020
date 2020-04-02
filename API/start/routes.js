'use strict'

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Http routes are entry points to your web application. You can create
| routes for different URL's and bind Controller actions to them.
|
| A complete guide on routing is available here.
| http://adonisjs.com/docs/4.1/routing
|
*/

/** @type {typeof import('@adonisjs/framework/src/Route/Manager')} */
const Route = use('Route')

Route.on('/').render('welcome')

//user
Route.get('user', 'UserController.index').middleware(['auth'])
Route.get('user/show', 'UserController.show').middleware(['auth','findUser']);
Route.post('user', 'UserController.create');
Route.patch('user/update', 'UserController.update').middleware(['auth','findUser']);
Route.delete('user/delete', 'UserController.delete').middleware(['auth','findUser']);


//token
Route.get('token', 'TokenController.index').middleware(['auth']);
Route.get('token/show', 'TokenController.show').middleware(['auth','findToken']);
Route.post('token', 'TokenController.create');
Route.patch('token/update', 'TokenController.update').middleware(['auth','findToken']);
Route.delete('token/delete', 'TokenController.delete').middleware(['auth','findToken']);

//feed
Route.get('Servo/On', 'FeedController.servoOnOff').middleware(['auth']);
Route.get('Stepmotor/move', 'FeedController.moveStepmotor').middleware(['auth']);
Route.get('level/Read', 'FeedController.readLevel').middleware(['auth']);
Route.get('Presence/Read', 'FeedController.readPresence').middleware(['auth']);
