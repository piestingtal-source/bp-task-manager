<?php
/**
 * This file is part of the PSourceProjektManager WordPress Plugin package.
 *
 * (c) Joseph G. <joseph@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package PSourceProjektManager\PSourceProjektManagerTransactions
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

$task_id = (int) filter_input( INPUT_POST, 'task_id', FILTER_VALIDATE_INT );
$user_id = (int) filter_input( INPUT_POST, 'user_id', FILTER_VALIDATE_INT );

$args = array(
	'message' => 'success',
	'task_id' => 0,
);

$task = PSourceProjektManagerTasksController::get_instance();

$task_id = $task->completeTask( $task_id, $user_id );

if ( $task_id ) {

	$args['message'] = 'success';
	$args['task_id'] = $task_id;

} else {

	$args['message'] = 'fail';

}

$this->task_breaker_api_message( $args );
