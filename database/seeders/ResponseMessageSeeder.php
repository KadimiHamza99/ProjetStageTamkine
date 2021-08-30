<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResponseMessage;

class ResponseMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResponseMessage::query()->delete();
        $Response = [[
            'id' => 0,
            'name' => 'invalid URL',
            'signification' => 'This URL does not exist',
        ],[
            'id' => 100,
            'name' => 'Continue',
            'signification' => 'Informational',
        ],[
            'id' => 101,
            'name' => 'Switching Protocols',
            'signification' =>'Informational',
        ],[
            'id' => 200,
            'name' => 'OK',
            'signification' => 'Successful',
        ],[
            'id' => 201,
            'name' => 'Created',
            'signification' => 'Successful',
        ],[
            'id' => 202,
            'name' => 'Accepted',
            'signification' => 'Successful',
        ],[
            'id' => 203,
            'name' => 'Non-Authoritative Information',
            'signification' => 'Successful',
        ],[
            'id' => 505,
            'name' => 'HTTP Version Not Supported',
            'signification' => 'Server Error',
        ],[
            'id' => 504,
            'name' => 'Gateway Timeout',
            'signification' => 'Server Error',
        ],[
            'id' => 502,
            'name' => 'Bad Gateway',
            'signification' => 'Server Error',
        ],[
            'id' => 503,
            'name' => 'Service Unavailable',
            'signification' => 'Server Error',
        ],[
            'id' => 500,
            'name' => 'Internal Server Error',
            'signification' => 'Server Error',
        ],[
            'id' => 300,
            'name' => 'Multiple Choices',
            'signification' => 'Redirection',
        ],[
            'id' => 501,
            'name' => 'Not Implemented',
            'signification' => 'Server Error',
        ],[
            'id' => 412,
            'name' => 'Precondition Failed',
            'signification' => 'Client Error',
        ],[
            'id' => 206,
            'name' => 'Partial Content',
            'signification' => 'Successful',
        ],[
            'id' => 410,
            'name' => 'Gone',
            'signification' => 'Client Error',
        ],[
            'id' => 205,
            'name' => 'Reset Content',
            'signification' => 'Successful',
        ],[
            'id' => 411,
            'name' => 'Length Required',
            'signification' => 'Client Error',
        ],[
            'id' => 204,
            'name' => 'No Content',
            'signification' => 'Successful',
        ],[
            'id' => 301,
            'name' => 'Moved Permanently',
            'signification' => 'Redirection',
        ],[
            'id' => 417,
            'name' => 'Expectation Failed',
            'signification' => 'Client Error',
        ],[
            'id' => 416,
            'name' => 'Requested Range Not Satisfiable',
            'signification' => 'Client Error',
        ],[
            'id' => 415,
            'name' => 'Unsupported Media Type',
            'signification' => 'Client Error',
        ],[
            'id' => 414,
            'name' => 'Request-URI Too Long',
            'signification' => 'Client Error',
        ],[
            'id' => 413,
            'name' => 'Request Entity Too Large',
            'signification' => 'Client Error',
        ],[
            'id' => 302,
            'name' => 'Found',
            'signification' => 'Redirection',
        ],[
            'id' => 303,
            'name' => 'See Other',
            'signification' => 'Redirection',
        ],[
            'id' => 409,
            'name' => 'Conflict',
            'signification' => 'Client Error',
        ],[
            'id' => 408,
            'name' => 'Request Timeout',
            'signification' => 'Client Error',
        ],[
            'id' => 407,
            'name' => 'Proxy Authentication Required',
            'signification' => 'Client Error',
        ],[
            'id' => 406,
            'name' => 'Not Acceptable',
            'signification' => 'Client Error',
        ],[
            'id' => 405,
            'name' => 'Method Not Allowed',
            'signification' => 'Client Error',
        ],[
            'id' => 404,
            'name' => 'Not Found',
            'signification' => 'Client Error',
        ],[
            'id' => 403,
            'name' => 'Forbidden',
            'signification' => 'Client Error',
        ],[
            'id' => 402,
            'name' => 'Payment Required',
            'signification' => 'Client Error',
        ],[
            'id' => 401,
            'name' => 'Unauthorized',
            'signification' => 'Client Error',
        ],[
            'id' => 305,
            'name' => 'Use Proxy',
            'signification' => 'Redirection',
        ],[
            'id' => 307,
            'name' => 'Temporary Redirect',
            'signification' => 'Redirection',
        ],[
            'id' => 304,
            'name' => 'Not Modified',
            'signification' => 'Redirection',
        ],[
            'id' => 400,
            'name' => 'Bad Request',
            'signification' => 'Client Error',
        ]];
        ResponseMessage::insert($Response);
    }
}
