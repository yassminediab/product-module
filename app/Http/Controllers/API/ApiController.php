<?php namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiController extends Controller {

    protected int $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return ApiController
     */
    public function setStatusCode(int $statusCode): ApiController
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string $msg
     * @param array $errors
     * @return Response
     */
    public function respondNotFound(string $msg = 'Not Found' , array $errors = []): Response
    {
        return $this->setStatusCode(404)->respondWithError($msg, $errors);
    }

    /**
     * @param string $msg
     * @param array $errors
     * @return Response
     */
    public function respondNotAuthenticated(string $msg = 'Not Authenticated', array $errors = []): Response
    {
        return $this->setStatusCode(401)->respondWithError($msg, $errors);
    }

    /**
     * @param string $msg
     * @param array $errors
     * @return Response
     */
    public function respondNotAcceptable(string $msg = 'Not Acceptable', array $errors = []): Response
    {
        return $this->setStatusCode(406)->respondWithError($msg, $errors);
    }

    /**
     * @param string $msg
     * @param array $errors
     * @return Response
     */
    public function respondWithError(string $msg = '' ,mixed $errors = []): Response
    {
        return $this->respond(["success" => false, "msg" => $msg, 'errors' => $errors]);
    }


    /**
     * @param string $msg
     * @param array $data
     * @return Response
     */
    public function respondCreated(string $msg = '' ,mixed $data = []): Response
    {
        return $this->setStatusCode(201)->respondSuccess($msg, $data);
    }

    /**
     * @param string $msg
     * @param mixed $data
     * @return Response
     */
    public function respondAccepted(string $msg = '' , mixed $data = []): Response
    {
        return $this->setStatusCode(202)->respondSuccess($msg, $data);
    }

    /**
     * @param string $msg
     * @param array $data
     * @return Response
     */
    public function respondSuccess(string $msg = '' ,mixed $data = []): Response
    {

        return $this->respond(["success" => true, 'msg' => $msg ,"data"=> $data]);
    }

    /**
     * @param $data
     * @param array $headers
     * @return Response
     */
    public function respond($data , $headers = []) : Response
    {
        return (new Response($data, $this->getStatusCode()));
    }

}
