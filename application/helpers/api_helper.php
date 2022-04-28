<?php

function send_response($response, $status_code = 200, $numeric_check = FALSE) {
	$flags = $numeric_check ? JSON_NUMERIC_CHECK : 0;

	http_response_code($status_code);
	header('Content-Type: application/json');
	echo json_encode($response, $flags);
	exit;
} 

function send_success_response($payload = FALSE, $numeric_check = FALSE) {         
	$response['success'] = TRUE;

	if ($payload !== FALSE) {
		$response['data'] = $payload;
	}

	send_response($response, 200, $numeric_check);
} 

function send_unprocessable_entity($message = FALSE) {
	$response['success'] = FALSE;
	$response['error'] = 'Unprocessable Entity';
	
	if ($message !== FALSE) {
		$response['message'] = $message;
	}

	send_response($response, 422);
}

function send_internal_server_error($message = FALSE) {
	$response['success'] = FALSE;
	$response['error']   = 'Something went wrong.';

	if ($message !== FALSE) {
		$response['error'] = $message;
	}

	send_response($response, 500);
}

function send_bad_request_response($message)
{
	$response['success'] = FALSE;
	$response['error'] = $message;

	send_response($response, 400);
}

function send_unauthorized_response()
{
	send_response('Unauthorized.', 401);
}

function send_forbidden_response()
{
	send_response('Access Forbidden.', 403);
}

function get_request_body()
{
	$ci =& get_instance();

	return json_decode($ci->security->xss_clean($ci->input->raw_input_stream), TRUE);
}
